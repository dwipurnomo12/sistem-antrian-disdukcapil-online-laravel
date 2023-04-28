@extends('layouts.main')

@section('container')
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Antrian</h2>
        <p>List Daftar Antrian</p>
      </div>

      <!-- Menampilkan List Layanan yang Tersedia Di Halaman Depan Agar User Lain Bisa Melihat -->
      <div class="row">
            @foreach ($antrianList as $key => $antrian)
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4>{{ $antrian->nama_layanan }}</h4>
                    <div class="mt-3">
                        <a href="/daftar-antrian/{{ $antrian->slug }}" class="btn btn-primary mb-2">Cek List Antrian</a>
                    </div>
                    </div>
                </div>
            @endforeach
      </div>
    </div>
  </section><!-- End Services Section --> 

@endsection