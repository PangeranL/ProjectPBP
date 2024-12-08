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
            'thnAjar' => 'required|string',
            'kodeMK' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'ruang' => 'required|string',
            'kuota' => 'required|integer',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
        ]);

        // Cek apakah jadwal dengan kodeMK dan kelas yang sama sudah ada
        $existingJadwal = jadwal::where('kodeMK', $request->kodeMK)
            ->where('kelas', $request->kelas)
            ->first();

        if ($existingJadwal) {
            return response()->json(['message' => 'Jadwal dengan kode MK dan kelas ini sudah ada!'], 400);
        }

        // Ambil data mata kuliah berdasarkan kodeMK
        $mataKuliah = matakuliah::where('kodeMK', $request->kodeMK)->first();

        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata kuliah tidak ditemukan!'], 404);
        }

        // Simpan jadwal kuliah dengan status default 'Pending'
        $jadwal_kuliah = jadwal::create([
            'thnAjar' => $request->thnAjar,
            'kodeMK' => $request->kodeMK,
            'nidn' => $mataKuliah->nidn_dosen1, 
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'ruang' => $request->ruang,
            'kuota' => $request->kuota,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'status' => 'Pending', 
        ]);
        // Redirect atau kirimkan respon sukses
        return redirect()->back();
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

        // Jika data tidak ditemukan, kirim respon kosong
        if ($jadwal->isEmpty()) {
            return response()->json(['message' => 'Tidak ada jadwal dengan kodeMK ini.'], 404);
        }

        // Kirim data ke view atau sebagai JSON (jika digunakan untuk API)
        return view('kaprodi.tabelkelas', compact('jadwal'));
    }

    /**
     * Update status jadwal kuliah.
     */
    // public function updateStatus(Request $request, $id)
    // {
    //     // Validasi data yang diterima
    //     $request->validate([
    //         'status' => 'required|in:Pending,Disetujui,Ditolak',
    //     ]);

    //     // Ambil data jadwal berdasarkan ID
    //     $jadwal = jadwal::find($id);

    //     if (!$jadwal) {
    //         return response()->json(['message' => 'Jadwal tidak ditemukan!'], 404);
    //     }

    //     // Update status jadwal
    //     $jadwal->status = $request->status;
    //     $jadwal->save();

    //     return redirect()->back();
    // }

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

    public function updateJadwal(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kodeMK' => 'required|exists:matakuliah,kodeMK',
            'kelas' => 'required|string',
            'ruang' => 'required|string',
            'hari' => 'required|string',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i',
            'kuota' => 'required|integer',
        ]);
    
        // Perbarui kodeMK di tabel `irs` jika diperlukan
        DB::table('irs')
            ->where('kodeMK', function ($query) use ($id) {
                $query->select('kodeMK')
                      ->from('jadwal')
                      ->where('id', $id);
            })
            ->update(['kodeMK' => $request->input('kodeMK')]);
    
        // Perbarui kodeMK di tabel `khs`
        DB::table('khs')
            ->where('kodeMK', function ($query) use ($id) {
                $query->select('kodeMK')
                      ->from('irs')
                      ->where('kodeMK', function ($subQuery) use ($id) {
                          $subQuery->select('kodeMK')
                                   ->from('jadwal')
                                   ->where('id', $id);
                      });
            })
            ->update(['kodeMK' => $request->input('kodeMK')]);
    
        // Perbarui data di tabel `jadwal`
        $updated = DB::table('jadwal')
            ->where('id', $id)
            ->update([
                'kodeMK' => $request->input('kodeMK'),
                'kelas' => $request->input('kelas'),
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

