<?php

namespace Database\Seeders;

use App\Models\Typeformation;
use Illuminate\Database\Seeder;

class TypeformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Typeformation::factory()
            ->count(5)
            ->create();
    }
}
