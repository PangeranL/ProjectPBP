<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kaprodi extends Model
{
    use HasFactory;

    protected $table = 'kaprodi';

    protected $primaryKey = 'nidn';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = [
        'nidn',
        'email',
    ];

    public function kaprodi()
    {
        return $this->hasOne(useracc::class);
    }

    public function Dosen()
    {
        return $this->hasOne(Dosen::class);
    }
}