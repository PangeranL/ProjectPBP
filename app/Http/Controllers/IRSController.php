<?php

namespace App\Http\Controllers;

use App\Models\irshasil;
use App\Models\irs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\KalenderAkademik;
use Carbon\Carbon;

class IRSController extends Controller
{
    public function index()
{
    $irs = irs::select('nim', 'smt', 'created_at')->groupBy('nim', 'smt', 'created_at')->get();

    $perubahanIRS = KalenderAkademik::where('nama_periode', 'Perubahan IRS')->first();
    $pembatalanIRS = KalenderAkademik::where('nama_periode', 'Pembatalan IRS')->first();

    $now = Carbon::now();
    $batasPerubahan = $perubahanIRS ? $now->between($perubahanIRS->tanggal_mulai, $perubahanIRS->tanggal_selesai) : false;
    $batasPembatalan = $pembatalanIRS ? $now->between($pembatalanIRS->tanggal_mulai, $pembatalanIRS->tanggal_selesai) : false;

    // Flash message jika batas perubahan IRS sudah tidak berlaku
    if (!$batasPerubahan) {
        session()->flash('errorPerubahan', 'Perubahan IRS sudah tidak diperbolehkan.');
    }

    // Flash message jika batas pembatalan IRS sudah tidak berlaku
    if (!$batasPembatalan) {
        session()->flash('errorPembatalan', 'Pembatalan IRS sudah tidak diperbolehkan.');
    }

    return view('mahasiswa.lihatIRS', compact('irs', 'batasPerubahan', 'batasPembatalan', 'perubahanIRS', 'pembatalanIRS'));
}

    

    public function DetailIRS($nim, $smt)
    {
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function ($irs) {
            return $irs->jadwal->matakuliah->sks;
        });
        return view('mahasiswa.DetailIRS', compact('isi', 'nim', 'smt', 'totalSKS'));
    }

    public function downloadIRS($nim, $smt)
    {
        $isi = irs::where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function ($irs) {
            return $irs->jadwal->matakuliah->sks;
        });

        $pdf = Pdf::loadView('mahasiswa.pdf', compact('isi', 'nim', 'smt', 'totalSKS'));
        return $pdf->download('IRS_' . $nim . '_Semester_' . $smt . '.pdf');
    }

    // Perubahan IRS (2 minggu)
    public function perubahanIRS(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|exists:irs,nim',
            'smt' => 'required|numeric',
        ]);
    
        $nim = $request->input('nim');
        $smt = $request->input('smt');
    
        // Ambil periode perubahan IRS dari tabel KalenderAkademik
        $periode = KalenderAkademik::where('nama_periode', 'Perubahan IRS')->first();
    
        if (!$periode) {
            return redirect()->back()->with('error', 'Periode perubahan IRS tidak ditemukan.');
        }
    
        // Cek apakah saat ini masih dalam periode perubahan IRS
        $now = Carbon::now();
        if ($now->between($periode->tanggal_mulai, $periode->tanggal_selesai)) {
            $irs = irs::where('nim', $nim)->where('smt', $smt)->first();
            if ($irs) {
                $irs->update(['status' => 2]); // Status 2: diubah
                return redirect()->back()->with('success', 'Perubahan IRS berhasil dilakukan.');
            }
            return redirect()->back()->with('error', 'IRS tidak ditemukan.');
        }
    
        return redirect()->back()->with('error', 'Perubahan IRS hanya dapat dilakukan pada periode yang telah ditentukan.');
    }
    
    

    // Pembatalan IRS (4 minggu)
    public function pembatalanIRS(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|exists:irs,nim',
            'smt' => 'required|numeric',
        ]);
    
        $nim = $request->input('nim');
        $smt = $request->input('smt');
    
        // Ambil periode pembatalan IRS dari tabel KalenderAkademik
        $periode = KalenderAkademik::where('nama_periode', 'Pembatalan IRS')->first();
    
        if (!$periode) {
            return redirect()->back()->with('error', 'Periode pembatalan IRS tidak ditemukan.');
        }
    
        // Cek apakah saat ini masih dalam periode pembatalan IRS
        $now = Carbon::now();
        if ($now->between($periode->tanggal_mulai, $periode->tanggal_selesai)) {
            $irs = irs::where('nim', $nim)->where('smt', $smt)->first();
            if ($irs) {
                $irs->update(['status' => 0]); // Status 0: dibatalkan
                return redirect()->back()->with('success', 'Pembatalan IRS berhasil dilakukan.');
            }
            return redirect()->back()->with('error', 'IRS tidak ditemukan.');
        }
    
        return redirect()->back()->with('error', 'Pembatalan IRS hanya dapat dilakukan pada periode yang telah ditentukan.');
    }
    

}
