<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irshasil extends Model
{
    use HasFactory;

    protected $table = 'irshasil';

    protected $fillable = [
        'nim',
        'smt',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($irshasil) {
            if (!$irshasil->smt){
                $mahasiswa = Mahasiswa::where('nim', $irshasil->nim)->first();
                if ($mahasiswa) {
                    $irshasil->smt = $mahasiswa->smt; // Isi smt otomatis
                }
            }
        });

        static::updated(function ($irshasil) {
            if ($irshasil->status) {
                IRS::where('nim', $irshasil->nim)
                    ->where('smt', $irshasil->smt)
                    ->update(['status' => $irshasil->status]);
            }
        });
    }
}