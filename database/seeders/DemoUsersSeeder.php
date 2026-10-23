<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/** Usuarios demo, uno por rol (§2). Solo para desarrollo. */
class DemoUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['Administrador Main Industrial', 'admin@mainindustrial.test', 'administrador'],
            ['Capturista Demo', 'capturista@mainindustrial.test', 'capturista'],
            ['Vendedor Demo', 'vendedor@mainindustrial.test', 'vendedor'],
            ['Supervisor Demo', 'supervisor@mainindustrial.test', 'supervisor'],
        ];

        foreach ($users as [$name, $email, $role]) {
            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $name, 'password' => Hash::make('password'), 'active' => true],
            );
            $user->syncRoles([$role]);
        }
    }
}
