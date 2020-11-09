<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Eksternal;
use App\User;
use Auth;

class EksternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eksternal['eksternal'] = Eksternal::with('user')->orderBy('id', 'desc')->get();
        
        return view('dashboard.eksternal.index', $eksternal);
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
           'password' => request('password'),
        ]);
        
        Eksternal::create([
            'user_id' => $user->id
        ]);
        
        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eksternal  $eksternal
     * @return \Illuminate\Http\Response
     */
    public function show(Eksternal $eksternal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eksternal  $eksternal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eksternal = Eksternal::with('user')->findOrFail($id);
        
        return $eksternal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eksternal  $eksternal
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $eksternal = Eksternal::with('user')->findOrFail($id);
        $user = User::where('username', request('username'))->first();
        if ($user != null)
        {
            if($user->id != $eksternal->user_id)
            {
                return redirect()->back()->with("ERR", "Username yang anda masukkan telah digunakan"); 
            }
        }
        $eksternal->user->update([
            'username' => request('username'),
            'name' => request('name')
        ]);
        
        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eksternal  $eksternal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eksternal = Eksternal::with('user')->findOrFail($id);
        $eksternal->user->delete();
        
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
