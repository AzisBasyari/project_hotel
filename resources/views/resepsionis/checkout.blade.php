@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <a href="{{ route('resepsionis.home') }}">
            <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
                Kembali
            </button>
        </a>
    </div>



    <div class="mb-3">
        <form action="/resepsionis/checkout" method="get">
            @csrf
            <label for="search" class="form-label">Cari Berdasarkan Tanggal<span class="text-danger">*</span>, Nama
                Pemesan, Kamar,
                dan Email</label>
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Cari"
                        value="{{ request('search') }}">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-secondary rounded-pill px-5">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/search.png">
                    </button>
                </div>
                <div class="col-1">
                    <a href="/resepsionis/checkout" role="button" class="btn btn-secondary rounded-pill px-5">
                        <img src="https://img.icons8.com/material-rounded/24/ffffff/reset.png">
                    </a>
                </div>
            </div>
            <span class="text-danger">*Format pencarian berdasarkan tanggal adalah menggunakan angka, contoh: 2022-12-31
                (Tahun-Bulan-Tanggal)</span>
        </form>
    </div>

    <table class="table table-secondary table-hover">
        <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Nama Kamar</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Jumlah Kamar</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($checkout as $reservasi)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $reservasi->nama }}</td>
            <td>{{ $reservasi->email }}</td>
            <td>{{ $reservasi->no_telepon }}</td>
            <td>{{ $reservasi->kamar->nama_kamar }}</td>
            <td>{{ $reservasi->check_in }}</td>
            <td>{{ $reservasi->check_out }}</td>
            <td>{{ $reservasi->jumlah_kamar }}</td>
            <td>{{ $reservasi->total_harga }}</td>
            <td>
                <form action="/reservasi/{{ $reservasi->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-secondary rounded-pill px-3 py-1">
                        delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $checkout->links() }}
@endsection