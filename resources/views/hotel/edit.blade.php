@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="d-flex justify-content-between">
    <a href="{{ route('fasilitas-hotel.index') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Kembali
        </button>
    </a>
</div>

<div class="card bg-secondary rounded mb-5 text-white mx-auto w-75">
    <div class="card-body">
        <h5 class="card-title">Edit Fasilitas Kamar</h5>
        <form action="/admin/fasilitas-hotel/{{ $fasilitas->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-text mb-2">
                <label for="nama_fasilitas">Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" value="{{ $fasilitas->nama_fasilitas }}">
            </div>
            <div class="card-text mb-2">
                <label for="deskripsi">Deskripsi Fasilitas</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $fasilitas->deskripsi }}</textarea>
            </div>
            <div class="card-text mb-2">
                <label for="foto">Foto Fasilitas</label>
                <img src="{{ asset('img/hotel/' . $fasilitas->foto) }}" alt="" id="preview" class="w-100 mb-3">
                <input class="form-control" type="file" name="foto" id="foto" placeholder="Masukkan foto fasilitas" required>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="submit" class="btn btn-light rounded-pill px-4 py-1 mt-3">Edit</button>
            </div>
        </form>
    </div>
  </div>

  <script>
      foto.onchange = evt => {
        const [file] = foto.files
        if (file) {
          preview.src = URL.createObjectURL(file)
        }
      }
  </script>
@endsection