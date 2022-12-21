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
        $menu = [
            [
                'name' => 'dashboard',
                'icon' => 'dashboard',
                'permission' => 'dashboard page',
                'category' => '1',
                'page_id' => '1'
            ],
            [
                'name' => 'penjualan',
                'icon' => 'table_view',
                'permission' => 'penjualan page',
                'category' => '1',
                'page_id' => '2'
            ],
            [
                'name' => 'wisata',
                'icon' => 'table_view',
                'permission' => 'wisata page',
                'category' => '1',
                'page_id' => '3'
            ],
            [
                'name' => 'menu',
                'icon' => 'table_view',
                'permission' => 'menu page',
                'category' => '2',
                'page_id' => '4'
            ],
            [
                'name' => 'halaman',
                'icon' => 'table_view',
                'permission' => 'halaman page',
                'category' => '2',
                'page_id' => '5'
            ],
            [
                'name' => 'akun',
                'icon' => 'table_view',
                'permission' => 'akun page',
                'category' => '2',
                'page_id' => '6'
            ],
            [
                'name' => 'role',
                'icon' => 'table_view',
                'permission' => 'role page',
                'category' => '2',
                'page_id' => '7'
            ],
            [
                'name' => 'category',
                'icon' => 'table_view',
                'permission' => 'audit page',
                'category' => '2',
                'page_id' => '8'
            ],
            [
                'name' => 'activity',
                'icon' => 'table_view',
                'permission' => 'audit page',
                'category' => '2',
                'page_id' => '9'
            ]
        ];

        foreach ($menu as $data) {
            Menu::insert($data);
        }
    }
}
