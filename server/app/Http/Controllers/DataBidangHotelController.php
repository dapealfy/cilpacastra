<?php

namespace App\Http\Controllers;

use App\DataBidangHotel;
use Illuminate\Http\Request;

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
}
