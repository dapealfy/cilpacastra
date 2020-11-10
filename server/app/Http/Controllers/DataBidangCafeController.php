<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangCafeImport as DataBidangCafeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangCafe;

class DataBidangCafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_cafe['databidang_cafe'] = DataBidangCafe::orderBy('id')->get();

        return view('dashboard.databidang.cafe.index', $databidang_cafe);
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

        DataBidangCafe::create([
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
     * @param  \App\DataBidangCafe  $dataBidangCafe
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangCafe $dataBidangCafe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangCafe  $dataBidangCafe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_cafe = DataBidangCafe::findOrFail($id);

        return $databidang_cafe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangCafe  $dataBidangCafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_cafe = DataBidangCafe::findOrFail($id);
        $databidang_cafe->update([
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
     * @param  \App\DataBidangCafe  $dataBidangCafe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_cafe = DataBidangCafe::findOrFail($id);
        $databidang_cafe->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangCafeImport(Request $request)
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
        $file->move('data_bidang_cafe', $nama_file);

        // import data
        Excel::import(new DataBidangCafeImport, public_path('/data_bidang_cafe/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
