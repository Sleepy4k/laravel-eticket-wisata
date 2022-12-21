<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = [
            [
                'name' => 'dashboard',
                'label' => 'Dashboard',
                'page_url' => 'home.dashboard'
            ],
            [
                'name' => 'penjualan',
                'label' => 'Penjualan',
                'page_url' => 'home.penjualan'
            ],
            [
                'name' => 'wisata',
                'label' => 'Wisata',
                'page_url' => 'home.wisata'
            ],
            [
                'name' => 'menu',
                'label' => 'Menu',
                'page_url' => 'home.menu'
            ],
            [
                'name' => 'halaman',
                'label' => 'Halaman',
                'page_url' => 'home.halaman'
            ],
            [
                'name' => 'akun',
                'label' => 'Akun',
                'page_url' => 'home.akun'
            ],
            [
                'name' => 'role',
                'label' => 'Role',
                'page_url' => 'home.role'
            ],
            [
                'name' => 'category',
                'label' => 'Category',
                'page_url' => 'home.category'
            ],
            [
                'name' => 'activity',
                'label' => 'Audit Log',
                'page_url' => 'home.activity'
            ]
        ];

        foreach ($page as $data) {
            Page::create($data);
        }
    }
}
