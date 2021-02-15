<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepComment extends Model
{
    protected $fillable=[
        'id_resep',
        'id_user',
        'comment',
    ];
    protected $table = 'resepcomment';

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function resep(){
        return $this->belongsTo(Resep::class,'id_resep','id');
    }
}
