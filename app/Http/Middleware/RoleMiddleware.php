<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roles)
    {
        if (!auth()->check()) {
            // Jika user belum login, arahkan ke halaman login
            return redirect(route('login'));
        }
    
        $user = auth()->user();
    
        if ($user->roles != $roles) {
            // Jika user memiliki role yang berbeda, arahkan ke halaman yang sesuai dengan role
            if ($user->roles == 'admin') {
                return redirect(route('dashboard'));
            } elseif ($user->roles == 'masyarakat') {
                return redirect('/antrian');
            }
        }
    
        return $next($request);
    }
    
}
