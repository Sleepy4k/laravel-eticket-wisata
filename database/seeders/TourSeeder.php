<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Tour::count() == 0) {
            $tours = Tour::factory(10)->make();

            Tour::insert($tours->toArray());
        }
    }
}
