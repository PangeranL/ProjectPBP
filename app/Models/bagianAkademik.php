<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagianAkademik extends Model
{
    use HasFactory;

    protected $table = 'bagianakademik';

    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nidn',
        'nama',
        'dob',
        'phone',
        'address',
        'email',
        'fakultas',
    ];

    public function bagianAkademik()
    {
        return $this->hasOne(useracc::class);
    }

    public function fakultas(){
        return $this->belongsTo(fakultas::class);
    }
}