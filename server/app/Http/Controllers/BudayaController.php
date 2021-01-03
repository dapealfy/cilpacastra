<?php

namespace App\Http\Controllers;

use App\Budaya;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budaya['budaya'] = Budaya::get();
        return view('dashboard.budaya.index', $budaya);
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

        Budaya::create([
            'user_id' => request('user_id'),
            'category_id' => request('category_id'),
            'nama_budaya' => request('nama_budaya'),
            'nama_budaya' => request('nama_budaya'),
            'deskripsi' => request('deskripsi'),
            'lat' => request('lat'),
            'lng' => request('lng'),
            'thumbnail' => request('thumbnail'),
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Budaya  $dataBudaya
     * @return \Illuminate\Http\Response
     */
    public function show(Budaya $budaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Budaya  $dataBudaya
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);

        return $budaya;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Budaya  $dataBudaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $budaya = Budaya::findOrFail($id);
        $budaya->update([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'nama_budaya' => $request->nama_budaya,
            'nama_budaya' => $request->nama_budaya,
            'deskripsi' => $request->deskripsi,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Budaya  $dataBudaya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        $budaya->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
