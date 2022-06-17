<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes')->insert([
            'user_id' => '3',
            'nombre' => 'Test',
            'apellido_paterno' => 'Juárez',
            'apellido_materno' => 'Esparza',
            'fecha_nacimiento' => '25/11/2001',
            'sexo' => 'Masculino',
            'codigo' => '123456789',
            'nrc' => '987654321',
        ]);

        Estudiante::factory(100)->create();

    }
}
