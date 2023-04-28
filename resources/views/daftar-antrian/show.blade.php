

@extends('layouts.main')

@section('container')
<section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Antrian</h2>
        <p>Daftar Antrian {{ $listPendaftar->nama_layanan }}</p>
      </div>

      <div class="row">
        <div class="col">
            <div class="row mb-3">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="tanggal">Pilih Tanggal Antrian (Format : bulan - tanggal - tahun)</label>
                        <input type="date" class="form-control mt-2" id="tanggal">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tanggal">Reset Filter</label>
                        <button id="reset-filter" class="btn btn-primary mt-2"><i class="bi bi-arrow-clockwise"></i> Reset Filter</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl. Antrian</th>
                            <th>Nama</th>
                            <th>Nomor Antrian</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Menampilkan List Pengambil Antrian Berdasarkan Layanan Di Halaman Depan Agar User Lain Bisa Melihat -->
                        @foreach ($listPendaftar->ambilantrians as $antrian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $antrian->tanggal }}</td>
                                <td>{{ $antrian->nama_lengkap }}</td>
                                <td>{{ $antrian->kode }}</td>
                                <td>{{ $antrian->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
   
        </div>
      </div>
    </div>
  </section><!-- End Services Section --> 

  <script>
    $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#dataTable').DataTable();

            // Ketika tanggal berubah, atur filter pada DataTable
            $('#tanggal').on('change', function() {
                var tanggal = $('#tanggal').val();
                table.columns(1).search(tanggal).draw();
            });

            // Ketika tombol reset di klik, hapus filter pada DataTable
            $('#reset-filter').on('click', function() {
            $('#tanggal').val('');
            $('#antrian_id').val('').trigger('change');
            table.columns().search('').draw();
        });
    });

    </script>
@endsection