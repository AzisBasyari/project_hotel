<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use Illuminate\Support\Facades\File;
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
        $namaFoto = $validatedData['nama_fasilitas'] . '-hotel' .'.' . $request->foto->extension();
        
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
        $fasilitas = FasilitasHotel::findOrFail($fasilitasHotel->id);

        return view('hotel.edit', compact('fasilitas'));
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
        $validatedData = $request->validated();


        if ($request->hasFile('foto')){
            $image_path = public_path("/img/hotel/".$fasilitasHotel->foto);
            if (File::exists($image_path)) {
               unlink($image_path);
            }
            $namaFoto = $validatedData['nama_fasilitas'] . '-hotel' .'.'. $request->foto->extension();
            $validatedData['foto']->move(public_path('img/hotel/'), $namaFoto);

            $validatedData['foto'] = $namaFoto;
    
        }


        if(FasilitasHotel::where('id', $fasilitasHotel->id)->update($validatedData)){
            return redirect(route('fasilitas-hotel.index'))->with('success', 'Fasilitas Berhasil Diedit!');
        } else {
            return redirect(route('fasilitas-hotel.index'))->with('error', 'Fasilitas Gagal Diedit!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitasHotel)
    {
        $fasilitas = FasilitasHotel::findOrFail($fasilitasHotel->id);

        $foto = public_path().'/img/hotel/'.$fasilitas->foto;
        unlink($foto);

        // unlink( public_path().'/img/hotel/'. 'Kolam Renang.jpg');
        
        if($fasilitas->delete()){
            return redirect()->route('fasilitas-hotel.index');
        } else {
            return redirect()->route('fasilitas-hotel.index')->with('error');
        }
    }
}
