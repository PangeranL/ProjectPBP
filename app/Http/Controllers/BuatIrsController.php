<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use App\Models\irs;
use App\Models\irshasil;
use App\Models\matakuliah;
use App\Models\khs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuatIrsController extends Controller
{

    public function irsan($nim, $smt){
        $isi = irs::with('jadwal.matakuliah')->where('nim', $nim)->where('smt', $smt)->get();
        $totalSKS = $isi->sum(function($irs){
            return $irs->jadwal->matakuliah->sks;
        });
        $irsH = irshasil::where('nim', $nim)->where('smt', $smt)->first();
        if (is_null($irsH)) {
            $Status = 'Belum ada IRS yang dibuat.';
            $edit = true;
        } elseif ($irsH->status === null) {
            $Status = 'Menunggu';
            $edit = true;
        } else if ($irsH->status == 1) {
            $Status = 'Diterima';
            $edit = false;
        }
        return view('mahasiswa.irsan', compact('isi', 'nim', 'smt', 'totalSKS', 'Status', 'edit'));
    }
    public function create($nim, $smt)
    {
        $ips = KHS::where('nim', $nim)->where('smt', $smt-1)->first();

        if ($ips->ips < 2.00) {
            $maks = 18;
        }
        else if ($ips->ips >= 2.00 && $ips->ips < 2.50) {
            $maks = 20;
        }
        else if ($ips->ips >= 2.50 && $ips->ips < 3.00) {
            $maks = 22;
        }
        else {
            $maks = 24;
        }

        $jadwals = jadwal::with('matakuliah')->where('status', 'Disetujui')->get();
        $kuotaData = [];
        foreach ($jadwals as $jadwal) {
            $jumlahMahasiswa = IRS::where('kodeMK', $jadwal->kodeMK)
                        ->where('kelas', $jadwal->kelas)
                        ->where('smt', $smt)
                        ->count();

            $sisaKuota = $jadwal->kuota - $jumlahMahasiswa;
            $kuotaData[$jadwal->kodeMK][$jadwal->kelas] = $sisaKuota;
        };
        return view('mahasiswa.buat_irs', compact('jadwals', 'nim', 'smt', 'kuotaData', 'maks'));
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
        ]);

        $jadwal = jadwal::where('kodeMK', $validated['kodeMK'])
            ->where('kelas', $validated['kelas'])
            ->first();

        if (!$jadwal) {
            return redirect()->back()->with('error', 'Data jadwal tidak ditemukan.');
        }

        $exists = DB::table('irs')
            ->where('nim', $validated['nim'])
            ->where('smt', $validated['smt'])
            ->where('kodeMK', $validated['kodeMK'])
            ->exists();

        if ($exists) {
            return redirect()->route('irsan', ['nim' => $validated['nim'], 'smt' => $validated['smt']])->with('error', 'Mata kuliah ini sudah ada dalam IRS Anda atau sudah anda ambil di kelas lain!');
        }

        $smt = DB::table('mahasiswa')
        ->where('nim', $validated['nim'])
        ->first();

        $totalSKS = DB::table('irs')
        ->join('jadwal', 'irs.idJadwal', '=', 'jadwal.id')
        ->join('matakuliah', 'jadwal.kodeMK', '=', 'matakuliah.kodeMK')
        ->where('irs.nim', $validated['nim'])
        ->where('irs.smt', $smt->smt)
        ->sum('matakuliah.sks');

        // Dapatkan SKS mata kuliah yang akan ditambahkan
        $sksMataKuliah = DB::table('matakuliah')
            ->where('kodeMK', $validated['kodeMK'])
            ->first();

        // Validasi jika total SKS melebihi batas
        $ips = KHS::where('nim', $validated['nim'])->where('smt', $validated['smt'] - 1)->first();
        if ($ips->ips < 2.00) {
            $maks = 18;
        } else if ($ips->ips >= 2.00 && $ips->ips < 2.50) {
            $maks = 20;
        } else if ($ips->ips >= 2.50 && $ips->ips < 3.00) {
            $maks = 22;
        } else {
            $maks = 24;
        }

        if (($totalSKS + $sksMataKuliah->sks) > $maks) {
            return redirect()->route('irsan', ['nim' => $validated['nim'], 'smt' => $validated['smt']])
                ->with('error', 'Total SKS melebihi batas maksimum (' . $maks . ' SKS). Mata kuliah tidak dapat ditambahkan.');
        }

        $cekJadwal = DB::table('irs')
        ->join('jadwal', 'irs.kodeMK', '=', 'jadwal.kodeMK')
        ->where('irs.nim', $validated['nim'])
        ->where('irs.smt', $validated['smt'])
        ->where('jadwal.hari', $jadwal->hari)
        ->where('jadwal.mulai', $jadwal->mulai)
        ->where('jadwal.selesai', $jadwal->selesai)
        ->exists();

        if ($cekJadwal) {
            return redirect()->route('irsan', ['nim' => $validated['nim'], 'smt' => $validated['smt']])->with('error', 'Mata kuliah ini bentrok dengan yang sudah anda pilih!');
        }


        DB::table('irs')->insert([
            'nim' => $validated['nim'],
            'smt' => $smt->smt,
            'kodeMK' => $validated['kodeMK'],
            'kelas' => $validated['kelas'],
            'ruang' => $jadwal->ruang,
            'created_at' => now(),
            'updated_at' => now(),
            'idJadwal' => $jadwal->id,
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
        session(['status' => 'Menunggu']);
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
        $jadwals = jadwal::with('matakuliah')->get();
        foreach ($jadwals as $jadwal) {
            $jumlahMahasiswa = IRS::where('kodeMK', $jadwal->kodeMK)
                        ->where('kelas', $jadwal->kelas)
                        ->where('smt', $smt)
                        ->count();
            $sisaKuota = $jadwal->kuota - $jumlahMahasiswa;
            $kuotaData[$jadwal->kodeMK][$jadwal->kelas] = $sisaKuota;
        };
    
        return view('mahasiswa.editIRS', compact('irs', 'jadwals', 'kuotaData'));
    }

    public function update(Request $request, $nim, $smt, $kodeMK)
    {
        // Validasi input
        $validated = $request->validate([
            'kodeMK' => 'required',
            'kelas' => 'required',
        ]);

        $jadwals = jadwal::where('kodeMK', $validated['kodeMK'])
        ->where('kelas', $validated['kelas'])
        ->first();

        if (!$jadwals) {
            return redirect()->back()->with('error', 'Data jadwal tidak ditemukan.');
        }
    
        // Temukan IRS berdasarkan nim, smt, dan kodeMK
        $irs = irs::where('nim', $nim)
            ->where('smt', $smt)
            ->where('kodeMK', $kodeMK)
            ->firstOrFail();
    
        // Update data IRS
        if ($irs) {
            if ($kodeMK == $validated['kodeMK'] && $irs->kelas == $validated['kelas']){
                return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
                ->with('error', 'IRS sama seperti sebelum diedit!');
            }
            else {
                DB::beginTransaction();
                DB::table('irs')->where('nim', $nim)
                ->where('smt', $smt)
                ->where('kodeMK', $kodeMK)
                ->update(['kodeMK' => $validated['kodeMK'],
                'kelas' => $validated['kelas'],
                'ruang' => $jadwals->ruang,
                'idJadwal' => $jadwals->id,
                'status' => NULL,
                ]);
            }
        }
        DB::commit();
        return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
            ->with('success', 'IRS berhasil diperbarui!');
    }

    public function destroy($nim, $smt, $kodeMK)
    {
        $irs = DB::table('irs')
            ->where('nim', $nim)
            ->where('smt', $smt)
            ->where('kodeMK', $kodeMK)
            ->exists();

        $irsH = DB::table('irshasil')
        ->where('nim', $nim)
        ->where('smt', $smt)
        ->first();
        
        if (!$irsH) {
        return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
            ->with('error', 'IRS tidak ditemukan.');
        }
        
        $existingKhs = DB::table('khs')
            ->where('nim', $nim)
            ->where('kodeMK', $kodeMK)
            ->where('smt', $smt)
            ->get();

        if (!$existingKhs->isEmpty()) {
            return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
            ->with('error', 'Terdapat KHS yang bersangkutan!');
        }

        if ($irs) {
            DB::table('irs')
                ->where('nim', $nim)
                ->where('smt', $smt)
                ->where('kodeMK', $kodeMK)
                ->delete();
        }
    
        // Hapus data di irshasil jika diperlukan
        if ($irsH) {
            DB::table('irshasil')
                ->where('nim', $nim)
                ->where('smt', $smt)
                ->delete();
        }

        return redirect()->route('irsan', ['nim' => $nim, 'smt' => $smt])
            ->with('success', 'IRS berhasil dihapus!');
    }
}