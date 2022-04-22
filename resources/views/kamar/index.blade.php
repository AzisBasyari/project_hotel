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
            <th>Jumlah</th>
            <th>Ketersediaan</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kamars as $kamar)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ asset('img/kamar/' . $kamar->foto) }}" alt="" width="100px">
            </td>
            <td>{{ $kamar->nama_kamar }}</td>
            <td>{{ $kamar->jumlah_kamar }}</td>
            <td>{{ $kamar->ketersediaan }}</td>
            <td><a href="/admin/kamar/{{ $kamar->id }}/edit">
                <button class="btn btn-primary">
                    Edit
                </button>
            </a></td>
            <td>
                <form action="/admin/kamar/{{ $kamar->id }}" method="post">
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

<a href="{{ route('kamar.create') }}">
    <button class="btn btn-primary">
        Tambah Kamar
    </button>
</a>
    
@endsection