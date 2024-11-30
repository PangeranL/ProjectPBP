<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReqRuang;

class UpdateStatusRuangController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengajuan ruang
        $reqRuangs = ReqRuang::all();
        return view('dekan.list_Pengajuan_ruang', compact('reqRuangs'));
    }

    /**
     * Update the status of a ruang request (approve or reject).
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
            ReqRuang::where('id', $id)->update([
                'status' => $request->input('status'),
            ]);
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}