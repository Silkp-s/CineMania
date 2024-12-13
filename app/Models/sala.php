<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    
    protected $fillable = ['cine_id','nsalas','capacidad'];

    function estar()
{
    return $this->belongsToMany(client::class,'estars','sala_id','cliente_id');
    return $this->belongsTo(pelicula::class,'peliculas_id','id');
}
}

