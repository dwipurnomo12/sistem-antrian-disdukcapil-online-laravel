<?php

namespace App\Http\Controllers;

use App\Models\Ambilantrian;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data filter dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Query dasar untuk data ambilantrians
        $query = Ambilantrian::query();

        // Filter berdasarkan rentang tanggal jika ada
        if ($start_date && $end_date) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        } elseif ($start_date) {
            $query->where('tanggal', '>=', $start_date);
        } elseif ($end_date) {
            $query->where('tanggal', '<=', $end_date);
        }

        // Dapatkan data ambilantrian yang telah difilter
        $ambilantrians = $query->with('antrian')->get();

        // Hitung jumlah antrian berdasarkan nama layanan
        $groupedByAntrian = $ambilantrians->groupBy('antrian.nama_layanan')->map(function ($item) {
            return $item->count();
        });

        // Hitung total jumlah antrian
        $totalAntrian = $groupedByAntrian->sum();

        // Ubah jumlah layanan menjadi persentase
        $chartData = [
            'labels' => $groupedByAntrian->keys(),
            'data' => $groupedByAntrian->map(function ($count) use ($totalAntrian) {
                return round(($count / $totalAntrian) * 100, 2);
            })->values(),
        ];

        // Kembalikan view dengan data antrian dan chart
        return view('/index', [
            'chartData'     => $chartData,
            'start_date'    => $start_date,
            'end_date'      => $end_date,
        ]);
    }
}
