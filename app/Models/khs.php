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

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function jadwalKodeMK()
    {
        return $this->belongsTo(Jadwal::class, 'kodeMK', 'kodeMK');
    }

    public function jadwalNidn()
    {
        return $this->belongsTo(Jadwal::class, 'nidn', 'nidn');
    }

    public function jadwalRuang()
    {
        return $this->belongsTo(Jadwal::class, 'kelas', 'kelas');
    }
}