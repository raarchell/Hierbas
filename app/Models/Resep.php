<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable=[
        'nama',
        'slug',
        'bahan',
        'cara',
        'foto',
    ];
    protected $table = 'resep';

    public function resep(){
        return $this->hasMany(Resep::class,'id_resep','id');
    }
}
