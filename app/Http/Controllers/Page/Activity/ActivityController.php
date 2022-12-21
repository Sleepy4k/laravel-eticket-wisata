<?php

namespace App\Http\Controllers\Page\Activity;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:activity-list', ['only' => ['index']]);
    // }

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
        $activities = Activity::latest()->paginate(15);

        $data = [
            $title = "Audit Log",
            $paths = [
                "Home",
                "Audit Log"
            ]
        ];

        return view('pages.activity.activity-index', compact("menus", "pages", "categories", "activities", "data"));
    }
}