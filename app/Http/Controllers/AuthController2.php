<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     /**
     * 1. Menampilkan halaman form login
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * 2. Memproses data login
     */
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mengecek kecocokan email & password ke database
        if (Auth::attempt($credentials)) {

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman tujuan atau fallback ke /buku
            return redirect()
                ->intended('/buku')
                ->with('success', 'Selamat Datang, Anda berhasil login!');
        }

        // Jika login gagal
        return back()
            ->withErrors([
                'email' => 'Email atau Password yang Anda masukkan salah.',
            ])
            ->onlyInput('email');
    }

    /**
     * 3. Memproses logout
     */
    public function logout(Request $request)
    {
        // Hapus sesi autentikasi
        Auth::logout();

        // Hancurkan semua session
        $request->session()->invalidate();

        // Generate ulang CSRF token
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Anda telah berhasil logout.');
    }
}

