<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatIrsController extends Controller
{
    public function index()
    {
        return view('mahasiswa.buat_irs'); 
    }
}
