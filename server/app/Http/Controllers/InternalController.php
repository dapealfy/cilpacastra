<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internal;
use App\User;
use Auth;

class InternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->super_admin != true)
        {
            return redirect()->back()->with("ERR", "Maaf, anda tidak memiliki akses untuk masuk ke halaman ini");
        }
        $internal['internal'] = Internal::with('user')->orderBy('id', 'desc')->get();
        
        return view('dashboard.internal.index', $internal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('username', request('username'))->first();
        if ($user != null)
        {
           return redirect()->back()->with("ERR", "Username yang anda masukkan telah digunakan"); 
        }
        
        $user = User::create([
           'name' => request('name'), 
           'username' => request('username'), 
           'password' => request('password')
        ]);
        
        Internal::create([
            'user_id' => $user->id
        ]);
        
        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internal  $internal
     * @return \Illuminate\Http\Response
     */
    public function show(Internal $internal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internal  $internal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internal = Internal::with('user')->findOrFail($id);
        
        return $internal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internal  $internal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $internal = Internal::with('user')->findOrFail($id);
        $user = User::where('username', request('username'))->first();
        if ($user != null)
        {
            if($user->id != $internal->user_id)
            {
                return redirect()->back()->with("ERR", "Username yang anda masukkan telah digunakan"); 
            }
        }
        $internal->user->update([
            'username' => request('username'),
            'name' => request('name')
        ]);
        
        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internal  $internal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internal = Internal::with('user')->findOrFail($id);
        $internal->user->delete();
        
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
