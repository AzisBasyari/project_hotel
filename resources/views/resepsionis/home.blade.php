@extends('layouts.master')

@section('content')
    {{ auth()->user()->role }}
    <div class="my-2">
        <a href="{{ route('resepsionis.pending') }}">
            <button class="btn btn-primary">
                Pending
            </button>
        </a>
    </div>
    <div class="my-2">
        <a href="{{ route('resepsionis.checkin') }}">
            <button class="btn btn-primary">
                Check In
            </button>
        </a>
    </div>
    <div class="my-2">
        <a href="{{ route('resepsionis.checkout') }}">
            <button class="btn btn-primary">
                Check Out
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