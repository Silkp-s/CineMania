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
        return $this->hasMany(Sala::Class,'sala_id','id');
    }
    
    public function cartelera(){
        return $this->belongsToMany(Cartelera::class,'cartelera_pelicula','cartelera_id','id');
    }

    public function reserva(){
        return $this->hasMany(Reservaciones::class);
    }
}
