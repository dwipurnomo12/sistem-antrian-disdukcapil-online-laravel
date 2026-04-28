@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-xl">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Antrian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Form Filter -->
                    <form action="/dashboard/laporan-antrian" method="GET">
                        <div class="form-group row">
                            <!-- Filter Nama Layanan -->
                            <div class="col-md-3">
                                <label for="antrian_id">Nama Layanan</label>
                                <select class="form-control" name="antrian_id" id="antrian_id">
                                    <option value="">Semua Layanan</option>
                                    @foreach ($antrians as $antrian)
                                        <option value="{{ $antrian->id }}"
                                            {{ request('antrian_id') == $antrian->id ? 'selected' : '' }}>
                                            {{ $antrian->nama_layanan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Filter Status Antrian Pendaftaran -->
                            <div class="col-md-3">
                                <label for="status">Status Pendaftaran</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">Semua Status</option>
                                    @foreach (['Dilayani', 'Tidak Datang'] as $status)
                                        <option value="{{ $status }}"
                                            {{ request('status') == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Filter Tanggal -->
                            <div class="col-md-3">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="/dashboard/laporan-antrian" class="btn btn-danger">Reset</a>
                                <!-- Button untuk Export PDF -->
                                <a href="{{ route('laporan.antrian.pdf', [
                                    'antrian_id' => request('antrian_id'),
                                    'start_date' => request('start_date'),
                                    'end_date' => request('end_date'),
                                    'status' => request('status'),
                                ]) }}"
                                    class="btn btn-success">Export PDF</a>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel Laporan Antrian -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor HP</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambilantrians as $antrian)
                                    <tr>
                                        <td></td>
                                        <td>{{ $antrian->tanggal }}</td>
                                        <td>{{ $antrian->kode }}</td>
                                        <td>{{ $antrian->nama_lengkap }}</td>
                                        <td>{{ $antrian->nomorhp }}</td>
                                        <td>{{ $antrian->antrian->nama_layanan }}</td>
                                        <td>
                                            @if ($antrian->status == 'Dilayani')
                                                <div class="badge badge-success">{{ $antrian->status }}</div>
                                            @else
                                                <div class="badge badge-danger">{{ $antrian->status }}</div>
                                            @endif
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
            var t = $('#dataTable').DataTable({
                "columnDefs": [{
                        "orderable": false,
                        "targets": 0
                    } // Kolom "No" tidak bisa diurutkan
                ],
                "order": [], // Tidak ada default sorting
                "createdRow": function(row, data, dataIndex) {
                    $('td', row).eq(0).html(dataIndex + 1); // Auto-numbering
                },
                "drawCallback": function(settings) {
                    var api = this.api();
                    var start = api.page.info().start;
                    api.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = start + i + 1;
                    });
                }
            });
        });
    </script>
@endsection
