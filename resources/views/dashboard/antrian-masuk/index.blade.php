@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-xl">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Antrian Masuk Layanan {{ $antrian->nama_layanan }}</h6>
                <form id="{{ $antrian->slug }}" action="/dashboard/antrian-masuk/{{ $antrian->slug }}/reset" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-primary reset-confirm" data-form="{{ $antrian->slug }}"><i class="bi bi-arrow-clockwise"></i> Reset Antrian</button>
                </form>
              
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="text-align: center">
                        <tr>
                          <th>Nomor Antrian</th>
                          <th>Nama Lengkap</th>
                          <th>Alamat</th>
                          <th>Nomor HP</th>
                          <th>Panggil</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center">
                        <!-- Query Database Untuk Menampilkan Data User Yang Mengambil Antrian Dengan Kondisi Diurutkan Berdasarkan field created_at secara Ascending dan ditampilkan hanya data yag terbaru -->
                        @php
                          use Illuminate\Support\Carbon;
                          $antrian_masuk = $antrian->ambilantrians()
                            ->whereDate('tanggal', Carbon::now()->setTimezone('Asia/Jakarta'))
                            ->orderBy('created_at', 'asc')
                            ->first();
                        @endphp
                  
                        <!-- Menampilkan Antrian Masuk yang sesuai dengan tanggal saat ini -->
                        @if ($antrian_masuk)
                          <tr>
                            <td style="font-size: 20px; font-weight: bold;">{{ $antrian_masuk->kode }}</td>
                            <td>{{ $antrian_masuk->nama_lengkap }}</td>
                            <td>{{ $antrian_masuk->alamat }}</td>
                            <td>{{ $antrian_masuk->nomorhp }}</td>
                            <td>
                              <!-- Memutar Suara Pemanggilan Antrian -->
                              <body onunload="responsiveVoice.cancel();">
                                <button class="btn btn-primary" onclick="responsiveVoice.speak('Nomor Antrian {{ $antrian_masuk->kode }} Menuju ke loket {{ $antrian_masuk->antrian->nama_layanan }}', 'Indonesian Female', {rate: 0.8});" onblur="responsiveVoice.cancel();" type="button" value="Play"><i class="bi bi-mic"></i></button>
                              </body>
                            </td>
                            <td>
                              <!-- Button Ada untuk menghapus data antrian jika User yang dipanggil ada -->
                              <form id="{{ $antrian_masuk->id }}" action="/dashboard/antrian-masuk/{{ $antrian_masuk->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-success"><i class="bi bi-check2-all"></i> Ada</button>
                              </form>
                  
                              <!-- MButton Lewati jika pengambil antrian belum datang maka akan diurutkan ke bawah lagi -->
                              <form id="{{ $antrian_masuk->id }}" action="/dashboard/antrian-masuk/{{ $antrian_masuk->id }}/skip" method="POST" class="d-inline">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-skip-forward"></i> Lewati</button>
                              </form>
                            </td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>       
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>

  
    
@endsection