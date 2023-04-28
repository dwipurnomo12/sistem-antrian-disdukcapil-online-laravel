@extends('dashboard.layouts.main')

@section('container')

@include('dashboard.antrian.create')

<div class="row">
    <div class="col-xl">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Menu Antrian</h6>
                <!-- Button untuk Menampilkan Modal Tambah -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-menu-antrian">
                    <i class="bi bi-plus-square"></i> Tambah antrian Baru
                </button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Antrian</th>
                                <th>Deskripsi</th>
                                <th>Batas Antrian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- Menampilkan List Data Antrian Yang Tersedia -->
                        <tbody>
                            @foreach ($antrians as $antrian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $antrian->nama_layanan }}</td>
                                    <td>{{ $antrian->deskripsi }}</td>
                                    <td>{{ $antrian->batas_antrian }}</td>
                                    <td>
                                        <!-- Button Untuk Mengedit Antrian Yang Teresdia -->
                                        <a href="/dashboard/antrian/{{ $antrian->slug }}/edit" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="bi bi-pencil-square"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <!-- Button Untuk Menghapus Antrian Yang Teresdia -->
                                        <form id="{{ $antrian->id }}" action="/dashboard/antrian/{{ $antrian->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <div class="btn-danger btn-icon-split mb-2 swal-confirm" data-form="{{ $antrian->id }}">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Datatable -->
<script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>

<!-- Autofill dan Autocomplete dari Database/Tabel Layanan -->
<script>
    $(function(){
      $('#nama_layanan').autocomplete({
        source:function(request,response){
          $.getJSON('{{ url('api/dashboard/antrian') }}?term='+request.term, function(data){
            var array = $.map(data, function(row){
              return{
                value:row.nama_layanan,
                label:row.nama_layanan,
                name:row.nama_layanan,
                deskripsi:row.deskripsi,
                kode:row.kode,
              }
            })
            response($.ui.autocomplete.filter(array,request.term));
          })
        },
        minLength:1,
        delay:500,
        select:function(event,ui){
          $('#deskripsi').val(ui.item.deskripsi)
          $('#kode').val(ui.item.kode)
        }
      })
    })
  </script>
@endsection