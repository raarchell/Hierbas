<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $fillable = [
        'nama',
<<<<<<< HEAD
        'pengertian',
        'cara_menanam',
=======
        'isi',
>>>>>>> 7d210ac9a623afbc8254e4eb7345beda151025a0
        'foto',
        'link',
    ];
    protected $table = 'tanaman';
}
