<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Antrian;
use App\Models\Layanan;
use App\Models\Ambilantrian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardAntrianMasukController extends Controller
{
    // Menampilkan Data Berdasarkan Slug yang dipilih admin dan diurutkan berdasarkan field created_at secara ascending dan data yang ditampilkan hanya 1 secara bergantuan
    public function index($slug)
    {
        $antrian = Antrian::where('slug', $slug)
            ->orderBy('created_at', 'asc')
            ->first();

        return view('dashboard.antrian-masuk.index', [
            'antrian' => $antrian
        ]);
    }

    // Untuk fungsi Ada antrian atau menghapus data pengambil antrian
    public function destroy($id)
    {
        $ambilantrian = Ambilantrian::findOrFail($id);
        Ambilantrian::destroy($ambilantrian->id);

        alert()->toast('Antrian Selanjutnya', 'success');
        return redirect()->back();
    }

    // Untuk fungsi Lewati yaitu mengedit/update field created_at menjadi wkatu saat ini dan otomatis diurutkan dari paling bawah
    public function skip($id)
    {
        $ambilantrian = Ambilantrian::findOrFail($id);
        $ambilantrian->update(['created_at' => now()]);

        alert()->toast('Antrian Dilewati', 'info');
        return redirect()->back();
    }
    
    // Untuk reset antrian masuk
    public function reset()
    {
        Ambilantrian::whereDate('tanggal', Carbon::now()->setTimezone('Asia/Jakarta'))->delete();
        
        Alert::success('Sukses', 'Berhasil Mereset Data Antrian Masuk');
        return redirect()->back();
    }
}
