<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable=[
        'nama',
        'foto',
    ];
    protected $table = 'kategori';

    public function resep(){
        return $this->hasMany(Resep::class,'id_kategori','id');
    }
}
