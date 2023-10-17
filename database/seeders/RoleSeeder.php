<?php
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear el rol "admin"
        $adminRole = Role::create(['name' => 'admin']);

        // Crear el rol "usuario"
        $userRole = Role::create(['name' => 'usuario']);

        // Asignar el rol "admin" al primer usuario registrado
        $adminUser = User::create([
            'name' => 'Nombre del Usuario',
            'email' => 'usuario@example.com',
            'password' => bcrypt('contraseña'),
        ]);
        $adminUser->roles()->attach($adminRole);
    }
}

