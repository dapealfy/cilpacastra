<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangKost;
use App\Imports\DataBidangKostImport as ImportsDataBidangKostImport;

class DataBidangKostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_kost['databidang_kost'] = DataBidangKost::orderBy('id')->get();

        return view('dashboard.databidang.kost.index', $databidang_kost);
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
        DataBidangKost::create([
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
     * @param  \App\DataBidangKost  $dataBidangKost
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangKost $dataBidangKost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangKost  $dataBidangKost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_kost = DataBidangKost::findOrFail($id);

        return $databidang_kost;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangKost  $dataBidangKost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_kost = DataBidangKost::findOrFail($id);
        $databidang_kost->update([
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
     * @param  \App\DataBidangKost  $dataBidangKost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_kost = DataBidangKost::findOrFail($id);
        $databidang_kost->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangKostImport(Request $request)
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
        $file->move('data_bidang_kost', $nama_file);

        // import data
        Excel::import(new ImportsDataBidangKostImport, public_path('/data_bidang_kost/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
