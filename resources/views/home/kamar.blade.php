@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <h1>Kamar</h1>

        <div class="row row-cols-3">
            @foreach ($kamars as $kamar)
                <div class="col mb-3">
                    <div class="card bg-secondary text-white w-100 h-100">
                        <img src="{{ asset('img/kamar/' . $kamar->foto) }}" class="card-img-top mx-auto w-100" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $kamar->nama_kamar }}</h4>
                            <p class="card-text">Rp{{ $kamar->harga }}</p>
                            <p class="card-text">{{ $kamar->deskripsi }}</p>
                            <div class="">
                                Fasilitas
                                <ol>
                                    @foreach ($kamar->fasilitasKamar as $fasilitas)
                                        <li>{{ $fasilitas->nama_fasilitas }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        {{-- <div class="card-footer d-flex justify-content-end">
                            <a href="/kamar/{{ $kamar->id }}">
                                <button class="btn btn-light px-4 py-1 rounded-pill">
                                    Detail
                                </button>
                            </a>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>

    {{ $kamars->links() }}
    </div>
@endsection