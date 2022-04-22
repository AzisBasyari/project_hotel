<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreKamarRequest;
use App\Http\Requests\UpdateKamarRequest;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::with('fasilitasKamar')->get();
        $no = 1;
        return view('kamar.index', compact(['kamars', 'no']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.buat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKamarRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['ketersediaan'] = $validatedData['jumlah_kamar'];

        $namaFoto = $validatedData['nama_kamar'] .'.'. $request->foto->extension();
        
        // dd($namaFoto);
        $validatedData['foto']->move(public_path('img/kamar'), $namaFoto);

        $validatedData['foto'] = $namaFoto;

        if(Kamar::create($validatedData)){
            return redirect()->route('kamar.index');
        } else {
            return redirect()->back()->with('error', 'Gagal Tambah');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        $kamar = Kamar::with('fasilitasKamar')->findOrFail($kamar->id);

        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKamarRequest $request, Kamar $kamar)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')){
            $image_path = public_path("/img/kamar/".$kamar->foto);
            if (File::exists($image_path)) {
               unlink($image_path);
            }
            $namaFoto = $validatedData['nama_kamar'] .'.'. $request->foto->extension();
            $validatedData['foto']->move(public_path('img/kamar'), $namaFoto);

            $validatedData['foto'] = $namaFoto;
    
        }


        if(Kamar::where('id', $kamar->id)->update($validatedData)){
            return redirect(route('kamar.index'))->with('success', 'Kamar Berhasil Diedit!');
        } else {
            return redirect(route('kamar.index'))->with('error', 'Kamar Gagal Diedit!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar = Kamar::with('fasilitasKamar')->findOrFail($kamar->id);

        $foto = public_path().'/img/kamar/'.$kamar->foto;
        unlink($foto);

        if($kamar->fasilitasKamar->first() !== null){
            $fotoFasilitas = public_path().'/img/fasilitas/'.$kamar->fasilitasKamar->first()->foto;
            unlink($fotoFasilitas);
        }

        if($kamar->delete()){
            return redirect()->route('kamar.index');
        } else {
            return redirect()->route('kamar.index')->with('error');
        }
    }
}
