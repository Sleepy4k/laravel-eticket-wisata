<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'admin',
                'permission' => 'admin menu'
            ],
            [
                'name' => 'system',
                'permission' => 'system menu'
            ]
        ];

        foreach ($category as $data) {
            Category::create($data);
        }
    }
}
