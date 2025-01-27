<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Pastikan pengguna terautentikasi dan memiliki salah satu peran yang diizinkan
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Redirect atau tampilkan pesan error jika peran tidak diizinkan
        return redirect('/index')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
