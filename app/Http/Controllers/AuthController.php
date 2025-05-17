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

    public function showDosenLoginForm()
    {
        return view('login_dosen');
    }

    public function showMahasiswaLoginForm()
    {
        return view('login_mahasiswa');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|in:dosen,mahasiswa',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Cek apakah user ada, password cocok (plain text), dan role sesuai
        if ($user && $request->password === $user->password && $user->role === $request->role) {
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

        // Jika gagal, kembali ke form login sesuai role dengan pesan error
        $route = $request->role === 'dosen' ? 'login.dosen.form' : 'login.mahasiswa.form';
        return redirect()->route($route)->with('error', 'Username, password, atau role salah!');
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
