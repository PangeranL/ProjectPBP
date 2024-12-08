<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'id'; // Menggunakan kolom 'id' sebagai primary key
    public $incrementing = true;  // Aktifkan auto increment
    protected $keyType = 'int';   // Tipe data primary key adalah integer
    
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
        'status',
    ];

    // Relasi dengan tabel matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kodeMK', 'kodeMK');
    }
    
    // Relasi dengan tabel dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    // Relasi dengan tabel ruang
    public function ruang()
    {
        return $this->hasOne(Ruang::class);
    }

    // Menentukan atribut status default jika tidak ada nilai yang diberikan
    protected $attributes = [
        'status' => 'Pending', // Nilai default untuk status
    ];
}
