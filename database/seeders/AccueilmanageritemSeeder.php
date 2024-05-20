<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accueilmanageritem;

class AccueilmanageritemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilmanageritem::factory()
            ->count(5)
            ->create();
    }
}
