<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khs extends Model
{
    use HasFactory;

    protected $table = 'khs';

    protected $fillable = [
        'nim',
        'kodeMK',
        'nilai',
        'ips',
        'ipk',
        'smt',
    ];

    protected static function booted()
    {
        static::creating(function ($khs) {
            if (!$khs->smt){
                $mahasiswa = Mahasiswa::where('nim', $khs->nim)->first();
                if ($mahasiswa) {
                    $khs->smt = $mahasiswa->smt; // Isi smt otomatis
                }
            }
        });
    }

    public function irs()
    {
        return $this->belongsTo(irs::class, ['kodeMK', 'smt'], ['kodeMK', 'smt']);
    }
}