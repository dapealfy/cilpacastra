<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangRestoImport as DataBidangRestoImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangResto;

class DataBidangRestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_resto['databidang_resto'] = DataBidangResto::orderBy('id')->get();

        return view('dashboard.databidang.resto.index', $databidang_resto);
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

        DataBidangResto::create([
            'nama_tempat_usaha'  => $request->nama_usaha,
            'pemilik'  => $request->pemilik,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_pekerja_laki'  => $request->jumlah_pekerja_laki,
            'jumlah_pekerja_perempuan'  => $request->jumlah_pekerja_perempuan,
            'jumlah_total'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBidangResto  $dataBidangResto
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangResto $dataBidangResto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangResto  $dataBidangResto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_resto = DataBidangResto::findOrFail($id);

        return $databidang_resto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangResto  $dataBidangResto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_resto = DataBidangResto::findOrFail($id);
        $databidang_resto->update([
            'nama_tempat_usaha'  => $request->nama_usaha,
            'pemilik'  => $request->pemilik,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_pekerja_laki'  => $request->jumlah_pekerja_laki,
            'jumlah_pekerja_perempuan'  => $request->jumlah_pekerja_perempuan,
            'jumlah_total'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBidangResto  $dataBidangResto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_resto = DataBidangResto::findOrFail($id);
        $databidang_resto->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangRestoImport(Request $request)
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
        $file->move('data_bidang_resto', $nama_file);

        // import data
        Excel::import(new DataBidangRestoImport, public_path('/data_bidang_resto/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
