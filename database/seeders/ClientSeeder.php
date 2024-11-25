<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
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
            Client::create([
                'nombre' => $faker->name,               // Nombre aleatorio
                'mail' => $faker->unique()->safeEmail,  // Email único
                'contraseña' => bcrypt('password123'),    // Contraseña encriptada
                'edad' => $faker->numberBetween(18, 70),  // Edad aleatoria entre 18 y 70
            ]);
        }
    }
}
