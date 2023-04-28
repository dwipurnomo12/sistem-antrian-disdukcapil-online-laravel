<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.layanan.index', [
            'layanans' => Layanan::all(),

        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required',
            'kode'         => 'required',
            'deskripsi'    => 'required'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Layanan::create($validated);

        Alert::success('Sukses', 'Berhasil Menambahkan Layanan baru');
        return redirect('/dashboard/layanan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        return view('dashboard.layanan.edit', [
            'layanan' => $layanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $rules = [
            'nama_layanan'  => 'required',
            'kode'          => 'required',
            'deskripsi'     => 'required'
        ];

        $validated = $request->validate($rules);

        $validated['user_id'] = auth()->user()->id;

        Layanan::where('id', $layanan->id)
            ->update($validated);
        
        Alert::success('Berhasil !', 'Berhasil Mengedit Layanan');
        return redirect('/dashboard/layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        Layanan::destroy($layanan->id);
        Alert::success('Berhasil', 'Berhasil Menghapus Layanan');
        return redirect('/dashboard/layanan');
    }
}
