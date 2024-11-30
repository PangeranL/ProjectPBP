<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqRuang extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'reqruang';

    // Tentukan primary key jika tidak mengikuti konvensi Laravel
    protected $primaryKey = 'nama';  // Nama kolom primary key yang digunakan

    // Tentukan jika primary key tidak auto-increment
    public $incrementing = false;

    // Tentukan tipe data primary key
    protected $keyType = 'string';  // Jika primary key adalah char atau string

    // Kolom yang dapat diisi mass-assignable
    protected $fillable = [
        'nama',      // Nama ruang kuliah
        'prodi',     // Program studi
        'kuota',     // Kuota ruang kuliah
        'status',    // Status ruang kuliah
    ];

    // Relasi dengan model Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'nama');  // Relasi ke tabel 'prodi'
    }

    // Relasi dengan model Ruang
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'nama', 'nama');  // Relasi ke tabel 'ruang'
    }
}