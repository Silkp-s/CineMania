<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'pelicula_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class);
    }

    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }

}
