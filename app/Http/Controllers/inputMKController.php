<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\matakuliah;
use App\Models\ruang;
use Illuminate\Validation;
use App\Http\Controllers\DB;


class inputMKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataKuliah = matakuliah::all();
        $dosens = Dosen::all();
        $jadwalMatkul;
        return view('kaprodi/tabelmatkul', compact('mataKuliah','dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliah = matakuliah::all();
        $dosens = Dosen::all();
        return view('kaprodi/susunmatkul', compact('mataKuliah','dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer|min:1',
            'namaMK' => 'required|string',
            'kodeMK' => 'required',
            'sks' => 'required|integer|min:1',
            'nidn_dosen1' => 'required',
            'nidn_dosen2' => 'nullable',
            'nidn_dosen3' => 'nullable',
        ],[
            'nidn_dosen2.different' => 'Dosen 2 tidak boleh sama dengan Dosen 1',
            'nidn_dosen3.different' => 'Dosen 3 tidak boleh sama dengan Dosen 1 dan Dosen 2',
        ]);

        $mata_kuliah = matakuliah::create([
            'semester' => $request -> semester,
            'namaMK' => $request -> namaMK,
            'kodeMK' => $request -> kodeMK,
            'sks' => $request -> sks,
            'nidn_dosen1' => $request -> nidn_dosen1,
            'nidn_dosen2' => $request -> nidn_dosen2,
            'nidn_dosen3' => $request -> nidn_dosen3,
        ]);

        return redirect('/kaprodi/inputMK');
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
