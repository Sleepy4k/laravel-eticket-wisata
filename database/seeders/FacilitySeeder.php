<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Facility::count() == 0) {
            $facilities = Facility::factory(10)->make();

            Facility::insert($facilities->toArray());
        }
    }
}
