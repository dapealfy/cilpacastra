<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangDepotImport as DataBidangDepotImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangDepot;

class DataBidangDepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_depot['databidang_depot'] = DataBidangDepot::orderBy('id')->get();

        return view('dashboard.databidang.depot.index', $databidang_depot);
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

        DataBidangDepot::create([
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
     * @param  \App\DataBidangDepot  $dataBidangDepot
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangDepot $dataBidangDepot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangDepot  $dataBidangDepot
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_depot = DataBidangDepot::findOrFail($id);

        return $databidang_depot;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangDepot  $dataBidangDepot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_depot = DataBidangDepot::findOrFail($id);
        $databidang_depot->update([
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
     * @param  \App\DataBidangDepot  $dataBidangDepot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_depot = DataBidangDepot::findOrFail($id);
        $databidang_depot->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangDepotImport(Request $request)
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
        $file->move('data_bidang_depot', $nama_file);

        // import data
        Excel::import(new DataBidangDepotImport, public_path('/data_bidang_depot/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
