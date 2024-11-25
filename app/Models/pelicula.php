<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    use HasFactory;
    protected $fillable=[
        'cine_id',
        'sala_id',
        'nsala',
        'capacidad',
        'cartelera_id'
    ];
    public function salas(){
        return $this->hasMany(sala::Class,'sala_id','id');
    }
    
    public function cartelera(){
        return $this->belongsTo(cartelera::class,'cartelera_id','id');
    }
}
