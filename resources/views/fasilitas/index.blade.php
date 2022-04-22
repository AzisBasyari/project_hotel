@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="d-flex justify-content-between">
    <a href="{{ route('admin.home') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Kembali
        </button>
    </a>

    <a href="{{ route('fasilitas-kamar.create') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Tambah Fasilitas Kamar
        </button>
    </a>
</div>

<table class="table table-secondary">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Kamar</th>
            <th>Nama Fasilitas</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fasilitasKamars as $fasilitas)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ asset('img/fasilitas/' . $fasilitas->foto) }}" alt="" width="100px">
            </td>
            <td>{{ $fasilitas->kamar->nama_kamar }}</td>
            <td>{{ $fasilitas->nama_fasilitas }}</td>
            <td class="text-center">
                <a href="/admin/fasilitas-kamar/{{ $fasilitas->id }}/edit">
                    <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
                        Edit
                    </button>
                </a>
            </td>
            <td class="text-center">
                <form action="/admin/fasilitas-kamar/{{ $fasilitas->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection