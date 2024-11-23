<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    protected $primaryKey = 'role';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['role'];

    public function users()
    {
        return $this->belongsToMany(useracc::class, 'userroles', 'role', 'email');
    }
}