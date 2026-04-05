<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // 2. Proses autentikasi user
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'loginError' => 'Email / password salah',
        ]);
    }

    // 3. Menampilkan halaman registrasi
    public function registration()
    {
        return view('registration');
    }

    // 4. Proses input data user ke database
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect('/registration')->with('success', 'Registrasi berhasil');
    }

    // 5. Menampilkan halaman home
    public function home()
    {
        if (Auth::check()) {
            return view('home', [
                'user' => Auth::user()
            ]);
        }

        return redirect('/login');
    }

    // 6. Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}