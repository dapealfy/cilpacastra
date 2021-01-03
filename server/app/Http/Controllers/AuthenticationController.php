<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eksternal;
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
        $user = User::where('username', request('username'))->first();
        if ($user == null) {
            return redirect()->back()->with('ERR', 'Username tidak terdaftar.');
        }

        if (!Auth::attempt(['username' => $user->username, 'password' => request('password')])) {
            return redirect()->back()->with('ERR', 'Password salah.');
        }
        return redirect()->route('dashboard.index');
    }

    public function register(Request $request)
    {
        $checkUsername = User::where('username', request('username'))->first();
        if ($checkUsername != null) {
            return redirect()->back()->with("ERR", "Username yang anda masukkan telah digunakan");
        }

        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
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
