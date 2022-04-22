<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use App\Http\Requests\StoreReservasiRequest;
use App\Http\Requests\UpdateReservasiRequest;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $kamars = Kamar::all();
        return view('reservasi.index', compact(['kamars', 'no']));
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
     * @param  \App\Http\Requests\StoreReservasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservasiRequest $request)
    {
        $validatedData = $request->validated();
        $reservasi = Reservasi::create($validatedData);

        if($reservasi){
            return redirect('/reservasi/' . $reservasi->id);
        } else {
            return back()->with('error', 'reservasi gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi $reservasi)
    {
        $reservasi = Reservasi::findOrFail($reservasi->id);
        return view('reservasi.print', compact('reservasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi $reservasi)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservasiRequest  $request
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservasiRequest $request, Reservasi $reservasi)
    {
        $reservasi = Reservasi::findOrFail($reservasi->id);

        $reservasi->status = $request->status;

        if($reservasi->save()){
            return redirect()->route('resepsionis.pending');
        } else {
            return redirect()->back()->with('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi = Reservasi::findOrFail($reservasi->id);

        if($reservasi->delete()){
            return redirect()->route('resepsionis.checkout');
        } else {
            return redirect()->back()->with('error', 'hapus gagal');
        }
    }
}
