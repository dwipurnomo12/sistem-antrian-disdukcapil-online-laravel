<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ambilantrian;

class DisplayPanggilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('display-panggilan.index',[
            'antrianList'   => Antrian::all(),
        ]);
    }

    public function getNomorAntrianDipanggil(Request $request)
    {
        $antrianId  = $request->input('antrian_id');
        $antrian    = Ambilantrian::where('antrian_id', $antrianId)
            ->orderBy('created_at', 'asc')
            ->first();
    
        return response()->json([
            'kode'      => $antrian->kode,
        ]);
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
