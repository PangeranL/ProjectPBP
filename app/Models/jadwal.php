<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'kodeMK',
        'nidn',
        'ruang',
        'hari',
        'mulai',
        'selesai',
        'kelas',
        'thnAjar',
        'kuota',
        'status',  // Tambahkan status ke dalam fillable
    ];

    // Relasi dengan tabel matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class, 'kodeMK', 'kodeMK');
    }
    
    // Relasi dengan tabel dosen
    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'nidn', 'nidn');
    }

    // Relasi dengan tabel ruang
    public function ruang()
    {
        return $this->hasOne(ruang::class);
    }

    // Menentukan atribut status default jika tidak ada nilai yang diberikan
    protected $attributes = [
        'status' => 'Pending', // Nilai default untuk status
    ];
}
