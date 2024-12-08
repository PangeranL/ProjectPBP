<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\Controller;
use App\Models\jadwal;
use App\Models\matakuliah;
class KaprodiController
{
    public function index(){
        return view('kaprodi/kaprodi');
    }

    public function tabelmatkul(){
        return view('kaprodi/tabelmatkul');
    }    

    public function susunjadwal(){
        return view('kaprodi/susunjadwal');
    }

    public function susunmatkul(){
        return view('kaprodi/susunmatkul');
    }

    public function tabelkelas()
    {
        // Ambil data jadwal dari database
        $jadwal = Jadwal::with('matakuliah')->get();

        // Kirim data ke view
        return view('kaprodi.tabelkelas', compact('jadwal'));
    }

}

