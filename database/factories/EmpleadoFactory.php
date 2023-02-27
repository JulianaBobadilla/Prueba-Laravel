<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //DEFINICION DE FACTORY DE EMPLEADO CON SUS RESPECTIVOS TIPOS DATOS
        return [
          'first_name' => fake()->name(),
          'last_name' => fake()->lastName(),
          'email' => fake()->unique()->safeEmail(),
          'phone' => str_replace('+', '', fake()->e164PhoneNumber()),
          'company_id' => fake()->randomElement(\App\Models\Empresa::pluck('id')->toArray()),
        ];
    }
}
