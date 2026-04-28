<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = User::where('roles', 'masyarakat')
            ->where('is_verification', false)
            ->orderBy('id', 'DESC')
            ->get();

        return view('dashboard.pendaftar.index', [
            'pendaftars'    => $pendaftars
        ]);
    }

    public function updateVerifikasi($id)
    {
        $pendaftar = User::find($id);
        $pendaftar->is_verification = true; // sesuaikan dengan field kamu
        $pendaftar->save();

        return redirect()->back()->with('success', 'Data berhasil diverifikasi');
    }
}
