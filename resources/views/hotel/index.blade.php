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

    <a href="{{ route('fasilitas-hotel.create') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Tambah Fasilitas Hotel
        </button>
    </a>
</div>

<table class="table table-secondary">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Fasilitas</th>
            <th>Deskripsi</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fasilitasHotels as $fasilitas)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ asset('img/hotel/' . $fasilitas->foto) }}" alt="" width="100px">
            </td>
            <td>{{ $fasilitas->nama_fasilitas }}</td>
            <td>{{ $fasilitas->deskripsi }}</td>
            <td class="text-center">
                <a href="/admin/fasilitas-hotel/{{ $fasilitas->id }}/edit">
                    <button class="btn btn-secondary rounded-pill px-4 py-1">
                        Edit
                    </button>
                </a>
            </td>
            <td class="text-center">
                <form action="/admin/fasilitas-hotel/{{ $fasilitas->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-secondary rounded-pill px-4 py-1">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection