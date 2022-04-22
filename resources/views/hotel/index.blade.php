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
            <th>Nama Fasilitas</th>
            <th colspan="2">Aksi</th>
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
            <td>
                <a href="/admin/fasilitas-hotel/{{ $fasilitas->id }}/edit">
                    <button class="btn btn-primary">
                        Edit
                    </button>
                </a>
            </td>
            <td>
                <form action="/admin/fasilitas-hotel/{{ $fasilitas->id }}" method="post">
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


<a href="{{ route('fasilitas-hotel.create') }}">
    <button class="btn btn-primary">
        Tambah Fasilitas Hotel
    </button>
</a>
    
@endsection