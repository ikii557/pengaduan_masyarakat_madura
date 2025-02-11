<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfilePhotoMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $admin = Auth::user(); // Ensure Auth is configured for admins
            view()->share('adminPhoto', $admin->foto ? asset('storage/' . $admin->foto) : 'https://via.placeholder.com/150');
        }

        return $next($request);
    }
}
