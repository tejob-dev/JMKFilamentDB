<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AccueilaboutSeeder::class);
        $this->call(AccueilactuSeeder::class);
        $this->call(AccueilclientSeeder::class);
        $this->call(AccueilclientitemSeeder::class);
        $this->call(AccueilformationSeeder::class);
        $this->call(AccueilmanagerSeeder::class);
        $this->call(AccueilmanageritemSeeder::class);
        $this->call(AccueilserviceSeeder::class);
        $this->call(AccueilserviceitemSeeder::class);
        $this->call(AccueiltemoinSeeder::class);
        $this->call(AccueilvideoSeeder::class);
        $this->call(ActualiteSeeder::class);
        $this->call(EquipeSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(LienfooterSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(TypeformationSeeder::class);
        $this->call(UserSeeder::class);
    }
}
