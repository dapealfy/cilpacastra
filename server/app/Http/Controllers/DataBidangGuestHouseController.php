<?php

namespace App\Http\Controllers;

use App\dataBidangGuestHouseImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangGuestHouse;

class DataBidangGuestHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_guesthouse['databidang_guesthouse'] = DataBidangGuestHouse::orderBy('id')->get();

        return view('dashboard.databidang.guesthouse.index', $databidang_guesthouse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DataBidangGuestHouse::create([
            'nama_usaha'  => $request->nama_usaha,
            'pemilik'  => $request->pemilik,
            'klasifikasi'  => $request->klasifikasi,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_kamar'  => $request->jumlah_kamar,
            'jumlah_tempat_tidur'  => $request->jumlah_tempat_tidur,
            'jumlah_pekerja_laki'  => $request->jumlah_pekerja_laki,
            'jumlah_pekerja_perempuan'  => $request->jumlah_pekerja_perempuan,
            'jumlah_pekerja'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'fasilitas'  => $request->fasilitas,
        ]);

        return redirect()->back()->with("OK", "Berhasil menambahkan data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBidangGuestHouse  $dataBidangGuestHouse
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangGuestHouse $dataBidangGuestHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangGuestHouse  $dataBidangGuestHouse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databidang_guesthouse = DataBidangGuestHouse::findOrFail($id);

        return $databidang_guesthouse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangGuestHouse  $dataBidangGuestHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $databidang_guesthouse = DataBidangGuestHouse::findOrFail($id);
        $databidang_guesthouse->update([
            'nama_usaha'  => $request->nama_usaha,
            'pemilik'  => $request->pemilik,
            'klasifikasi'  => $request->klasifikasi,
            'alamat_notelp'  => $request->alamat_notelp,
            'jumlah_kamar'  => $request->jumlah_kamar,
            'jumlah_tempat_tidur'  => $request->jumlah_tempat_tidur,
            'jumlah_pekerja_laki'  => $request->jumlah_pekerja_laki,
            'jumlah_pekerja_perempuan'  => $request->jumlah_pekerja_perempuan,
            'jumlah_pekerja'  => ((int)$request->jumlah_pekerja_laki + (int)$request->jumlah_pekerja_perempuan),
            'fasilitas'  => $request->fasilitas,
        ]);

        return redirect()->back()->with("OK", "Berhasil mengubah data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBidangGuestHouse  $dataBidangGuestHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databidang_guesthouse = DataBidangGuestHouse::findOrFail($id);
        $databidang_guesthouse->delete();

        return redirect()->back()->with("OK", "Berhasil menghapus data");
    }

    public function dataBidangGuestHouseImport(Request $request)
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
        $file->move('data_bidang_guesthouse', $nama_file);

        // import data
        Excel::import(new DataBidangGuestHouseImport, public_path('/data_bidang_guesthouse/' . $nama_file));

        // alihkan halaman kembali
        return redirect()->back()->with('OK', 'Berhasil mengimport data');
    }
}
