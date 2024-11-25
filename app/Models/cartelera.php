<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartelera extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelicula_id',
        'cine_id'
    ];

    public function peliculas()
    {
        return $this->hasMany(peliculas::class, 'pelicula_id','id');
    }

    public function cine(){
        return $this->belongsTo(cine::class,'cine_id','id');
    }
}
