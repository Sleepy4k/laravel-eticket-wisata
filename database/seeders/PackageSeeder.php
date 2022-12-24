<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Package::count() == 0) {
            $packages = Package::factory(10)->make();

            Package::insert($packages->toArray());
        }
    }
}
