<?php

namespace Database\Seeders;

use App\Models\Accueilclient;
use Illuminate\Database\Seeder;

class AccueilclientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilclient::factory()
            ->count(5)
            ->create();
    }
}
