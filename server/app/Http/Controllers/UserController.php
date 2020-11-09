<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return $user;
    }
    
    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->update([
           'password' => request('password')
        ]);
        
        return redirect()->back()->with("OK", "Berhasil mengubah password");
    }
}
