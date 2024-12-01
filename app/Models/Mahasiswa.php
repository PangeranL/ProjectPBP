<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nim',
        'nama',
        'dob',
        'phone',
        'address',
        'email',
        'nidnWaali',
        'thnmasuk',
        'smt',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(useracc::class);
    }

    public function PA(){
        return $this->hasOne(pembimbingAkademik::class);
    }
}