<!DOCTYPE html>
<html>

<head>
    <title>Laporan Antrian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        .filter-info {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Laporan Antrian</h1>

    <div class="filter-info">
        <p><strong>Filter yang diterapkan:</strong></p>
        <ul>
            @if ($antrian_id)
                <li><strong>Nama Layanan:</strong> {{ $antrians->find($antrian_id)->nama_layanan }}</li>
            @else
                <li><strong>Nama Layanan:</strong> Semua Layanan</li>
            @endif

            @if (!empty($status))
                <li><strong>Status Pendaftaran:</strong> {{ $status }}</li>
            @else
                <li><strong>Status Pendaftaran:</strong> Semua Status</li>
            @endif

            @if ($start_date && $end_date)
                <li><strong>Rentang Tanggal:</strong> {{ $start_date }} hingga {{ $end_date }}</li>
            @elseif($start_date)
                <li><strong>Tanggal Mulai:</strong> {{ $start_date }}</li>
            @elseif($end_date)
                <li><strong>Tanggal Selesai:</strong> {{ $end_date }}</li>
            @else
                <li><strong>Rentang Tanggal:</strong> Semua Tanggal</li>
            @endif
        </ul>
    </div>


    <table>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $antrian->tanggal }}</td>
                    <td>{{ $antrian->kode }}</td>
                    <td>{{ $antrian->nama_lengkap }}</td>
                    <td>{{ $antrian->nomorhp }}</td>
                    <td>{{ $antrian->antrian->nama_layanan }}</td>
                    <td>{{ $antrian->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
