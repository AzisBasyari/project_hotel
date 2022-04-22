@extends('layouts.master')

@section('content')
    {{ auth()->user()->role }}
    <div class="my-2">
        <a href="{{ route('kamar.index') }}">
            <button class="btn btn-primary">
                Kamar
            </button>
        </a>
    </div>
    <div class="my-2">
        <a href="{{ route('fasilitas-kamar.index') }}">
            <button class="btn btn-primary">
                Fasilitas Kamar
            </button>
        </a>
    </div>
    <div class="my-2">
        <a href="{{ route('fasilitas-hotel.index') }}">
            <button class="btn btn-primary">
                Fasilitas Hotel
            </button>
        </a>
    </div>
    <div class="my-2">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    </div>
@endsection