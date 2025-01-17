<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pakket;

class PakketSeeder extends Seeder
{
    public function run()
    {
        $pakketten = [
            ['naam' => 'Pakket Groot'],
            ['naam' => 'Pakket Klein'],
            ['naam' => 'Pakket Medium'],
        ];

        foreach ($pakketten as $pakket) {
            Pakket::create($pakket);
        }
    }
}
