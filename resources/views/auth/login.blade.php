@extends('layouts.master')

@section('navbar')
@endsection

@section('content')
<div class="card bg-primary text-white mx-auto" style="width: 30vw">
    <div class="card-body">
        <h5 class="card-title">Masuk</h5>
        <form action="{{ route('login.store') }}" method="post">
            @csrf
            <div class="card-text mb-2">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="Masukkan email anda" required>
            </div>
            <div class="card-text mb-2">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan password anda" required>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Masuk</button>
            </div>
        </form>
    </div>
  </div>
@endsection