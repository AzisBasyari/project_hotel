@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('content')
<div class="row row-cols-3">
    @foreach ($kamar as $kamar)
    <div class="col mb-3">
    <div class="card w-100 h-100">
        <img src="{{ asset('img/kamar/' . $kamar->foto) }}" class="card-img-top mx-auto" style="width: 200px" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $kamar->nama_kamar}}</h5>
          <p class="card-text">{{ $kamar->deskripsi }}</p>
        </div>
    </div>
</div>
@endforeach
</div>
<div class="mt-3 d-flex justify-content-end">
    <a href="/kamar" class="btn btn-primary">Lihat Seluruh Kamar</a>
</div>

<div class="row row-cols-3 my-5">
    @foreach ($fasilitasHotel as $fasilitas)
    <div class="col mb-3">
    <div class="card w-100 h-100">
        <img src="{{ asset('img/hotel/' . $fasilitas->foto) }}" class="card-img-top mx-auto" style="width: 200px" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $fasilitas->nama_fasilitas}}</h5>
          <p class="card-text">{{ $fasilitas->deskripsi }}</p>
        </div>
    </div>
</div>
@endforeach
</div>
<div class="my-3 d-flex justify-content-end">
    <a href="/kamar" class="btn btn-primary">Lihat Seluruh Kamar</a>
</div>
    
@endsection