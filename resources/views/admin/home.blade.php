@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <ul class="nav nav-fill">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('kamar.index') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Kamar
                </button>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('fasilitas-kamar.index') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Fasilitas Kamar
                </button>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('fasilitas-hotel.index') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Fasilitas Hotel
                </button>
            </a>
        </li>
    </ul>

    <section class="my-5">
        <div class="row row-cols-3">
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Tipe Kamar
                        </h3>
                        <h1 class="card-text">
                            {{ $kamar }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Fasilitas Kamar
                        </h3>
                        <h1 class="card-text">
                            {{ $fasilitasKamar }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Fasilitas Hotel
                        </h3>
                        <h1 class="card-text">
                            {{ $fasilitasHotel }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
