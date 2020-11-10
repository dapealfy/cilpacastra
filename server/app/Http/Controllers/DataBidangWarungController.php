<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangWarungImport as DataBidangWarungImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangWarung;

class DataBidangWarungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_warung['databidang_warung'] = DataBidangWarung::orderBy('id')->get();

        return view('dashboard.databidang.warung.index', $databidang_warung);
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

        DataBidangWarung::create([
            'nama_tempat_usaha'  => $request->nama_usaha,
            'nama_pemilik'  => $request->pemilik,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_pria'  => $request->jumlah_pekerja_laki,
            'jumlah_wanita'  => $request->jumlah_pekerja_perempuan,
            'jumlah_total'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBidangWarung  $dataBidangWarung
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangWarung $dataBidangWarung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangWarung  $dataBidangWarung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_warung = DataBidangWarung::findOrFail($id);

        return $databidang_warung;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangWarung  $dataBidangWarung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_warung = DataBidangWarung::findOrFail($id);
        $databidang_warung->update([
            'nama_tempat_usaha'  => $request->nama_usaha,
            'nama_pemilik'  => $request->pemilik,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_pria'  => $request->jumlah_pekerja_laki,
            'jumlah_wanita'  => $request->jumlah_pekerja_perempuan,
            'jumlah_total'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBidangWarung  $dataBidangWarung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_warung = DataBidangWarung::findOrFail($id);
        $databidang_warung->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangWarungImport(Request $request)
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
        $file->move('data_bidang_warung', $nama_file);

        // import data
        Excel::import(new DataBidangWarungImport, public_path('/data_bidang_warung/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
