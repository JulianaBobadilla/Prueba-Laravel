<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //DEFINICION DE FACTORY DE EMPRESA CON SUS RESPECTIVOS TIPOS DATOS
        return [
          'name' => fake()->name(),
          'email' => fake()->unique()->safeEmail(),
          'website' => fake()->domainName()
        ];
    }
}
