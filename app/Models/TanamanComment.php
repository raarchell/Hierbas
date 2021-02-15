<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanamanComment extends Model
{
    protected $fillable=[
        'id_tanaman',
        'id_user',
        'comment',
    ];
    protected $table = 'tanamancomment';

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function tanaman(){
        return $this->belongsTo(Tanamamn::class,'id_tanaman','id');
    }
}
