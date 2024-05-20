<?php

namespace Database\Seeders;

use App\Models\Accueilabout;
use Illuminate\Database\Seeder;

class AccueilaboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilabout::factory()
            ->count(5)
            ->create();
    }
}
