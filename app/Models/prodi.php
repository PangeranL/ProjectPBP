<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class prodi extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'prodi';

    protected $fillable = [
        'nama',
    ];

    public function ruangan(){
        return $this->hasMany(ruang::class);
    }

    public function Dosen(){
        return $this->hasMany(Dosen::class);
    }
}