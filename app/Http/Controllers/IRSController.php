<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IRSController extends Controller
{
    public function index()
    {
        $semesters = [
            ['title' => 'Semester - 1 | Tahun Ajaran 2022/2023 Ganjil', 'sks' => 'SKS 24'],
            ['title' => 'Semester - 2 | Tahun Ajaran 2022/2023 Genap', 'sks' => 'SKS 24'],
            ['title' => 'Semester - 3 | Tahun Ajaran 2023/2024 Ganjil', 'sks' => 'SKS 24'],
            ['title' => 'Semester - 4 | Tahun Ajaran 2023/2024 Genap', 'sks' => 'SKS 24'],
            ['title' => 'Semester - 5 | Tahun Ajaran 2024/2025 Ganjil', 'sks' => 'SKS 24'],
        ];

        return view('mahasiswa.irs', compact('semesters'));
    }
}
