<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accueilclientitem;

class AccueilclientitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilclientitem::factory()
            ->count(5)
            ->create();
    }
}
