<?php
namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class KelolaRuangController extends Controller
{
    /**
     * Menampilkan daftar ruang.
     *
     * @return \Illuminate\View\View
     */
    public function getRuang()
    {
        // Mengambil semua data ruang
        $ruangs = Ruang::all();
        // Mengirimkan data ruang ke view
        return view('bagianAkademik.kelola_ruang', compact('ruangs'));
    }

    /**
     * Menyimpan ruang baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    // Validasi input
    $validated = $request->validate([
        'namaRuang' => 'required|string|max:4',
    ]);

    // Cek apakah nama ruang sudah ada di database
    $ruangExist = Ruang::where('nama', $validated['namaRuang'])->exists();

    if ($ruangExist) {
        // Jika sudah ada, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Ruang dengan nama tersebut sudah ada.');
    }

    // Simpan ruang baru ke database
    Ruang::create([
        'nama' => $validated['namaRuang'],
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Ruang berhasil ditambahkan.');
    }

    /**    
     * Menghapus ruang berdasarkan nama.
     *
     * @param string $nama
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($nama)
    {
        // Mencari ruang berdasarkan nama
        $ruang = Ruang::where('nama', $nama)->firstOrFail();

        // Menghapus ruang dari database
        $ruang->delete();

        // Mengarahkan kembali ke halaman daftar ruang
        return redirect()->back();  // Mengarahkan kembali ke halaman daftar ruang
    }

    public function update(Request $request, $nama)
    {
        // Validasi input
        $validated = $request->validate([
            'namaRuang' => 'required|string|max:4',
        ]);
    
        // Cek apakah nama ruang yang baru sudah ada, kecuali jika itu adalah nama yang sedang diupdate
        $ruangExist = Ruang::where('nama', $validated['namaRuang'])
                          ->where('nama', '!=', $nama) // Pastikan itu bukan nama yang sedang diupdate
                          ->exists();
    
        if ($ruangExist) {
            // Jika sudah ada, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Ruang dengan nama tersebut sudah ada.');
        }
    
        // Mencari ruang berdasarkan nama
        $ruang = Ruang::where('nama', $nama)->firstOrFail();
    
        // Memperbarui data ruang
        $ruang->update([
            'nama' => $validated['namaRuang'],
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Ruang berhasil diperbarui.');
    }
}
