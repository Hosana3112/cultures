<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        
        // Déterminer la destination selon le rôle
        $destination = $this->getDestinationBasedOnRole($user);
        
        // Vérifier si le 2FA est activé
        if ($user && $user->google2fa_enabled) {
            // Nettoyer l'ancienne session 2FA
            $request->session()->forget('2fa_passed');
            
            // Stocker l'ID utilisateur et la destination en session
            $request->session()->put('2fa:user:id', $user->id);
            $request->session()->put('2fa:auth:remember', $request->boolean('remember'));
            $request->session()->put('2fa:destination', $destination); // Stocker la destination
            
            // Déconnecter temporairement pour forcer la vérification 2FA
            Auth::logout();
            
            // Rediriger vers la page de vérification 2FA
            return redirect()->route('two-factor.challenge');
        }

        // Redirection directe si pas de 2FA
        return redirect()->to($destination);
    }

    /**
     * Get destination URL based on user role.
     */
    private function getDestinationBasedOnRole($user): string
    {
        switch ($user->role_id) {
            case 1: // Administrateur
                return route('dashboard-custom');
            case 2: // Modérateur
                return route('admin.contenus.index');
                
            case 3: // Utilisateur standard
                return route('front.accueil');
                
            default:
                return route('front.accueil');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Nettoyer la session 2FA
        $request->session()->forget('2fa_passed');
        $request->session()->forget('2fa:user:id');
        $request->session()->forget('2fa:auth:remember');
        $request->session()->forget('2fa:destination');
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.accueil');
    }
}