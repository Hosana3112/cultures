<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTwoFactorEnabled
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        // Si pas d'utilisateur connecté, continuer
        if (!$user) {
            return $next($request);
        }
        
        // Si le 2FA n'est pas activé, continuer
        if (!$user->google2fa_enabled) {
            return $next($request);
        }
        
        // Vérifier si l'utilisateur est déjà passé par la vérification 2FA
        if ($request->session()->get('2fa_passed', false)) {
            return $next($request);
        }
        
        // Si l'utilisateur vient de vérifier son code 2FA, on le laisse passer
        // (cette vérification se fait dans le contrôleur)
        
        // Pour toutes les autres routes (sauf two-factor.challenge), rediriger vers la vérification
        if (!$request->is('two-factor*') && !$request->is('logout')) {
            return redirect()->route('two-factor.challenge');
        }
        
        return $next($request);
    }
}