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
    ];

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