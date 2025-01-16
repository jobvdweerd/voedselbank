<?php

namespace Database\Seeders;

use App\Models\Pakket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolSeeder::class);
        $this->call(PakketSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'testtest',
            'role_id' => 1,

        ]);
        User::factory()->create([
            'name' => 'medewerker',
            'email' => 'mede@example.com',
            'password' => 'testtest',
            'role_id' => 2,

        ]);
    }
}
