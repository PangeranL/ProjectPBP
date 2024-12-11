<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengajuan ruang
        $jadwals = Jadwal::all();
        return view('dekan.list_Pengajuan_jadwal', compact('jadwals'));
    }

    /**
     * Update the status of a jadwal request (approve or reject).
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        if ($request->has('status')) {
            // Menggunakan query builder untuk langsung memperbarui status
            Jadwal::where('id', $id)->update([
                'status' => $request->input('status'),
            ]);
        }

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back();
    }
}
