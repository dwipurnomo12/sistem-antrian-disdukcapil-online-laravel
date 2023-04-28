<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Ambilantrian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarAntrianController extends Controller
{
    public function index()
    {
        return view('/daftar-antrian/index', [
            'antrianList' => Antrian::all()
        ]);
    }

    public function show(Antrian $antrian)
    {
        return view('daftar-antrian.show', [
            'listPendaftar' => $antrian
        ]);
    }
}
