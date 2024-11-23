<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class matakuliah extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'kodeMK';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'matakuliah';

    protected $fillable = [
        'kodeMK',
        'namaMK',
        'sks',
        'semester'
    ];

    public function Jadwal()
    {
        return $this->hasMany(jadwal::class);
    }
}