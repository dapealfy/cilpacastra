<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangArenaImport as DataBidangArenaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangArena;

class DataBidangArenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_arena['databidang_arena'] = DataBidangArena::orderBy('id')->get();

        return view('dashboard.databidang.arena.index', $databidang_arena);
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

        DataBidangArena::create([
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
     * @param  \App\DataBidangArena  $dataBidangArena
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangArena $dataBidangArena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangArena  $dataBidangArena
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_arena = DataBidangArena::findOrFail($id);

        return $databidang_arena;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangArena  $dataBidangArena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_arena = DataBidangArena::findOrFail($id);
        $databidang_arena->update([
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
     * @param  \App\DataBidangArena  $dataBidangArena
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_arena = DataBidangArena::findOrFail($id);
        $databidang_arena->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangArenaImport(Request $request)
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
        $file->move('data_bidang_arena', $nama_file);

        // import data
        Excel::import(new DataBidangArenaImport, public_path('/data_bidang_arena/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
