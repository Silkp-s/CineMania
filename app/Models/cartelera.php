<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelicula;
use App\Models\Cine;

class Cartelera extends Model
{
    use HasFactory;

    protected $fillable = [
        'cine_id'
    ];


    public function cine(){
        return $this->belongsTo(Cine::class,'cine_id','id');
    }

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class,'cartelera_pelicula','cartelera_id','pelicula_id');
    }
}
