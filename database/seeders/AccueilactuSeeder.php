<?php

namespace Database\Seeders;

use App\Models\Accueilactu;
use Illuminate\Database\Seeder;

class AccueilactuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilactu::factory()
            ->count(5)
            ->create();
    }
}
