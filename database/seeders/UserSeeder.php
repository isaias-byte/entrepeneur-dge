<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rol_id' => 1,
            'name' => 'Isaías',
            'apellido_paterno' => 'Juárez',
            'apellido_materno' =>'Esparza',
            'email' => 'isaias.juarez6580@alumnos.udg.mx',
            'password' => bcrypt('Pocoloco'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 1,
            'name' => 'Sandra Margarita',
            'apellido_paterno' => 'Márquez',
            'apellido_materno' =>'Enriquez',
            'email' => 'sandra.marquez@redudg.udg.mx',
            'password' => bcrypt('Burbuja1'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 6,
            'name' => 'Test',
            'apellido_paterno' => 'Juarez',
            'apellido_materno' =>'Esparza',
            'email' => 'is.juareze@gmail.com',
            'password' => bcrypt('Pocoloco'),
        ]);

        // Profesores
        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Juan Antonio',
            'apellido_paterno' => 'Rodriguez',
            'apellido_materno' => 'Zambrano',
            'email' => 'juan.zambrano@gmail.com',
            'password' => bcrypt('Pocoloco'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Fernando',
            'apellido_paterno' => 'Arauz',
            'apellido_materno' => 'Gonzalez',
            'email' => 'fer@gmail.com',
            'password' => bcrypt('Pocoloco'),
        ]);

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'Aurora',
            'apellido_paterno' => 'Macías',
            'apellido_materno' => 'Pérez',
            'email' => 'aurora123@gmail.com',
            'password' => bcrypt('Pocoloco'),
        ]);

        User::factory(100)->create();

        DB::table('users')->insert([
            'rol_id' => 4,
            'name' => 'ProfesorTest',
            'apellido_paterno' => 'Macías',
            'apellido_materno' => 'Pérez',
            'email' => 'test@gmail.com',
            'password' => bcrypt('Pocoloco'),
        ]);
    }
}
