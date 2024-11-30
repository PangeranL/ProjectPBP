<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $primaryKey = 'name'; 

    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'ruang';

    protected $fillable = [
        'nama',   
        'prodi',
        'kuota',
    ];

    // Define relationship with 'Prodi' model
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
