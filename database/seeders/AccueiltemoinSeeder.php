<?php

namespace Database\Seeders;

use App\Models\Accueiltemoin;
use Illuminate\Database\Seeder;

class AccueiltemoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueiltemoin::factory()
            ->count(5)
            ->create();
    }
}
