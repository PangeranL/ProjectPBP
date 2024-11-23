<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nidn',
        'nama',
        'dob',
        'phone',
        'address',
        'prodi',
    ];

    public function Dekan()
    {
        return $this->hasOne(dekan::class);
    }

    public function PA(){
        return $this->hasOne(pembimbingAkademik::class);
    }

    public function Kaprodi(){
        return $this->hasOne(kaprodi::class);
    }

    public function prodi(){
        return $this->belongsTo(prodi::class);
    }
}