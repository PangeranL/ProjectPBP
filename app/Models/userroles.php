<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userroles extends Model
{
    use HasFactory;

    protected $table = 'userroles';

    protected $fillable = [
        'email',
        'role',
    ];
}