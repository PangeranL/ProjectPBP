<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class rewruang extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'nama';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'reqruang';

    protected $fillable = [
        'nama',
        'prodi',
        'status',
    ];
}