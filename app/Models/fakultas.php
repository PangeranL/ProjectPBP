<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class fakultas extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'fakultas';

    protected $fillable = [
        'nama',
    ];

    public function prodi()
    {
        return $this->hasMany(prodi::class);
    }

    public function bAkdm(){
        return $this->hasMany(bagianAkademik::class);
    }
}