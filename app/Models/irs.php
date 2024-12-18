<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class irs extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $primaryKey = 'id'; // Menggunakan kolom 'id' sebagai primary key
    public $incrementing = true;  // Aktifkan auto increment
    protected $keyType = 'int';   // Tipe data primary key adalah integer

    protected $fillable = [
        'nim',
        'kodeMK',
        'kelas',
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

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'kodeMK', 'kodeMK');
    }

    public function Ruang()
    {
        return $this->belongsTo(Jadwal::class, 'ruang', 'ruang');
    }
}