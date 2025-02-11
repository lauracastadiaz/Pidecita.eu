<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * qué datos deseas insertar automáticamente en la base de datos al iniciar o restablecer tu aplicación. 
     * Estos datos pueden incluir registros de prueba, usuarios predeterminados, datos de configuración inicial o cualquier otro tipo 
     * de información que necesites para que tu aplicación funcione correctamente desde el principio.
     * 
     * @return void
     */
    public function run()
    {

        $this->call(PreciosSeeder::class);
        // \App\Models\User::factory(10)->create();
        //\App\Models\User::factory(10)->create();
                                    
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('holamundo1234')
        // ]);

    }
}
