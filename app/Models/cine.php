<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cine extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciudad',
        'pais'
    ];

    public function sala()
    {
        return $this->hasMany(salas::class,'salas_id','id');
    }

    public function Cine(){
        return $this->hasOne(cartelera::class,'cine_id','id');
    }
}
