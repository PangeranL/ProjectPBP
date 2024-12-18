<?php

namespace App\Http\Controllers;

use App\Models\irshasil;
use App\Models\irs;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function downloadIRS($nim, $smt)
    {
        $isi = Irs::where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function($irs){
            return $irs->jadwal->matakuliah->sks;
        });

        // Generate PDF view
        $pdf = Pdf::loadView('mahasiswa.DetailIRS', compact('isi', 'nim', 'smt', 'totalSKS'));

        // Return PDF download
        return $pdf->download('IRS_' . $nim . '_Semester_' . $smt . '.pdf');
    }
}
