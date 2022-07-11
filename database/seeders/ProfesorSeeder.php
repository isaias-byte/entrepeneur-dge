<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesors')->insert([
            'user_id' => 4,
            
            'nombre' => 'Juan Antonio',
            'apellido_paterno' => 'Rodriguez',
            'apellido_materno' => 'Zambrano',
            'fecha_nacimiento' => '25/11/2001',
            'sexo' => 'Masculino',
            'codigo' => '123456789',
        ]);

        // DB::table('profesors')->insert([
        //     'user_id' => 5,
        //     'nombre' => 'Fernando',
        //     'apellido_paterno' => 'Arauz',
        //     'apellido_materno' => 'Gonzalez',
        //     'fecha_nacimiento' => '25/11/2001',
        //     'sexo' => 'Masculino',
        //     'codigo' => '123456789',
        // ]);

        DB::table('profesors')->insert([
            'user_id' => 6,
            
            'nombre' => 'Aurora',
            'apellido_paterno' => 'Macías',
            'apellido_materno' => 'Pérez',
            'fecha_nacimiento' => '25/11/2001',
            'sexo' => 'Masculino',
            'codigo' => '123456789',
        ]);
    }
}
