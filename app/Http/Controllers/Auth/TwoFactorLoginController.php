<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoFactorLoginController extends Controller
{
     protected $google2fa;

    public function __construct()
    {
        $this->google2fa = new Google2FA();
    }

    public function showChallengeForm()
    {
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
        
        $user = \App\Models\User::find($userId);
        
        if (!$user || !$user->google2fa_enabled) {
            return redirect()->route('login');
        }
        
        // Vérifier le code
        $valid = $this->google2fa->verifyKey(
            $user->google2fa_secret,
            $request->code
        );
        
        if ($valid) {
            Auth::login($user, $remember);
            
            $request->session()->forget('2fa:user:id');
            $request->session()->forget('2fa:auth:remember');
            
            return redirect()->intended('/dashboard');
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
        
        $user = \App\Models\User::find($userId);
        
        if ($user && $user->useBackupCode($request->backup_code)) {
            Auth::login($user, $remember);
            
            $request->session()->forget('2fa:user:id');
            $request->session()->forget('2fa:auth:remember');
            
            return redirect()->intended('/dashboard');
        }
        
        return back()->withErrors(['backup_code' => 'Code de secours invalide ou déjà utilisé.']);
    }
}
