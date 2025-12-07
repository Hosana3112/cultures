<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FALaravel\Google2FA as Google2FALaravel;
use PragmaRX\Google2FAQRCode\Google2FA as Google2FAQRCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use App\Models\Utilisateur;

class TwoFactorAuthController extends Controller
{
    protected $google2fa;

    public function __construct()
    {
        // Utiliser le package Google2FA pour Laravel
        $this->google2fa = app(Google2FALaravel::class);
    }

    // Activer le 2FA
    public function enable(Request $request)
    {
        $user = Auth::user();
        
        // Générer une clé secrète si pas déjà fait
        if (!$user->google2fa_secret) {
            // Utiliser le package Google2FAQRCode pour générer la clé
            $google2faQR = new Google2FAQRCode();
            $user->google2fa_secret = $google2faQR->generateSecretKey();
            $user->save();
        }
        
        // Générer le QR Code
        $qrCodeUrl = $this->generateQRCode($user);
        
        // Générer les codes de secours
        $backupCodes = $user->generateBackupCodes();
        
        return view('auth.two-factor-enable', [
            'qrCode' => $qrCodeUrl,
            'secret' => $user->google2fa_secret,
            'backupCodes' => $backupCodes
        ]);
    }

    // Vérifier l'activation
    public function verifyEnable(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);
        
        $user = Auth::user();
        
        // Utiliser le package Google2FAQRCode pour vérifier
        $google2faQR = new Google2FAQRCode();
        $valid = $google2faQR->verifyKey(
            $user->google2fa_secret,
            $request->code
        );
        
        if ($valid) {
            $user->google2fa_enabled = true;
            $user->two_factor_confirmed_at = now();
            $user->save();
            
            return redirect()->route('dashboard')
                ->with('success', 'Authentification à deux facteurs activée avec succès.');
        }
        
        return back()->withErrors(['code' => 'Le code est invalide.']);
    }

    // Désactiver le 2FA
    public function disable(Request $request)
    {
        $request->validate([
            'password' => 'required|current_password',
        ]);
        
        $user = Auth::user();
        $user->google2fa_enabled = false;
        $user->google2fa_secret = null;
        $user->backup_codes = null;
        $user->two_factor_confirmed_at = null;
        $user->save();
        
        return redirect()->route('profile')
            ->with('success', 'Authentification à deux facteurs désactivée.');
    }

    // Générer un QR Code
    private function generateQRCode($user)
    {
        $companyName = config('app.name', 'Votre Application');
        $companyEmail = $user->email;
        
        // Utiliser le package Google2FAQRCode pour générer le QR code
        $google2faQR = new Google2FAQRCode();
        $qrCodeUrl = $google2faQR->getQRCodeUrl(
            $companyName,
            $companyEmail,
            $user->google2fa_secret
        );
        
        // Générer QR Code en SVG
        $renderer = new ImageRenderer(
            new RendererStyle(300),
            new SvgImageBackEnd()
        );
        
        $writer = new Writer($renderer);
        $svg = $writer->writeString($qrCodeUrl);
        
        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    // Regénérer les codes de secours
    public function regenerateBackupCodes(Request $request)
    {
        $user = Auth::user();
        $backupCodes = $user->generateBackupCodes();
        
        return view('auth.two-factor-backup-codes', [
            'backupCodes' => $backupCodes
        ]);
    }
}