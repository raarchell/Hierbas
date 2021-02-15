<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'judul',
        'isi_artikel',
        'foto',
    ];
    protected $table = 'artikel';
    
    public function artikel(){
        return $this->hasMany(Artikel::class,'id_artikel','id');
    }
}
