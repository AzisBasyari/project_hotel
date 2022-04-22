@extends('layouts.master')

@section('content')
    {{ auth()->user()->role }}
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
            @foreach ($reservasi as $reservasi)
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
                        <button type="submit" class="btn btn-primary">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="my-2">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection