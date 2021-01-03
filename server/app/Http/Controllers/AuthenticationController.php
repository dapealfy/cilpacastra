<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('authentication.login');
    }

    public function login()
    {
        $user = User::where('email', request('email'))->first();
        if ($user == null) {
            return redirect()->back()->with('ERR', 'Email tidak terdaftar.');
        }

        if (!Auth::attempt(['username' => $user->username, 'password' => request('password')])) {
            return redirect()->back()->with('ERR', 'Password salah.');
        }
        return redirect()->route('dashboard.index');
    }

    public function register(Request $request)
    {
        $checkUsername = User::where('email', request('email'))->first();
        if ($checkUsername != null) {
            return redirect()->back()->with("ERR", "Email yang anda masukkan telah digunakan");
        }

        $user = User::create([
            'nama' => request('nama'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
