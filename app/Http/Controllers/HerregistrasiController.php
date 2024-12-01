<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class HerregistrasiController extends Controller
{
    /**
     * Tampilkan halaman herregistrasi.
     */

     public function index(){
        $mahasiswa = Mahasiswa::all();
    // public function index()
    // {
    //     $user = Auth::user();

    //     // Pastikan data user ada sebelum diakses
    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
    //     }

    //     $status = $user->status; // Asumsi: Field 'status' ada pada model User
        return view('mahasiswa.herregistrasi', compact('mahasiswa'));
    }

 /**
     * Update status mahasiswa berdasarkan NIM.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim', // NIM harus ada di tabel mahasiswa
            'status' => 'required|in:aktif,cuti,tidak_aktif', // Validasi status
        ]);

        // Update status mahasiswa
        $updated = Mahasiswa::where('nim', $request->input('nim'))->update([
            'status' => $request->input('status'),
        ]);

        // Redirect dengan pesan
        return redirect()->back();
    }
}