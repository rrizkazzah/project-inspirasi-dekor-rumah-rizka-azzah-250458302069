<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login, redirect ke login admin
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        // Jika sudah login tapi bukan admin, tampilkan error
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        return $next($request);
    }
}
