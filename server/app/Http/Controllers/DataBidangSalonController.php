<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangSalonImport as DataBidangSalonImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangSalon;

class DataBidangSalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_salon['databidang_salon'] = DataBidangSalon::orderBy('id')->get();

        return view('dashboard.databidang.salon.index', $databidang_salon);
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

        DataBidangSalon::create([
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
     * @param  \App\DataBidangSalon  $dataBidangSalon
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangSalon $dataBidangSalon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangSalon  $dataBidangSalon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_salon = DataBidangSalon::findOrFail($id);

        return $databidang_salon;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangSalon  $dataBidangSalon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_salon = DataBidangSalon::findOrFail($id);
        $databidang_salon->update([
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
     * @param  \App\DataBidangSalon  $dataBidangSalon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_salon = DataBidangSalon::findOrFail($id);
        $databidang_salon->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangSalonImport(Request $request)
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
        $file->move('data_bidang_salon', $nama_file);

        // import data
        Excel::import(new DataBidangSalonImport, public_path('/data_bidang_salon/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
