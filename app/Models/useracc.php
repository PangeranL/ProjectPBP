<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class useracc extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'useracc';

    protected $fillable = [
        'email',
        'password',
        'name',
        'dob',
        'phone',
        'address',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function Role()
    {
        return $this->belongsToMany(roles::class, 'userroles', 'email', 'role');
    }

    public function Mhs(){
        return $this->hasOne(mahasiswa::class);
    }

    public function PA(){
        return $this->hasOne(pembimbingAkademik::class);
    }

    public function Dekan(){
        return $this->hasOne(dekan::class);
    }

    public function Kaprodi(){
        return $this->hasOne(kaprodi::class);
    }

    public function BA(){
        return $this->hasOne(bagianAkademik::class);
    }
}