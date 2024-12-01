<?php

namespace App\Observers;

use App\Models\Mahasiswa;

class MahasiswaObserver
{
    public function saving(Mahasiswa $mahasiswa)
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;
    
        $yearDifference = $currentYear - $mahasiswa->thnmasuk;
        $semester = $yearDifference * 2;
    
        if ($currentMonth > 6) {
            $semester += 1;
        }
    
        $mahasiswa->smt = $semester;
    }    
}
