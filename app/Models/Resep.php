<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable=[
        'nama',
        'id_kategori',
        'bahan',
        'cara',
        'foto',
    ];
    protected $table = 'resep';

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
    public function resep(){
        return $this->hasMany(Resep::class,'id_resep','id');
    }
}
