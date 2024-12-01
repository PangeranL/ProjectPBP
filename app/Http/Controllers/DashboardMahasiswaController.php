<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        // Ambil data mahasiswa berdasarkan nim yang sedang login
        $mahasiswa = Mahasiswa::all();

        // Pastikan ada data mahasiswa
        if (!$mahasiswa) {
            //return redirect()->route('login')->with('error', 'Data mahasiswa tidak ditemukan');
        }

        // Kirim data mahasiswa ke view
        return view('mahasiswa.mahasiswa', compact('mahasiswa'));
    }
}
