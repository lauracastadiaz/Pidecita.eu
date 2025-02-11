<?php

//se utiliza para definir un generador de datos de prueba para el modelo User
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * Este método define el estado predeterminado del modelo. 
     * Utiliza el generador de datos 'Faker' para generar datos aleatorios como el nombre, 
     * el correo electrónico y la contraseña. 
     * El token de recordatorio también se genera aleatoriamente utilizando Str::random(10).
     * 
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /* 
        Este archivo es útil cuando estás utilizando el paquete laravel/framework 
        para crear modelos de datos de prueba durante el desarrollo de tu aplicación. 
        Ayuda a generar datos de prueba de manera fácil y rápida.
        
    */
}
