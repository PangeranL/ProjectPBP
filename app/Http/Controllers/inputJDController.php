<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\matakuliah;
use \App\Models\jadwal;
use \App\Models\ruang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class inputJDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataKuliah = matakuliah::all();
        return view('kaprodi/tabeljadwal', compact('mataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal_kuliah = jadwal::all();
        $ruang = ruang::all();
        return view('kaprodi.susunjadwal', compact('jadwal_kuliah', 'ruang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'kodeMK' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'ruang' => 'required|string',
            'kuota' => 'required|integer',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
        ]);
    
        // Validasi 1: Cek apakah kodeMK sudah ada pada hari dan jam yang sama
        $isConflictMK = jadwal::where('kodeMK', $request->kodeMK)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('mulai', [$request->mulai, $request->selesai])
                      ->orWhereBetween('selesai', [$request->mulai, $request->selesai])
                      ->orWhere(function ($subQuery) use ($request) {
                          $subQuery->where('mulai', '<=', $request->mulai)
                                   ->where('selesai', '>=', $request->selesai);
                      });
            })
            ->exists();
    
        if ($isConflictMK) {
            return redirect()->back()->with('error', 'Kode MK sudah ada pada hari dan waktu tersebut!');
        }
    
        // Validasi 2: Cek apakah ruangan sudah digunakan pada hari dan jam yang sama
        $isConflictRuang = jadwal::where('ruang', $request->ruang)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {
                $query->whereBetween('mulai', [$request->mulai, $request->selesai])
                      ->orWhereBetween('selesai', [$request->mulai, $request->selesai])
                      ->orWhere(function ($subQuery) use ($request) {
                          $subQuery->where('mulai', '<=', $request->mulai)
                                   ->where('selesai', '>=', $request->selesai);
                      });
            })
            ->exists();
    
        if ($isConflictRuang) {
            error_log("konflik");
            return redirect()->back()->with('error', 'Ruangan sudah digunakan pada hari dan waktu tersebut!');
        }
    
        // Simpan jadwal kuliah
        $jadwal_kuliah = jadwal::create([
            'thnAjar' => 'Semester Ganjil 2025/2026', // Hardcoded tahun ajar
            'kodeMK' => $request->kodeMK,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'ruang' => $request->ruang,
            'kuota' => $request->kuota,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'status' => 'Pending', // Status default
        ]);
    
        // Redirect ke halaman sukses
        return redirect('kaprodi.tabelkelas');
    }
    
    /**
     * Filter jadwal berdasarkan kodeMK.
     */
    public function filterByKodeMK(Request $request)
    {
        // Validasi kodeMK yang diterima
        $request->validate([
            'kodeMK' => 'required|string',
        ]);

        // Ambil jadwal berdasarkan kodeMK
        $jadwal = jadwal::with('matakuliah') // Include relasi matakuliah
            ->where('kodeMK', $request->kodeMK)
            ->get();

        // Log hasil untuk debugging
        Log::info('Filter jadwal berdasarkan kodeMK:', ['kodeMK' => $request->kodeMK, 'jadwal' => $jadwal]);

        // Kirim data ke view atau sebagai JSON (jika digunakan untuk API)
        return view('kaprodi.tabelkelas', compact('jadwal'));
    }


    /**
     * Display the specified resour

     * Update the specified resource in storage.
     */
    public function deleteAndUpdateJadwal(Request $request, $id)
    {
    // Menghapus data terkait di tabel `khs`
    DB::table('khs')->where('kodeMK', function ($query) use ($id) {
        $query->select('kodeMK')
              ->from('irs')
              ->where('kodeMK', function ($subQuery) use ($id) {
                  $subQuery->select('kodeMK')
                           ->from('jadwal')
                           ->where('id', $id);
              });
    })->delete();

    // Menghapus data terkait di tabel `irs`
    DB::table('irs')->where('kodeMK', function ($query) use ($id) {
        $query->select('kodeMK')
              ->from('jadwal')
              ->where('id', $id);
    })->delete();

    // Menghapus data di tabel `jadwal`
    jadwal::find($id)->delete();

    // Redirect atau respon sukses
    return redirect()->back()->with('success', 'Jadwal berhasil dihapus!');
    }

    public function updateJadwal(Request $request)
    {
        // Validasi input
        $request->validate([
            'kodeMk' => 'required|string',
            'kelas' => 'required|string',
            'ruang' => 'required|string',
            'hari' => 'required|string',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
            'kuota' => 'required|integer',
        ]);
    
        // Perbarui data di tabel `jadwal`
        $updated = DB::table('jadwal')
            ->where('kodeMK', $request->input('kodeMk'))
            ->where('kelas', $request->input('kelas'))
            ->update([
                'ruang' => $request->input('ruang'),
                'hari' => $request->input('hari'),
                'mulai' => $request->input('mulai'),
                'selesai' => $request->input('selesai'),
                'kuota' => $request->input('kuota'),
            ]);
    
        // Cek apakah ada perubahan
        if ($updated) {
            return redirect()->back()->with('success', 'Jadwal berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Jadwal gagal diperbarui!');
        }
    }
}    