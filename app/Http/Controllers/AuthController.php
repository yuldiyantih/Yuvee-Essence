<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login custom (tanpa hash)
     */
    public function login(Request $request)
    {
        // Validasi input sederhana
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek user & password (tanpa hash)
        if ($user && $request->password === $user->password) {
            // Login manual
            Auth::login($user);

            // Arahkan ke dashboard umum
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    /**
     * Logout dan hapus session
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
