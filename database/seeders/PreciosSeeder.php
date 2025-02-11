<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Precio;

class PreciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Precio::create([
            'nombre' => 'Plan Básico',
            'precio_anterior' => 10.50,
            'precio_actual' => 5.50,
            'descripcion' => 'Descripción del Plan Básico',
            'descripcion_detallada' => 'Descripción detallada del Plan Básico',
            'icono' => 'bi-pentagon',
            'enlace' => '/register',
            'caracteristicas' => json_encode([
                [
                    'icono' => 'user',
                    'texto' => 'Single user'
                ],
                [
                    'icono' => 'help',
                    'texto' => 'Forum support'
                ],
                [
                    'icono' => 'clipboard',
                    'texto' => 'Access to library'
                ],
                [
                    'icono' => 'database',
                    'texto' => '1 GB disk space'
                ]
            ])
        ]);
        Precio::create([
            'nombre' => 'Plan Estándar',
            'precio_anterior' => 20.50,
            'precio_actual' => 9.50,
            'descripcion' => 'Descripción del Plan Estándar',
            'descripcion_detallada' => 'Descripción detallada del Plan Estándar',
            'icono' => 'bi-pentagon-half',
            'enlace' => '/register',
            'caracteristicas' => json_encode([
                [
                    'icono' => 'user',
                    'texto' => '2 user'
                ],
                [
                    'icono' => 'help',
                    'texto' => 'Forum support'
                ],
                [
                    'icono' => 'clipboard',
                    'texto' => 'Access to library'
                ],
                [
                    'icono' => 'database',
                    'texto' => '10 GB disk space'
                ]
            ])
        ]);
        Precio::create([
            'nombre' => 'Plan Premium',
            'precio_anterior' => 30.50,
            'precio_actual' => 19.50,
            'descripcion' => 'Descripción del Plan Premium',
            'descripcion_detallada' => 'Descripción detallada del Plan Premium',
            'icono' => 'bi-pentagon-fill',
            'enlace' => '/register',
            'caracteristicas' => json_encode([
                [
                    'icono' => 'user',
                    'texto' => 'Multiple users'
                ],
                [
                    'icono' => 'help',
                    'texto' => 'Forum support'
                ],
                [
                    'icono' => 'clipboard',
                    'texto' => 'Access to library'
                ],
                [
                    'icono' => 'database',
                    'texto' => '50 GB disk space'
                ]
            ])
        ]);

        

        
    }
}
