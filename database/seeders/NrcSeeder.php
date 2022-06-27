<?php

namespace Database\Seeders;

use App\Models\Nrc;
use Illuminate\Database\Seeder;

class NrcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nrc::factory(5)->create();
    }
}
