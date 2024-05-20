<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accueilserviceitem;

class AccueilserviceitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilserviceitem::factory()
            ->count(5)
            ->create();
    }
}
