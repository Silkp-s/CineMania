<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cine;
use Faker\Factory as Faker;

class CineSeeder extends Seeder
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
            cine::create([
                'ciudad' => $faker->city,               // ciduad aleatoria
                'pais' => $faker->country                   // pais aleatorio
            ]);
        }
    }
}
