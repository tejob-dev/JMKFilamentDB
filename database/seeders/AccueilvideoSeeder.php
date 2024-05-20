<?php

namespace Database\Seeders;

use App\Models\Accueilvideo;
use Illuminate\Database\Seeder;

class AccueilvideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accueilvideo::factory()
            ->count(5)
            ->create();
    }
}
