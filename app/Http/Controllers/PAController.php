<?php

namespace App\Http\Controllers;

use App\Models\khs;
use App\Models\irs;
use App\Models\irshasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PAController extends Controller
{

    public function showUnverifiedIRS(){
    // Ambil data irshasil dengan status null
    $unverifiedIRS = irshasil::whereNull('status')->get();

    return view('pembimbingakademik.daftarIRS', compact('unverifiedIRS'));
    }

    public function isiIRS($nim, $smt){
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function($irs){
            return $irs->jadwal->matakuliah->sks;
        });
        return view('pembimbingakademik.verifIRS', compact('isi', 'nim', 'smt', 'totalSKS'));
    }

    public function IRSterverifikasi(Request $request){
        $validated = $request->validate([
            'nim' => 'required|string',
            'smt' => 'required|integer',
            'status' => 'required|in:1',
        ]);

        $irs = DB::table('irshasil')->where('nim', $validated['nim'])->where('smt', $validated['smt'])->first();
        if ($irs) {
            DB::beginTransaction();
            try {
                DB::table('irshasil')
                    ->where('nim', $validated['nim'])
                    ->where('smt', $validated['smt'])
                    ->update(['status' => $validated['status']]);

                DB::table('irs')
                    ->where('nim', $validated['nim'])
                    ->where('smt', $validated['smt'])
                    ->update(['status' => $validated['status']]);
    
                DB::commit();
                session()->forget('status');
                return redirect()->route('showVerif')
                                 ->with('success', 'IRS Berhasil Diverifikasi!');
            } catch (\Exception) {
                DB::rollBack();
                return redirect()->route('showVerif')
                                 ->with('error', 'Terjadi Kesalahan Saat Memperbarui Status!');
            }
        }
        return redirect()->route('showVerif')->with('error', 'IRS Tidak Ditemukan!');
    }

    public function KHS($nim, $smt) {
        $KHSbefore = khs::with('irs.jadwal.matakuliah')->where('smt', $smt)->get();
        $maxIPS = $KHSbefore->max('ips');
        $maxIPK = $KHSbefore->max('ipk');
        return view('pembimbingakademik.lihatKHS', compact('KHSbefore', 'nim', 'smt', 'maxIPS', 'maxIPK'));
    }
}