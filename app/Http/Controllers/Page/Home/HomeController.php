<?php

namespace App\Http\Controllers\Page\Home;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();

        $data = [
            $title = "Home",
            $paths = [
                "Home"
            ]
        ];

        return view('pages.home.home-index', compact("menus", "pages", "categories", "data"));   
    }
}