@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="d-flex justify-content-between">
    <a href="{{ route('kamar.index') }}">
        <button class="btn btn-secondary mb-3 rounded-pill px-4 py-1">
            Kembali
        </button>
    </a>
</div>

<div class="card bg-secondary rounded mb-5 text-white mx-auto w-75">
    <div class="card-body">
        <h5 class="card-title">Edit Data Kamar</h5>
        <form action="/admin/kamar/{{ $kamar->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-text mb-2">
                <label for="nama_kamar">Nama Kamar</label>
                <input class="form-control" type="text" name="nama_kamar" id="nama_kamar" placeholder="Masukkan nama kamar" value="{{ $kamar->nama_kamar }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="jumlah_kamar">Jumlah Kamar</label>
                <input class="form-control" type="number" min="1" name="jumlah_kamar" id="jumlah_kamar" placeholder="Masukkan jumlah kamar" value="{{ $kamar->jumlah_kamar }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="harga">Harga Kamar</label>
                <input class="form-control" type="number" min="100000" step="1000" name="harga" id="harga" placeholder="Masukkan harga kamar" value="{{ $kamar->harga }}" required>
            </div>
            <div class="card-text mb-2">
                <label for="deskripsi">Deskripsi Kamar</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $kamar->deskripsi }}</textarea>
            </div>
            <div class="card-text mb-2">
                <label for="foto">Foto Kamar</label>
                <img src="{{ asset('img/kamar/' . $kamar->foto) }}" alt="" id="preview" class="w-100 mb-3">
                <input class="form-control" type="file" name="foto" id="foto" placeholder="Masukkan foto kamar" required>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="submit" class="btn btn-light rounded-pill px-4 py-1 mt-3">Tambah</button>
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