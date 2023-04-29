<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use App\Models\Ambilantrian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Menampilkan Semua data antrian yang tersedia
    public function index(Antrian $antrian)
    {
        $kode = $antrian->kode;

        return view('antrian.index', [
            'antrianList'   => Antrian::all(),
            'antrian'       => $antrian,
            'kode'          => $kode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    //  Menampilkan view tambah antrian baru
    public function create(Antrian $antrian)
    {
        $kode = $antrian->kode;

        return view('antrian.create', [
            'antrian'   => $antrian,
            'kode'      => $kode
        ]); 
        
    }

    /**
     * Store a newly created resource in storage.
     */

    //  Proses Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'       => 'required',
            'nama_lengkap'  => 'required',
            'alamat'        => 'required',
            'nomorhp'       => 'required',
            'antrian_id'    => 'required',
        ]);
    
        $antrian        = Antrian::findOrFail($validated['antrian_id']);
        $service_code   = $antrian->kode;
    
        // ambil record terakhir dari tabel Ambilantrian berdasarkan tanggal dan kode
        $last_record = Ambilantrian::where('tanggal', $validated['tanggal'])
            ->where('kode', 'like', $service_code.'%')
            ->orderBy('created_at', 'desc')
            ->first();
    
        // jika record terakhir tidak ada, maka kode dimulai dari 001
        if (!$last_record) {
            $next_kode = '001';
        } else {
            // parsing kode terakhir menjadi integer
            $last_kode_int = intval(substr($last_record->kode, -3));
    
            // increment nilai integer dan padding kembali dengan 0
            $next_kode_int = str_pad(++$last_kode_int, 3, '0', STR_PAD_LEFT);
    
            $next_kode = $next_kode_int;
        }
        
        // validasi untuk memastikan tidak terjadi duplikasi pada kode antrian pada tanggal yang sama
        $kode_antrian = $service_code . '-' . $next_kode;
        $existing_record = Ambilantrian::where('kode', $kode_antrian)->where('tanggal', $validated['tanggal'])->first();
        if ($existing_record) {
            return redirect('/antrian')->with('error', 'Maaf,gagal mengambil antrian. Silahkan ambil di hari lain');
        }

        
        // Mengecek apakah jumlah antrian pada tabel ambilantrian
        $antrian_count = Ambilantrian::where('antrian_id', $validated['antrian_id'])
            ->where('tanggal', $validated['tanggal'])
            ->count();
    
        // Mengecek apakah jumlah antrian pada tabel antrian
        $batas_antrian = $antrian->batas_antrian;
    
        // Membandingkan data dari tabel ambilantrian(user) dengan tabel antrian(Admin) yang sudah ditentukan
        if($antrian_count >= $batas_antrian){
            return redirect('/antrian')->with('error', 'Maaf, Antrian Sudah Penuh Silahkan Coba Di Hari Lain');
        }
    
        // gabungkan kode dari tabel Antrian dan integer baru untuk kode_antrian pada tabel Ambilantrian
        $next_kode_padded = str_pad($next_kode, 3, '0', STR_PAD_LEFT); // tambahkan padding 0 pada kode
        $validated['kode'] = $service_code . '-' . $next_kode_padded;
    
        $validated['user_id'] = auth()->user()->id;
        $validated['tanggal'] = $validated['tanggal']; // tambahkan kolom tanggal
    
        Ambilantrian::create($validated);
        return redirect('/antrian')->with('success', 'Berhasil Mengambil Antrian');
    }
    
   

    /**
     * Display the specified resource.
     */

    //  Menampilkan Detail antrian yang diambil user user
     public function detail(Antrian $antrian)
     {
        return view('antrian.detail', [
            'antrian'       => $antrian,
            'detailAntrian' => Ambilantrian::where('user_id', auth()->user()->id)->get()
        ]);
     }

    public function show()
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ambilantrian $ambilantrian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Antrian $antrian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ambilAntrian = Ambilantrian::findOrFail($id);
        Ambilantrian::destroy($ambilAntrian->id);

        return redirect('/antrian/detail')->with('success', 'Berhasil Menghapus Antrian');
    }

    // Cetak kartu antrian
    public function cetakKodeAntrian(Ambilantrian $id)
    {
        $cetakKodeAntrian = Ambilantrian::find($id->id);
        $logoPath = storage_path('app/public/logo/logo.png');

        $logo = base64_encode(file_get_contents($logoPath));

        $pdf = PDF::loadView('antrian.kode-antrian', [
            'cetakKodeAntrian' => $cetakKodeAntrian,
            'logo'             => $logo
        ]);

        return $pdf->stream('kode-antrian.pdf');
    }
}
