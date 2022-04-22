<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\FasilitasKamar;
use App\Http\Requests\StoreFasilitasKamarRequest;
use App\Http\Requests\UpdateFasilitasKamarRequest;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $fasilitasKamars = FasilitasKamar::with('kamar')->get();
        return view('fasilitas.index', compact(['fasilitasKamars', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamars = Kamar::get(['nama_kamar', 'id']);
        return view('fasilitas.buat', ['kamars' => $kamars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFasilitasKamarRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['kamar_id'] = $request->kamar_id;
        
        $namaFoto = $validatedData['nama_fasilitas'] .'.'. $request->foto->extension();
        
        // dd($namaFoto);
        $validatedData['foto']->move(public_path('img/fasilitas'), $namaFoto);
        
        $validatedData['foto'] = $namaFoto;
        // dd($validatedData);

        if(FasilitasKamar::create($validatedData)){
            return redirect()->route('fasilitas-kamar.index');
        } else {
            return redirect()->back()->with('error', 'Gagal Tambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasKamarRequest  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFasilitasKamarRequest $request, FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        //
    }
}
