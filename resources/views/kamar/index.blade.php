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

    <a href="{{ route('kamar.create') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Tambah Kamar
        </button>
    </a>
</div>


<table class="table table-secondary table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Kamar</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kamars as $kamar)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ asset('img/kamar/' . $kamar->foto) }}" alt="" width="200px">
            </td>
            <td>{{ $kamar->nama_kamar }}</td>
            <td>{{ $kamar->jumlah_kamar }}</td>
            <td>{{ $kamar->harga }}</td>
            <td class="text-center"><a href="/admin/kamar/{{ $kamar->id }}/edit">
                <button class="btn btn-secondary rounded-pill px-4 py-1">
                    Edit
                </button>
            </a></td>
            <td class="text-center">
                <form action="/admin/kamar/{{ $kamar->id }}" method="post">
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