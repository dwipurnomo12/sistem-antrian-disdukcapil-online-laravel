@extends('dashboard.layouts.main')

@section('container')
    @include('dashboard.layanan.create')


    <div class="row">
        <div class="col-xl">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Verifikasi Akun Pendaftar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Menampilkan semua data layanan -->
                                @foreach ($pendaftars as $pendaftar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendaftar->name }}</td>
                                        <td>{{ $pendaftar->email }}</td>
                                        <td>
                                            @if ($pendaftar->is_verification == 0)
                                                <div class="badge badge-warning">
                                                    Belum diverifikasi
                                                </div>
                                            @else
                                                <div class="badge badge-warning">
                                                    Terverifikasi
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Button untuk mengupdate status verifikasi -->
                                            <form action="/dashboard/pendaftar/{{ $pendaftar->id }}/verifikasi"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin data ini sudah diverifikasi?')">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </span>
                                                    <span class="text">Verifikasi</span>
                                                </button>
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
