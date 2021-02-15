<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
        protected $fillable = [
                'nama',
                'isi',
                'foto',
                'link',
        ];
        protected $table = 'tanaman';
}
