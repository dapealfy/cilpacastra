<?php

namespace App\Http\Controllers;

use App\Imports\DataBidangHotelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\DataBidangHotel;

class DataBidangHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databidang_hotel['databidang_hotel'] = DataBidangHotel::orderBy('id')->get();
        
        return view('dashboard.databidang.hotel.index', $databidang_hotel);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataBidangHotel  $dataBidangHotel
     * @return \Illuminate\Http\Response
     */
    public function show(DataBidangHotel $dataBidangHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataBidangHotel  $dataBidangHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(DataBidangHotel $dataBidangHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataBidangHotel  $dataBidangHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBidangHotel $dataBidangHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataBidangHotel  $dataBidangHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataBidangHotel $dataBidangHotel)
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
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('data_bidang_hotel', $nama_file);
 
		// import data
		Excel::import(new DataBidangHotelImport, public_path('/data_bidang_hotel/' . $nama_file));
 
		// alihkan halaman kembali
		return redirect()->back()->with('OK', 'Berhasil mengimport data');
	}
}
