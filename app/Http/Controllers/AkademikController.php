<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // Model Mahasiswa

class AkademikController extends Controller
{
    public function updateStatus(Request $request)
    {
        // Ambil data mahasiswa yang sedang login (misalnya berdasarkan id user)
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->first();

        if ($mahasiswa) {
            // Logika untuk mengubah status akademik
            if ($mahasiswa->status_akademik == 'aktif') {
                $mahasiswa->status_akademik = 'cuti';
            } elseif ($mahasiswa->status_akademik == 'cuti') {
                $mahasiswa->status_akademik = 'tidak aktif';
            } else {
                $mahasiswa->status_akademik = 'aktif';
            }

            // Simpan perubahan
            $mahasiswa->save();

            // Redirect dengan pesan sukses
            return redirect()->route('dashboard')->with('status', 'Status akademik berhasil diperbarui!');
        }

        // Jika mahasiswa tidak ditemukan
        return redirect()->route('dashboard')->with('error', 'Data mahasiswa tidak ditemukan!');
    }
}
