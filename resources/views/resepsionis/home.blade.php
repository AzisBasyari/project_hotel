@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <ul class="nav nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('resepsionis.pending') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Pending
                </button>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('resepsionis.checkin') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Check In
                </button>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('resepsionis.checkout') }}">
                <button class="btn btn-secondary rounded-pill px-5 py-1">
                    Check Out
                </button>
            </a>
        </li>
    </ul>

    <section class="my-5">
        <div class="row mb-5 justify-content-center">
            <div class="col">
                <div class="card bg-secondary text-white text-center">
                    <div class="card-body">
                        <h3 class="card-title">
                            Total
                        </h3>
                        <h1 class="card-text">
                            {{ $total }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-3">
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Pending
                        </h3>
                        <h1 class="card-text">
                            {{ $pending }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Check In
                        </h3>
                        <h1 class="card-text">
                            {{ $checkin }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h3 class="card-title">
                            Jumlah Check Out
                        </h3>
                        <h1 class="card-text">
                            {{ $checkout }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection