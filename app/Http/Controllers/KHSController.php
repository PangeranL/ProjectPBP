<?php

namespace App\Http\Controllers;

use App\Models\khs;

class KHSController extends Controller
{
    public function index()
    {
        $khs = khs::select('nim', 'smt')
            ->groupBy('nim', 'smt')
            ->get();
    
        return view('mahasiswa.lihatKHS', compact('khs'));
    }
    

    public function DetailKHS($nim, $smt) {
        $KHSbefore = khs::with('irs.jadwal.matakuliah')->where('smt', $smt)->get();
        $maxIPS = $KHSbefore->max('ips');
        $maxIPK = $KHSbefore->max('ipk');
        return view('mahasiswa.DetailKHS', compact('KHSbefore', 'nim', 'smt', 'maxIPS', 'maxIPK'));
    }
}