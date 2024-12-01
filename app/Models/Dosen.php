<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'dosen';

    // Tentukan primary key dan setel menjadi char
    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'char';  // Karena 'nidn' adalah char

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nidn',
        'name',
        'dob',
        'phone',
        'address',
        'prodi',
    ];

    // Relasi dengan tabel 'prodi' (belongsTo)
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'nama');
    }

    // Jika Anda memiliki relasi lain (misalnya untuk relasi dosen dengan matakuliah atau relasi lainnya), tambahkan di sini

    public function pengampu1()
    {
        return $this->hasMany(matakuliah::class);
    }

    public function pengampu2()
    {
        return $this->hasMany(matakuliah::class);
    }

    public function pengampu3()
    {
        return $this->hasMany(matakuliah::class);
    }
}