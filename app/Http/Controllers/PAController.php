<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\irs;
use App\Models\irshasil;
use App\Models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PAController extends Controller
{

    public function showUnverifiedIRS(){
    // Ambil data irshasil dengan status null
    $unverifiedIRS = irshasil::whereNull('status')->get();

    return view('pembimbingakademik.daftarIRS', compact('unverifiedIRS'));
    }

    public function isiIRS($nim, $smt){
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        return view('pembimbingakademik.verifIRS', compact('isi', 'nim', 'smt'));
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