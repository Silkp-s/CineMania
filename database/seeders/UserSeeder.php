<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear el rol 'admin' si no existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Crear el usuario administrador (usando un correo y una contraseña de ejemplo)
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'test@test.cl',
            'password' => bcrypt('123'),  // Cambia la contraseña según sea necesario
        ]);

        // Asignar el rol 'admin' al usuario creado
        $adminUser->assignRole($adminRole);

        $this->call(UserSeeder::class);

    }
}
