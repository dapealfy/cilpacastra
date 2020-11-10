<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangWisma;
use App\Imports\DataBidangWismaImport as ImportsDataBidangWismaImport;

class DataBidangWismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_wisma['databidang_wisma'] = DataBidangWisma::orderBy('id')->get();

        return view('dashboard.databidang.wisma.index', $databidang_wisma);
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
        DataBidangWisma::create([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'pemilik'  => $request->pemilik,
            'keterangan'  => $request->keterangan,
            'kelurahan'  => $request->kelurahan,
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBidangWisma  $dataBidangWisma
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangWisma $dataBidangWisma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangWisma  $dataBidangWisma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_wisma = DataBidangWisma::findOrFail($id);

        return $databidang_wisma;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangWisma  $dataBidangWisma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_wisma = DataBidangWisma::findOrFail($id);
        $databidang_wisma->update([
            'nama'  => $request->nama,
            'alamat'  => $request->alamat,
            'pemilik'  => $request->pemilik,
            'keterangan'  => $request->keterangan,
            'kelurahan'  => $request->kelurahan,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBidangWisma  $dataBidangWisma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_wisma = DataBidangWisma::findOrFail($id);
        $databidang_wisma->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangWismaImport(Request $request)
    {
        // 		// validasi
        // 		$this->validate($request, [
        // 			'file' => 'required|mimes:csv,xls,xlsx'
        // 		]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('data_bidang_wisma', $nama_file);

        // import data
        Excel::import(new ImportsDataBidangWismaImport, public_path('/data_bidang_wisma/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
