<?php

namespace App\Http\Controllers;

use App\Models\Ruang; // Import the Ruang model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BagianAkademikController extends Controller
{
    // Show the list of Ruang Kuliah (classrooms)
    public function showListRuangKuliah()
    {
        // Fetch all the rooms from the database
        $ruangs = DB :: table('ruang')-> get();

        
        // Pass the ruang data to the view
        return view('bagianAkademik.list_pengajuan_ruang_kuliah', compact('ruangs'));
    }

    // Handle the form submission from the modal
    public function submitRuangKuliah(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'ruangKuliah' => 'required|string|exists:ruang,nama', // Ensure the room exists in the database
            'kuota' => 'required|integer', // Ensure a valid quota is selected
        ]);

        // You can store or process the data here, e.g., creating a request entry in the database
        // Example: 
        // RequestRuang::create([
        //     'ruang_kuliah' => $validated['ruangKuliah'],
        //     'kuota' => $validated['kuota'],
        // ]);

        // Redirect back with a success message
        return redirect()->route('list.ruang.kuliah')->with('success', 'Ruang kuliah request submitted successfully!');
    }
}