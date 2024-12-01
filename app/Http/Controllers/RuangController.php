<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use App\Models\ReqRuang;
use App\Models\Prodi;
use App\Models\Kuota;

class RuangController extends Controller
{
    public function index()
    {
        // Get all ruang (rooms) data
        $ruangs = Ruang::all();
        $prodis = Prodi::all();
        $kuotas = Kuota::all();
        $reqRuangs = ReqRuang::all();

        // Pass data to the view
        return view('bagianAkademik.list_pengajuan_ruang_kuliah', compact('ruangs', 'prodis', 'kuotas', 'reqRuangs'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'ruangKuliah' => 'required|string|max:255',
            'kuota' => 'required|integer',
            'prodi' => 'required|string|max:30',
        ]);

        ReqRuang::create([
            'nama' => $validated['ruangKuliah'],
            'kuota' => $validated['kuota'],
            'prodi' => $validated['prodi'],
            'status' => 'pending',  // Default status for a new request
        ]);

        // Redirect to the list of ruang (rooms)
        return redirect()->back();
    }
}
