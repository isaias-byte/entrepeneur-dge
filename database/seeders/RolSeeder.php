<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rol' => 'Administrador', 
            // rol 1
        ]);

        DB::table('roles')->insert([
            'rol' => 'Donativo', 
            // rol 2
        ]);

        DB::table('roles')->insert([
            'rol' => 'Juez',
            // rol 3
        ]);

        DB::table('roles')->insert([
            'rol' => 'Docente',
            // rol 4
        ]);
        
        DB::table('roles')->insert([
            'rol' => 'Embajador',
            // rol 5
        ]);
        
        DB::table('roles')->insert([
            'rol' => 'Alumno',
            // rol 6
        ]);
    }
}
