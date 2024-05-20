<?php

namespace Database\Seeders;

use App\Models\Lienfooter;
use Illuminate\Database\Seeder;

class LienfooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lienfooter::factory()
            ->count(5)
            ->create();
    }
}
