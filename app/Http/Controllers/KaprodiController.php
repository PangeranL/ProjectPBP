<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Matakuliah;

class KaprodiController extends Controller
{
    // Method untuk menampilkan halaman utama
    public function index(){
        return view('kaprodi/kaprodi');
    }

    // Method untuk menampilkan tabel matkul
    public function tabelmatkul(){
        return view('kaprodi/tabelmatkul');
    }    

    // Method untuk menyusun jadwal
    public function susunjadwal(){
        return view('kaprodi/susunjadwal');
    }

    // Method untuk menyusun mata kuliah
    public function susunmatkul(){
        return view('kaprodi/susunmatkul');
    }

    // Method untuk menampilkan tabel kelas
    public function tabelkelas()
    {
        // Ambil data jadwal beserta mata kuliah dari database
        $jadwal = Jadwal::with('matakuliah')->get();

        // Kirim data ke view
        return view('kaprodi.tabelkelas', compact('jadwal'));
    }

    // Method untuk menampilkan form edit jadwal
    public function editJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('kaprodi.editJadwal', compact('jadwal'));
    }

    public function updateJadwal(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kodeMK' => 'required|string|max:255',
            'thnAjar' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'kuota' => 'required|integer|min:1',
            'mulai' => 'required|date_format:H:i',
            'selesai' => 'required|date_format:H:i|after:mulai',
        ]);
    
        // Temukan jadwal berdasarkan ID
        $jadwal = Jadwal::findOrFail($id);
    
        // Update data jadwal dengan data yang diterima dari form
        $jadwal->kodeMK = $request->kodeMK;
        $jadwal->thnAjar = $request->thnAjar;
        $jadwal->kelas = $request->kelas;
        $jadwal->ruang = $request->ruang;
        $jadwal->hari = $request->hari;
        $jadwal->kuota = $request->kuota;
        $jadwal->mulai = $request->mulai;
        $jadwal->selesai = $request->selesai;
    
        // Simpan perubahan ke database
        $jadwal->save();
    
        // Redirect ke halaman tabel kelas setelah sukses, dengan pesan sukses
        return redirect()->route('kaprodi.tabelkelas')->with('success', 'Jadwal kuliah berhasil diupdate!');
    }
}
