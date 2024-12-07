<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $primaryKey = 'nama'; 

    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamp = false;

    protected $table = 'ruang';

    protected $fillable = [
        'nama',      
    ];
}
