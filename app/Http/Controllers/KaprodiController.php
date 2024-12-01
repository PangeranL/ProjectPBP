<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\Controller;

class KaprodiController
{
    public function index(){
        return view('kaprodi/kaprodi');
    }

    public function tabelmatkul(){
        return view('kaprodi/tabelmatkul');
    }

    public function tabeljadwal(){
        return view('kaprodi/tabeljadwal');
    }

    public function susunjadwal(){
        return view('kaprodi/susunjadwal');
    }

    public function susunmatkul(){
        return view('kaprodi/susunmatkul');
    }
}


