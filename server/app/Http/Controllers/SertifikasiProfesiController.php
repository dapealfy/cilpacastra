<?php

namespace App\Http\Controllers;

use App\Imports\SertifikasiProfesiImport;
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
        $sertifikasi_profesi['sertifikasi_profesi'] = SertifikasiProfesi::orderBy('id')->get();

        return view('dashboard.sertifikasi.profesi.index', $sertifikasi_profesi);
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
        SertifikasiProfesi::create([
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
        $sertifikasi_profesi = SertifikasiProfesi::findOrFail($id);
        
        return $sertifikasi_profesi;
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
        $sertifikasi_profesi = SertifikasiProfesi::findOrFail($id);
        $sertifikasi_profesi->update([
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
    public function destroy($id)
    {
        $sertifikasi_profesi = SertifikasiProfesi::findOrFail($id);
        $sertifikasi_profesi->delete();
        
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }
    
    public function sertifikasiProfesiImport(Request $request)
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
        Excel::import(new SertifikasiProfesiImport, public_path('/sertifikasi_profesi/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
