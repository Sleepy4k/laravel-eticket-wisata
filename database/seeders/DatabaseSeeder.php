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
        $this->call([
            ApplicationSeeder::class,
            LanguageSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            TourSeeder::class,
            FacilitySeeder::class,
            PackageSeeder::class
        ]);
    }
}
