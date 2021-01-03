<?php

namespace App\Http\Controllers;

use App\DataBuku;
use Illuminate\Http\Request;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_buku['data_buku'] = DataBuku::get();
        return view('dashboard.data_buku.index', $data_buku);
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

        DataBuku::create([
            'nama' => request('nama'),
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBuku  $dataDataBuku
     * @return \Illuminate\Http\Response
     */
    public function show(DataBuku $data_buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBuku  $dataDataBuku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databuku = DataBuku::findOrFail($id);

        return $databuku;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBuku  $dataDataBuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databuku = DataBuku::findOrFail($id);
        $databuku->update([
            'nama'  => $request->nama,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBuku  $dataDataBuku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databuku = DataBuku::findOrFail($id);
        $databuku->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
}
