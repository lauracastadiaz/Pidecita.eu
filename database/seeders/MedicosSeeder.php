<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generar datos de prueba para los médicos
        Medico::create([
            'nombre' => 'Dr. Juan Pérez',
            'user_id' => 3,
            'email' => 'juanperez@example.com',
            'telefono' => '123456789',
            'nif' => '12345678A',
            'direccion' => 'Calle Principal 123',
        ]);
    }
}
