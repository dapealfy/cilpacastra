<?php

namespace App\Http\Controllers;

use App\Imports\SertifikasiUsahaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\SertifikasiProfesi;

class SertifikasiProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikat_profesi['sertifikat_profesi'] = SertifikasiProfesi::orderBy('id')->get();

        return view('dashboard.sertifikasi.profesi.index', $sertifikat_profesi);
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
        SertifikatProfesi::create([
           'tanggal' => request('tanggal'),
           'tuk' => request('tuk'),
           'provinsi' => request('provinsi'),
           'pendidikan' => request('pendidikan'),
           'industri' => request('industri'),
           'grand_total' => request('grand_total'),
        ]);
        
        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SertifikasiProfesi  $sertifikasiProfesi
     * @return \Illuminate\Http\Response
     */
    public function show(SertifikasiProfesi $sertifikasiProfesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SertifikasiProfesi  $sertifikasiProfesi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sertifikat_profesi = SertifikasiProfesi::findOrFail($id);
        
        return $sertifikat_profesi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SertifikasiProfesi  $sertifikasiProfesi
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $sertifikat_profesi = SertifikasiProfesi::findOrFail($id);
        $sertifikat_profesi->update([
           'tanggal' => request('tanggal'),
           'tuk' => request('tuk'),
           'provinsi' => request('provinsi'),
           'pendidikan' => request('pendidikan'),
           'industri' => request('industri'),
           'grand_total' => request('grand_total'),
        ]);
        
        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SertifikasiProfesi  $sertifikasiProfesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(SertifikasiProfesi $sertifikasiProfesi)
    {
        //
    }
    
    public function dataBidangHotelImport(Request $request)
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
        $file->move('sertifikasi_profesi', $nama_file);

        // import data
        Excel::import(new SertifikatProfesiImport, public_path('/sertifikasi_profesi/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
