<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Cek apakah user ada dan password cocok (plain text)
        if ($user && $request->password === $user->password) {
            // Simpan data user ke session
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            Session::put('role', $user->role);

            // Redirect berdasarkan role
            if ($user->role === 'dosen') {
                return redirect()->route('dashboard.dosen');
            } else {
                return redirect()->route('dashboard.mahasiswa');
            }
        }

        // Jika gagal, kembali ke form login dengan pesan error
        return redirect()->route('login.form')->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
