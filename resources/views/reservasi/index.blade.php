@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<div class="card bg-primary text-white mx-auto" style="width: 50vw" id="form">
    <div class="card-body">
        <h5 class="card-title">Reservasi</h5>
        <form action="{{ route('reservasi.store') }}" method="post">
            @csrf
            <div class="card-text mb-2">
                <label for="nama">Nama Pemesan</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="no_telepon">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="kamar_id">Nama Kamar</label>
                <select name="kamar_id" id="kamar_id" class="form-select" required>
                    <option value="">Pilih Kamar</option>
                    <option value="" disabled>-------------------</option>
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}" data-bs-harga="{{ $kamar->harga }}">{{ $kamar->nama_kamar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-text mb-2">
                <label for="jumlah_kamar">Jumlah Kamar</label>
                <input type="number" min="1" name="jumlah_kamar" id="jumlah_kamar" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="check_in">Tanggal Check In</label>
                <input type="date" name="check_in" id="check_in" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="check_out">Tanggal Check Out</label>
                <input type="date" name="check_out" id="check_out" class="form-control" required>
            </div>
            <div class="card-text mb-2">
                <label for="total_harga">Total Harga</label>
                <input type="number" min="1" name="total_harga" id="total_harga" class="form-control" readonly>
            </div>
            <div class="card-text d-flex justify-content-end">
                <button type="submit" class="btn btn-light">Reservasi</button>
            </div>
        </form>
    </div>
  </div>

<script>
    let namaKamar = document.getElementById('kamar_id')
    let jumlah = document.getElementById('jumlah_kamar')
    let tampilHarga = document.querySelector('#total_harga')
    let tgl_out = document.getElementById('check_out')
    let checkin = document.querySelector('#check_in')
    let checkout = document.querySelector('#check_out')

    function printForm(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

    document.addEventListener('change', function(event){
        let harga = namaKamar.options[namaKamar.selectedIndex];
        let hargaKamar = harga.getAttribute('data-bs-harga');

        let jumlahKamar = jumlah.value;
        
        let totalHarga = hargaKamar * jumlahKamar;

        let masuk = new Date(checkin.value);
        let hariMasuk = masuk.getDate();

        let max_checkout = masuk.getFullYear() + '-' + ("0" + (masuk.getMonth() + 1)).slice(-2) + '-' + ("0" + masuk.getDate()).slice(-2);

        tgl_out.min = max_checkout;
        let keluar = new Date(checkout.value)
        let hariKeluar = keluar.getDate();

        let lamaMenginap = hariKeluar - hariMasuk + 1;

        tampilHarga.value = totalHarga * lamaMenginap;
    });
</script>
@endsection