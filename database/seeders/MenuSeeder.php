<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Menu::count() == 0) {
            $menus = Menu::factory(10)->make();

            Menu::insert($menus->toArray());
        }
    }
}
