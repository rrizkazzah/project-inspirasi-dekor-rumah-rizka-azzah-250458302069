<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan halaman login admin
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Cek apakah user adalah admin
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.dashboard'));
            }

            // Jika bukan admin, logout dan error
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Anda tidak memiliki akses ke admin panel.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah berhasil logout dari admin panel.');
    }
}
