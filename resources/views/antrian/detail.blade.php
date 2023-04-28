@extends('layouts.main')

@section('container')


    <!-- ======= View Detail Antrian User ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Antrian</h2>
            <p>Detail Antrian {{ auth()->user()->name }}</p>
          </div>
  
          <div class="row">

            <!-- Menampilkan Alert Sukses -->
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col">
              <!-- Mengecek Kondisi Apakah User Sudah Mengambil Antrian Atau Belum, Jika belum maka tampilkan alert ini -->
              @if ($detailAntrian->isEmpty())
                <div class="alert alert-warning" role="alert"> Anda belum mengambil antrian dari layanan apapun. Silahkan ambil di Menu <a href="/antrian" class="alert-link">Ambil Antrian</a> </div>
              <!-- Jika sudah mengisi sebelumnya, maka tampilkan Datanya -->
              @else
                @foreach ($detailAntrian as $detail)
                <div class="card mb-4">
                  <div class="card-header">
                      Detail Antrian
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <p class="text-muted">Nama</p>
                          <h5>{{ $detail->nama_lengkap }}</h5>
                        </div>
                        <div class="col-md-4">
                          <p class="text-muted">Nomor Antrian</p>
                          <h5>{{ $detail->kode }}</h5>
                        </div>
                        <div class="col-md-4">
                          <p class="text-muted">Layanan</p>
                          <h5>{{ $detail->antrian->nama_layanan }}</h5>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-4">
                          <p class="text-muted">Alamat</p>
                          <h5>{{ $detail->alamat }}</h5>
                        </div>
                        <div class="col-md-4">
                          <p class="text-muted">Tanggal Datang</p>
                          <h5> {{ date('d-m-Y', strtotime($detail->tanggal)) }}</h5>
                        </div>
                        <div class="col-md-4">
                          <p class="text-muted">Aksi</p>
                          <div class="btn-group" role="group">

                            <!-- Hapus Detail Antrian Yang Diambil User-->
                            <form id="{{ $detail->id }}" action="/antrian/detail/{{ $detail->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-icon-split mb-2 swal-confirm" data-form="{{ $detail->id }}">
                                    <span class="icon text-white-100">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </button>
                            </form>

                             <!-- Cetak Detail Antrian Yang Diambil User-->
                            <a class="btn btn-success btn-icon-split mb-2" href="/antrian/kode-antrian/{{ $detail->id }}" target="_blank" role="button">
                                <span class="icon text-white-100">
                                    <i class="bi bi-printer"></i>
                                </span>
                                <span class="text">Cetak</span>
                            </a>
                        </div>
                        
                        </div>
                      </div>
                  </div>
                </div>    
                @endforeach  
              @endif
            </div>        
          </div>

        </div>
      </section>
@endsection