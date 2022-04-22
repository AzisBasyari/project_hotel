<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Http\Requests\StoreFasilitasHotelRequest;
use App\Http\Requests\UpdateFasilitasHotelRequest;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $fasilitasHotels = FasilitasHotel::all();
        return view('hotel.index', compact(['fasilitasHotels', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.buat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFasilitasHotelRequest $request)
    {
        $validatedData = $request->validated();
        $namaFoto = $validatedData['nama_fasilitas'] .'.'. $request->foto->extension();
        
        // dd($namaFoto);
        $validatedData['foto']->move(public_path('img/hotel'), $namaFoto);
        
        $validatedData['foto'] = $namaFoto;
        // dd($validatedData);

        if(FasilitasHotel::create($validatedData)){
            return redirect()->route('fasilitas-hotel.index');
        } else {
            return redirect()->back()->with('error', 'Gagal Tambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasHotelRequest  $request
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFasilitasHotelRequest $request, FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitasHotel)
    {
        //
    }
}
