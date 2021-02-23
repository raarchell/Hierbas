<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

class Tanaman extends Model
{
        protected $fillable = [
                'nama',
                'isi',
                'foto',
                'link',
                'video'
        ];
        protected $table = 'tanaman';

        public function resep()
        {
                return $this->hasMany(Tanaman::class, 'id_tanaman', 'id');
        }
}
