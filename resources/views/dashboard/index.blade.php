@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-xl">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 200px;"
                                src="/assets/img/about.png" alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p class="mt-5">
                            Selamat Datang {{ auth()->user()->roles}}, Sistem antrian Dukcapil (Dinas Kependudukan dan Catatan Sipil) online adalah platform yang memungkinkan orang untuk melakukan reservasi online untuk pelayanan administrasi kependudukan dan catatan sipil di kantor Dukcapil yang telah ditentukan. Dengan sistem ini, pengguna dapat melakukan reservasi dengan mudah dan menghindari antrean yang panjang di kantor Dukcapil.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Antian Masuk</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    @foreach ($antrianList as $key => $antrian)
                    <div class="col-lg-3 mb-4">
                        <div class="card bg-primary text-white shadow">
                            <div class="card-body">
                                <a href="/dashboard/antrian-masuk/{{ $antrian->slug }}" style="color: white; text-decoration: none">{{ $antrian->nama_layanan }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection