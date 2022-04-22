@extends('layouts.master')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <img src="{{ asset('img/hotel.jpg') }}" alt="" style="max-width: 80vw; border-radius: 20px">
    </div>

    <div class="container content">
        <div>
            <h1 class="text-center my-4">Tentang Kami</h1>
            <h6 class="text-center my-3">
                MYHotel adalah perusahaan perhotelan terkemuka, MYHotel terus melakukan pengembangan usaha dengan
                membuka
                banyak properti baru. Saat ini, kami telah memiliki empat hotel di beberapa lokasi di Indonesia, dimulai
                di
                Bandung, di Jakarta, di Bali, dan di Yogyakarta.

                Sebagai wajah baru di industri perhotelan, MYHotel hadir dengan cara yang progresif dan berpikir maju
                didukung dengan layanan yang inovatif dan pelayanan yang mengutamakan keramahan. Dengan konsep akomodasi
                kami yang otentik, kami bertujuan untuk memberi nilai lebih bagi tiap perjalanan. Karena itulah setiap
                properti didesain untuk mengutamakan kenyamanan.

                Hotel-hotel kami yang berlokasi di kota besar terletak di pusat kota sehingga memberi akses mudah untuk
                bepergian. Semua properti kami dilengkapi dengan fasilitas premium untuk memanjakan para tamu serta
                layanan
                berkelas internasional.

                Dengan portfolio kami yang terus bertambah serta rencana pembukaan hotel di lokasi-lokasi baru di
                Indonesia,
                MYHotel adalah partner yang tepat untuk perjalanan bisnis atau liburan Anda.
            </h6>
        </div>

        <h1 class="text-center my-4">Kamar</h1>

        <div class="row row-cols-3">
            @foreach ($kamar as $kamar)
                <div class="col mb-3">
                    <div class="card bg-secondary text-white w-100 h-100">
                        <img src="{{ asset('img/kamar/' . $kamar->foto) }}" class="card-img-top mx-auto w-100" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kamar->nama_kamar }}</h5>
                            <p class="card-text">{{ $kamar->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3 d-flex justify-content-end">
            <a href="/kamar" class="btn btn-secondary px-3 py-1 rounded-pill">Lihat Seluruh Kamar</a>
        </div>

        <h1 class="text-center my-4">Fasilitas</h1>
        <div class="row row-cols-3 my-5">
            @foreach ($fasilitasHotel as $fasilitas)
                <div class="col mb-3">
                    <div class="card bg-secondary text-white w-100 h-100">
                        <img src="{{ asset('img/hotel/' . $fasilitas->foto) }}" class="card-img-top mx-auto w-100"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $fasilitas->nama_fasilitas }}</h5>
                            <p class="card-text">{{ $fasilitas->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-3 d-flex justify-content-end">
            <a href="/kamar" class="btn btn-secondary rounded-pill px-3 py-1">Lihat Seluruh Kamar</a>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container-fluid bg-secondary ">
        <div class="container py-3">
            <span class="text-light"><strong>MYHotel &copy; 2022</strong> All rights
                reserved.</span>
        </div>
    </div>
@endsection
