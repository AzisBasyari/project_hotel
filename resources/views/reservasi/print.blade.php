@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="card bg-primary text-white mx-auto mb-5" style="width: 30vw">
    <div class="card-body">
        <h5 class="card-title">Data Reservasi</h5>
        <div class="card-text mb-2">
            <label for="nama">Nama Pemesan</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $reservasi->nama }}" readonly>
            <div class="card-text mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $reservasi->email }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="no_telepon">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $reservasi->no_telepon }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="kamar_id">Nama Kamar</label>
                <input type="text" name="nama_kamar" id="nama_kamar" class="form-control" value="{{ $reservasi->kamar->nama_kamar }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="jumlah_kamar">Jumlah Kamar</label>
                <input type="number" min="1" name="jumlah_kamar" id="jumlah_kamar" class="form-control" value="{{ $reservasi->jumlah_kamar }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="check_in">Tanggal Check In</label>
                <input type="date" name="check_in" id="check_in" class="form-control" value="{{ $reservasi->check_in }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="check_out">Tanggal Check Out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" value="{{ $reservasi->check_out }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="total_harga">Total Harga</label>
                <input type="number" min="1" name="total_harga" id="total_harga" class="form-control" value="{{ $reservasi->total_harga }}" readonly>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="button" class="btn btn-light" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
  </div>
@endsection