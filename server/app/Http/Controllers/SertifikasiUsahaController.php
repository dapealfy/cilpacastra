<?php

namespace App\Http\Controllers;

use App\Imports\SertifikasiUsahaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\SertifikasiUsaha;

class SertifikasiUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sertifikasi_usaha['sertifikasi_usaha'] = SertifikasiUsaha::orderBy('id')->get();

        return view('dashboard.sertifikasi.usaha.index', $sertifikasi_usaha);
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
        SertifikasiUsaha::create([
           'nama_klien' => request('nama_klien'),
           'permohonan' => request('permohonan'),
           'kajian' => request('kajian'),
           'perjanjian' => request('perjanjian'),
           'lap_audit_s2' => request('lap_audit_s2'),
           'sertifikat' => request('sertifikat'),
           'lap_audit_sury' => request('lap_audit_sury'),
           'klasifikasi_bintang' => request('klasifikasi_bintang'),
           'lsu_auditor' => request('lsu_auditor'),
        ]);
        
        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SertifikasiUsaha  $sertifikasiUsaha
     * @return \Illuminate\Http\Response
     */
    public function show(SertifikasiUsaha $sertifikasiUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SertifikasiUsaha  $sertifikasiUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sertifikasi_usaha = SertifikasiUsaha::findOrFail($id);
        
        return $sertifikasi_usaha;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SertifikasiUsaha  $sertifikasiUsaha
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $sertifikasi_usaha = SertifikasiUsaha::findOrFail($id);
        $sertifikasi_usaha->update([
           'nama_klien' => request('nama_klien'),
           'permohonan' => request('permohonan'),
           'kajian' => request('kajian'),
           'perjanjian' => request('perjanjian'),
           'lap_audit_s2' => request('lap_audit_s2'),
           'sertifikat' => request('sertifikat'),
           'lap_audit_sury' => request('lap_audit_sury'),
           'klasifikasi_bintang' => request('klasifikasi_bintang'),
           'lsu_auditor' => request('lsu_auditor'),
        ]);
        
        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SertifikasiUsaha  $sertifikasiUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sertifikasi_usaha = SertifikasiUsaha::findOrFail($id);
        $sertifikasi_usaha->delete();
        
        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function sertifikasiUsahaImport(Request $request)
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
        $file->move('sertifikasi_usaha', $nama_file);

        // import data
        Excel::import(new SertifikasiUsahaImport, public_path('/sertifikasi_usaha/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
