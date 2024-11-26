<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\Controller;

class KaprodiController
{
    public function index()
    {
        // Example data to pass to the view
        $user = [
            'name' => 'Dr. Bryan Sutedja, B.Sc., M.Cs.',
            'nip' => '198506012008072010',
            'email' => 'Bryansutedja@Lecturer.Dips.U.Ac.Id',
            'faculty' => 'Fakultas Sains Dan Matematika',
            'department' => 'Departemen Informatika'
        ];

        $schedule = [
            ['course' => 'STRUKTUR DATA', 'room' => 'A201', 'time' => '07.00 - 09.30'],
            ['course' => 'LOGIKA INFORMATIKA', 'room' => 'A202', 'time' => '09.40 - 10.20'],
            ['course' => 'LOGIKA INFORMATIKA', 'room' => 'A202', 'time' => '13.00 - 15.00'],
            ['course' => 'KEWIRAUSAHAAN', 'room' => 'E102', 'time' => '16.00 - 18.00']
        ];

        return view('kaprodi/kaprodi', compact('user', 'schedule'));
        // return view('Kaprodi/dashboardkaprodi');

    }
    public function susun()
    {
        return view('kaprodi/menyusun');
    }

    public function buat()
    {
        return view('kaprodi/buat');
    }
}
