<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol_id')->insert([
            ['id' => 1, 'name' => 'manager'],
            ['id' => 2, 'name' => 'medewerker'],
        ]);
    }
}
