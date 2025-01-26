<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $masyarakat = Auth::masyarakat();

        // Pastikan pengguna memiliki salah satu dari peran yang diizinkan
        if (in_array($masyarakat->role, $roles)) {
            return $next($request);
        }

        // Redirect atau tampilkan pesan error jika peran tidak diizinkan
        return redirect('/index')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
