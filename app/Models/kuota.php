<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;

    // Specify the table
    protected $table = 'kuota';

    // Define the primary key (this is optional if the column name is 'id')
    protected $primaryKey = 'Kuota_kelas';

    // If the primary key is not auto-incrementing, you can add this line:
    public $incrementing = false;

    // Specify the fields that are mass-assignable
    protected $fillable = [
        'Kuota_kelas',
    ];
}
