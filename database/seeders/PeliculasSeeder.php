<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;
use Faker\Factory as Faker;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 
        // Generar 10 clientes aleatorios
        for ($i = 0; $i < 10; $i++) {
            Pelicula::create([
                'nombre' => $faker->name,               
                'pg' => $faker->numberBetween(7, 18),
                'nombre'=>$faker->sentence(),
                'idioma'=>$faker->languageCode()                   
            ]);
        }
    }
}
