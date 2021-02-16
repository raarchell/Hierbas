<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelComment extends Model
{
    protected $fillable=[
        'id_artikel',
        'id_user',
        'comment',
    ];
    protected $table = 'artikelcomment';

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function artikel(){
        return $this->belongsTo(Artikel::class,'id_artikel','id');
    }
}
