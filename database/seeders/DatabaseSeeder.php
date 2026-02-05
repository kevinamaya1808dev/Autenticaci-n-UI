<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
    {
        // Creamos tu usuario administrador de una vez
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), 
        ]);
        
        // Opcional: Si en el futuro quieres 10 usuarios de prueba extra, 
        // solo tendrías que descomentar la línea de abajo:
        // User::factory(10)->create();
    }
}
