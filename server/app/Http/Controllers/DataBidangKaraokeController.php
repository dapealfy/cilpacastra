<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangKaraokeImport as DataBidangKaraokeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangKaraoke;

class DataBidangKaraokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_karaoke['databidang_karaoke'] = DataBidangKaraoke::orderBy('id')->get();

        return view('dashboard.databidang.karaoke.index', $databidang_karaoke);
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

        DataBidangKaraoke::create([
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
     * @param  \App\DataBidangKaraoke  $dataBidangKaraoke
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangKaraoke $dataBidangKaraoke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangKaraoke  $dataBidangKaraoke
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_karaoke = DataBidangKaraoke::findOrFail($id);

        return $databidang_karaoke;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangKaraoke  $dataBidangKaraoke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_karaoke = DataBidangKaraoke::findOrFail($id);
        $databidang_karaoke->update([
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
     * @param  \App\DataBidangKaraoke  $dataBidangKaraoke
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_karaoke = DataBidangKaraoke::findOrFail($id);
        $databidang_karaoke->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangKaraokeImport(Request $request)
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
        $file->move('data_bidang_karaoke', $nama_file);

        // import data
        Excel::import(new DataBidangKaraokeImport, public_path('/data_bidang_karaoke/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
