<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cartelera;
use App\Models\Pelicula;
use App\Models\Cine;



class CarteleraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Obtener todos los cines disponibles
        $cines = Cine::all();
        $peliculas=Pelicula::all();

        // Crear 10 salas aleatorias
        for ($i = 0; $i < 10; $i++) {
            // Seleccionar un cine al azar
            $cine_id = $cines->random()->id;
        
           $cartelera = Cartelera::create([
                'cine_id' => $cine_id, // Relacionamos con un cine existente
            ]);
            $randomPeliculas = $peliculas->random(rand(2, 7));
            $cartelera->peliculas()->sync($randomPeliculas->pluck('id')->toArray());
        }
    }
}
