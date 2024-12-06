<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $createPost = Permission::create(['name' => 'create post']);
        $editPost = Permission::create(['name' => 'edit post']);

        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        // Asignar permisos a los roles
        $admin->givePermissionTo($createPost);
        $admin->givePermissionTo($editPost);
        $user->givePermissionTo($createPost);

        // Asignar rol a un usuario
        $user = \App\Models\User::find(1);
        $user->assignRole('admin');
    }
}

