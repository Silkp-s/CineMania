<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'mail',
        'contraseña',
        'edad'
    ];

    function estar()
{
    return $this->belongsToMany(Client::class,'estars','cliente_id','sala_id');
}
}
