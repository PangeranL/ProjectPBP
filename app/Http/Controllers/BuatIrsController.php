<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\irs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuatIrsController extends Controller
{

    public function irsan($nim, $smt){
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function($irs){
            return $irs->jadwal->matakuliah->sks;
        });
        return view('mahasiswa.irsan', compact('isi', 'nim', 'smt', 'totalSKS'));
    }

    // Fungsi untuk menampilkan form pengisian IRS
    public function create($nim, $smt)
    {
        // Ambil semua jadwal dari tabel jadwal
        $jadwals = jadwal::with('matakuliah')->get();
        return view('mahasiswa.buat_irs', compact('jadwals', 'nim', 'smt'));
    }

    // Fungsi untuk menyimpan data IRS
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nim' => 'required',
            'smt' => 'required',
            'kodeMK' => 'required',
            'kelas' => 'required',
            'ruang' => 'required',
        ]);

        $exists = DB::table('irs')
            ->where('nim', $validated['nim'])
            ->where('smt', $validated['smt'])
            ->where('kodeMK', $validated['kodeMK'])
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah ada dalam IRS Anda.');
        }

        // Simpan data ke tabel IRS
        DB::table('irs')->insert([
            'nim' => $validated['nim'],
            'smt' => $validated['smt'],
            'kodeMK' => $validated['kodeMK'],
            'kelas' => $validated['kelas'],
            'ruang' => $validated['ruang'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $existingIrshasil = DB::table('irshasil')
        ->where('nim', $validated['nim'])
        ->where('smt', $validated['smt'])
        ->exists();

    // Jika belum ada, tambah 1 row ke tabel irshasil
    if (!$existingIrshasil) {
        DB::table('irshasil')->insert([
            'nim' => $validated['nim'],
            'smt' => $validated['smt'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

        return redirect()->route('irsan', ['nim' => $validated['nim'], 'smt' => $validated['smt']])
        ->with('success', 'IRS berhasil ditambahkan!');
    }

    public function edit($nim, $smt, $kodeMK)
    {
        // Ambil data IRS berdasarkan kombinasi nim, smt, dan kodeMK
        $irs = irs::with('jadwal.matakuliah')
            ->where('nim', $nim)
            ->where('smt', $smt)
            ->where('kodeMK', $kodeMK)
            ->firstOrFail(); // Pastikan data ditemukan atau gagal jika tidak ada
    
        // Ambil data jadwal untuk dropdown
        $jadwals = jadwal::with('matakuliah')
            ->get()
            ->groupBy('kodeMK');  // Mengelompokkan jadwal berdasarkan kodeMK
    
        return view('mahasiswa.editIRS', compact('irs', 'jadwals'));
    }

    public function update(Request $request, $nim, $smt, $kodeMK)
    {
        // Validasi input
        $validated = $request->validate([
            'kodeMK' => 'required',
            'kelas' => 'required',
            'ruang' => 'required',
        ]);
    
        // Temukan IRS berdasarkan nim, smt, dan kodeMK
        $irs = irs::where('nim', $nim)
            ->where('smt', $smt)
            ->where('kodeMK', $kodeMK)
            ->firstOrFail();
    
        // Update data IRS
        if ($irs) {
            DB::beginTransaction();
            DB::table('irs')->where('nim', $nim)
            ->where('smt', $smt)
            ->where('kodeMK', $kodeMK)
            ->update(['kodeMK' => $validated['kodeMK'],
            'kelas' => $validated['kelas'],
            'ruang' => $validated['ruang']
            ]);
        }
        DB::commit();
    
        return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
            ->with('success', 'IRS berhasil diperbarui!');
    }     
}