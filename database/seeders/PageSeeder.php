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
        if (Page::count() == 0) {
            $pages = config()->get('page.admin');

            $page = collect($pages)->map(function ($page) {
                return $page;
            });

            Page::insert($page->toArray());
        }
    }
}
