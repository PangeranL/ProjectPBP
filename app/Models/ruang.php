<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ruang extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'ruang';

    protected $fillable = [
        'nama',
        'prodi',
        'fakultas',
        'kuota,',
    ];

    public function prodi(){
        return $this->belongsTo(prodi::class);
    }
}