<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTwoFactorEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        if ($user && $user->google2fa_enabled) {
            $authenticator = app(Authenticator::class)->boot($request);
            
            if ($authenticator->isAuthenticated()) {
                return $next($request);
            }
            
            return $authenticator->makeRequestOneTimePasswordResponse();
        }
        
        return $next($request);
    }
}
