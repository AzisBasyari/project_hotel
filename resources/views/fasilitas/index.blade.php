@extends('layouts.master')

@section('content')
<a href="{{ route('admin.home') }}">
    <button class="btn btn-primary mb-3">
        Kembali
    </button>
</a>

<table class="table table-primary">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Kamar</th>
            <th>Nama Fasilitas</th>
            <th colspan="2">Aksi</th>
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
            <td><a href="/admin/fasilitas-kamar/{{ $fasilitas->id }}/edit">
                <button class="btn btn-primary">
                    Edit
                </button>
            </a></td>
            <td>
                <form action="/admin/fasilitas-kamar/{{ $fasilitas->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('fasilitas-kamar.create') }}">
    <button class="btn btn-primary">
        Tambah Fasilitas Kamar
    </button>
</a>
@endsection