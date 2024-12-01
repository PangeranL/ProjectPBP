<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $fillable = [
        'nim',
        'kodeMK',
        'nidn',
        'kelas',
        'totalSKS',
        'ruang',
        'smt',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($irs) {
            if (!$irs->smt){
                $mahasiswa = Mahasiswa::where('nim', $irs->nim)->first();
                if ($mahasiswa) {
                    $irs->smt = $mahasiswa->smt; // Isi smt otomatis
                }
            }
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function KodeMK()
    {
        return $this->belongsTo(Jadwal::class, 'kodeMK', 'kodeMK');
    }

    public function Nidn()
    {
        return $this->belongsTo(Jadwal::class, 'nidn', 'nidn');
    }

    public function Ruang()
    {
        return $this->belongsTo(Jadwal::class, 'ruang', 'ruang');
    }
}