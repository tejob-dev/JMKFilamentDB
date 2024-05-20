<?php

namespace Database\Seeders;

use App\Models\Accueilservice;
use Illuminate\Database\Seeder;

class AccueilserviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilservice::factory()
            ->count(5)
            ->create();
    }
}
