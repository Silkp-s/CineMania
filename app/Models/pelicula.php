<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $fillable=[
        'sala_id',     
        'idioma',
        'pg',
        'nombre',

    ];
    public function salas(){
        return $this->hasMany(sala::Class,'sala_id','id');
    }
    
    public function cartelera(){
        return $this->belongsTo(cartelera::class,'cartelera_id','id');
    }
}
