@extends('layouts.master')

@section('content')
<a href="{{ route('fasilitas-kamar.index') }}">
    <button class="btn btn-primary mb-3">
        Kembali
    </button>
</a>

<div class="card bg-primary text-white mx-auto" style="width: 30vw">
    <div class="card-body">
        <h5 class="card-title">Edit Fasilitas Kamar</h5>
        <form action="/admin/fasilitas-kamar/{{ $fasilitasKamar->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-text mb-2">
                <label for="nama_kamar">Nama Kamar</label>
                <select name="kamar_id" id="nama_kamar" class="form-select">
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}" {{ $kamar->id == $fasilitasKamar->kamar_id ? 'selected' : ''  }}>{{ $kamar->nama_kamar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-text mb-2">
                <label for="nama_fasilitas">Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" value="{{ $fasilitasKamar->nama_fasilitas }}">
            </div>
            <div class="card-text mb-2">
                <label for="deskripsi">Deskripsi Fasilitas</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $fasilitasKamar->deskripsi }}</textarea>
            </div>
            <div class="card-text mb-2">
                <label for="foto">Foto Fasilitas</label>
                <img src="{{ asset('img/fasilitas/' . $fasilitasKamar->foto) }}" alt="" id="preview" class="w-100">
                <input class="form-control" type="file" name="foto" id="foto" placeholder="Masukkan foto fasilitas" required>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Edit</button>
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