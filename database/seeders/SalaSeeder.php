<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sala;
use App\Models\Cine;
use App\Models\Pelicula;
use Faker\Factory as Faker;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $faker = Faker::create();

        // Obtener todos los cines disponibles
        $cines = Cine::all();
        $peliculas=Pelicula::all();

        // Crear 10 salas aleatorias
        for ($i = 0; $i < 10; $i++) {
            // Seleccionar un cine al azar
            $cine_id = $cines->random()->id;
            $peliculas_id=$peliculas->random()->id;
        

            Sala::create([
                'cine_id' => $cine_id, // Relacionamos con un cine existente
                'peliculas_id'=>$peliculas_id,
                'nsalas' => $faker->numberBetween(1, 10), // Número aleatorio de salas (entre 1 y 10)
                'capacidad' => $faker->numberBetween(50, 500) // Capacidad aleatoria entre 50 y 500
            ]);
        }
    }
}
