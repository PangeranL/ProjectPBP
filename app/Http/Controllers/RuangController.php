<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Ruang;
use Illuminate\Http\Request;
use App\Models\ReqRuang;
use App\Models\prodi;
use App\Models\Kuota;

class RuangController extends Controller
{
    public function index()
    {
        // Get all ruang (rooms) data
        $ruangs = Ruang::all();
        // dd($ruangs);
        $prodis = Prodi::all();
        $kuotas = Kuota::all();
        $reqRuangs = ReqRuang::all();

        // Pass $ruangs to the view correctly
        return view('bagianAkademik.list_pengajuan_ruang_kuliah',compact('ruangs','prodis','kuotas','reqRuangs'));  // Ensure this view exists
    }

    public function store(Request $request)
    {
    // Assuming you select 'ruangKuliah' (name of the room) and kuota from the form
        $ruangs = ReqRuang::create([
            'nama' => $request->input('ruangKuliah'), // Assuming 'ruangKuliah' is the field selected
            'kuota' => $request->input('kuota'),
            'prodi' => $request->input('prodi'),
        ]);

        return redirect()->route('ruang.index'); 
    }   
}

