<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembimbingAkademik extends Model
{
    use HasFactory;

    protected $table = 'pembimbingakademik';

    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nidn',
        'email',
    ];

    public function pAkdm()
    {
        return $this->hasOne(useracc::class);
    }

    public function Mhs()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function Dosen()
    {
        return $this->hasOne(Dosen::class);
    }
}