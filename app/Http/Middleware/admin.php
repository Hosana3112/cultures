<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if (!in_array($user->role_id, [1, 2])) { // 1 = Admin, 2 = Modérateur
            return redirect()->route('front.accueil')
                ->with('error', 'Accès non autorisé. Droits administrateur requis.');
        }

        return $next($request);
    }
}