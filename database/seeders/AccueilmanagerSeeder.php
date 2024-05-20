<?php

namespace Database\Seeders;

use App\Models\Accueilmanager;
use Illuminate\Database\Seeder;

class AccueilmanagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilmanager::factory()
            ->count(5)
            ->create();
    }
}
