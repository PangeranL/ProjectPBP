<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HerregistrasiController extends Controller
{
    /**
     * Tampilkan halaman herregistrasi.
     */
    public function index()
    {
        $user = Auth::user();

        // Pastikan data user ada sebelum diakses
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        $status = $user->status; // Asumsi: Field 'status' ada pada model User
        return view('mahasiswa.herregistrasi', compact('status'));
    }

    /**
     * Set status menjadi Aktif.
     */
    public function setAktif(Request $request)
    {
        $user = Auth::useracc();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melakukan aksi ini.');
        }

        if ($user->status === 1) {
            return redirect()->route('herregistrasi.index')->with('info', 'Status Anda sudah Aktif.');
        }

        $user->status = 1; // 1 untuk status Aktif
        $user->save();

        return redirect()->route('herregistrasi.index')->with('success', 'Status Anda telah diubah menjadi Aktif.');
    }

    /**
     * Set status menjadi Cuti.
     */
    public function setCuti(Request $request)
    {
        $user = Auth::useracc();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melakukan aksi ini.');
        }

        if ($user->status === -1) {
            return redirect()->route('herregistrasi.index')->with('info', 'Status Anda sudah Cuti.');
        }

        $user->status = -1; // -1 untuk status Cuti
        $user->save();

        return redirect()->route('herregistrasi.index')->with('success', 'Status Anda telah diubah menjadi Cuti.');
    }

    /**
     * Batalkan status.
     */
    public function batalkanStatus(Request $request)
    {
        $user = Auth::useracc();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melakukan aksi ini.');
        }

        if ($user->status === 0) {
            return redirect()->route('herregistrasi.index')->with('info', 'Status Anda sudah default (belum dipilih).');
        }

        $user->status = 0; // 0 untuk status belum memilih
        $user->save();

        return redirect()->route('herregistrasi.index')->with('success', 'Status Anda telah dibatalkan.');
    }
}
