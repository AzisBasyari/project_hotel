@extends('layouts.master')

@section('content')
    <a href="{{ route('resepsionis.home') }}">
        <button class="btn btn-primary mb-3">
            Kembali
        </button>
    </a>

    <form action="/resepsionis/pending" method="get">
        @csrf
        <label for="search" class="form-label">Cari Berdasarkan Tanggal<span class="text-danger">*</span>, Nama Pemesan, Kamar,
            dan Email</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Cari" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary rounded-pill px-4">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/search.png">
            </button>
            <a href="/resepsionis/pending" role="button" class="btn btn-primary rounded-pill px-4">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/reset.png">
            </a>
        </form>
        <span class="text-danger">*Format pencarian berdasarkan tanggal adalah menggunakan angka, contoh: 2022-12-31 (Tahun-Bulan-Tanggal)</span>

    <table class="table table-primary">
        <thead>
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
            @foreach ($pending as $reservasi)
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
                            @method('put')
                            <button type="submit" class="btn btn-primary" name='status' value="checkin">
                                Check In
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pending->links() }}
@endsection
