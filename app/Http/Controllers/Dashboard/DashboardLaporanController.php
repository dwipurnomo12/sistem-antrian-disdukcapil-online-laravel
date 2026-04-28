<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Antrian;
use App\Models\Ambilantrian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class DashboardLaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data filter dari request
        $antrian_id = $request->input('antrian_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        // Query dasar untuk data ambilantrians
        $query = Ambilantrian::query();

        // Filter berdasarkan antrian_id jika ada
        if ($antrian_id) {
            $query->where('antrian_id', $antrian_id);
        }

        //Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Filter berdasarkan rentang tanggal jika ada
        if ($start_date && $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        } elseif ($start_date) {
            $query->where('tanggal', '>=', $start_date);
        } elseif ($end_date) {
            $query->where('tanggal', '<=', $end_date);
        }

        // Dapatkan data ambilantrian yang telah difilter
        $ambilantrians = $query->with('antrian')->get(); // Include nama layanan dari relasi antrian

        // Dapatkan semua layanan untuk filter
        $antrians = Antrian::all();

        // Kembalikan view dengan data antrian
        return view('dashboard.laporan-antrian.index', [
            'ambilantrians' => $ambilantrians,
            'antrians'      => $antrians,
        ]);
    }

    public function exportPdf(Request $request)
    {
        // Ambil data filter dari request
        $antrian_id = $request->input('antrian_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        // Query dasar untuk data ambilantrians
        $query = Ambilantrian::query();

        // Filter berdasarkan antrian_id jika ada
        if ($antrian_id) {
            $query->where('antrian_id', $antrian_id);
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        // Filter berdasarkan rentang tanggal jika ada
        if ($start_date && $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        } elseif ($start_date) {
            $query->where('tanggal', '>=', $start_date);
        } elseif ($end_date) {
            $query->where('tanggal', '<=', $end_date);
        }

        // Dapatkan data ambilantrian yang telah difilter
        $ambilantrians = $query->with('antrian')->get(); // Include nama layanan dari relasi antrian

        // Dapatkan semua layanan untuk filter
        $antrians = Antrian::all();

        // Generate PDF
        $pdf = Pdf::loadView('dashboard.laporan-antrian.pdf', [
            'ambilantrians' => $ambilantrians,
            'antrians'      => $antrians,
            'antrian_id'    => $antrian_id,
            'start_date'    => $start_date,
            'end_date'      => $end_date,
            'status'        => $status
        ]);

        return $pdf->download('laporan-antrian.pdf');
    }
}
