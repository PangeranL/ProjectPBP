<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\irshasil;
use App\Models\irs;

class IRSController extends Controller
{
    public function index()
    {
        $irs = irshasil::where('status', 1)->get();

        return view('mahasiswa.lihatIRS', compact('irs'));
    }

    public function DetailIRS($nim, $smt){
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function($irs){
            return $irs->jadwal->matakuliah->sks;
        });
        return view('mahasiswa.DetailIRS', compact('isi', 'nim', 'smt', 'totalSKS'));
    }
}
