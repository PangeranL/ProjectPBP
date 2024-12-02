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
        // Fetch the jadwal by its ID
        $jadwal = Jadwal::findOrFail($id);

        // Validate the incoming status
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,pending',
        ]);

        // Update the status
        $jadwal->status = $validated['status'];
        $jadwal->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
