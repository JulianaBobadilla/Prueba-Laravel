<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //CREACION DEL PRIMER USUARIO
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'password' => bcrypt('contraseña'),
            'email' => 'admin@admin.com'
        ]);

        //CREACION DE 10 EMPRESAS UTILIZANDO EL FACTORY DE EMPRESA
        \App\Models\Empresa::factory(10)->create();
        //CREACION DE 10 EMPLEADOS UTILIZANDO EL FACTORY DE EMPLEADO
        \App\Models\Empleado::factory(50)->create();
    }
}
