<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA as Google2FAQRCode;
use App\Models\Utilisateur;

class TwoFactorLoginController extends Controller
{
    protected $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FAQRCode();
    }

    public function showChallengeForm()
    {
        // Vérifier que l'utilisateur est en attente de 2FA
        if (!session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }
        
        return view('auth.two-factor-challenge');
    }

    public function verifyChallenge(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);
        
        $userId = $request->session()->get('2fa:user:id');
        $remember = $request->session()->get('2fa:auth:remember');
        
        if (!$userId) {
            return redirect()->route('login');
        }
        
        $user = Utilisateur::find($userId);
        
        if (!$user || !$user->google2fa_enabled) {
            return redirect()->route('login');
        }
        
        // Vérifier le code avec Google2FAQRCode
        $valid = $this->google2fa->verifyKey(
            $user->google2fa_secret,
            $request->code
        );
        
        if ($valid) {
            Auth::login($user, $remember);
            
            // Marquer comme vérifié dans la session
            $request->session()->put('2fa_passed', true);
            
            // Récupérer la destination stockée
            $destination = $request->session()->get('2fa:destination', route('dashboard'));
            
            // Nettoyer les données temporaires
            $request->session()->forget('2fa:user:id');
            $request->session()->forget('2fa:auth:remember');
            $request->session()->forget('2fa:destination');
            
            // Rediriger vers la destination stockée
            return redirect()->to($destination);
        }
        
        return back()->withErrors(['code' => 'Code invalide.']);
    }

    public function verifyBackupCode(Request $request)
    {
        $request->validate([
            'backup_code' => 'required|string',
        ]);
        
        $userId = $request->session()->get('2fa:user:id');
        $remember = $request->session()->get('2fa:auth:remember');
        
        $user = Utilisateur::find($userId);
        
        if ($user && $user->useBackupCode($request->backup_code)) {
            Auth::login($user, $remember);
            
            // Marquer comme vérifié dans la session
            $request->session()->put('2fa_passed', true);
            
            // Récupérer la destination stockée
            $destination = $request->session()->get('2fa:destination', route('dashboard'));
            
            $request->session()->forget('2fa:user:id');
            $request->session()->forget('2fa:auth:remember');
            $request->session()->forget('2fa:destination');
            
            // Rediriger vers la destination stockée
            return redirect()->to($destination);
        }
        
        return back()->withErrors(['backup_code' => 'Code de secours invalide ou déjà utilisé.']);
    }
}