<?php

namespace App\Http\Controllers\Page\Category;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $category = Category::paginate(10);

        $data = [
            $title = "Categories",
            $paths = [
                "Home",
                "Categories",
                "Index"
            ]
        ];

        return view('pages.category.category-index', compact("menus", "pages", "categories", "category", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();

        $data = [
            $title = "Categories",
            $paths = [
                "Home",
                "Categories",
                "Add"
            ]
        ];

        return view('forms.category.add', compact("menus", "pages", "categories", "data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permission' => 'required|max:255',
        ]);

        $input = $request->only("name", "permission");

        Category::create($input)->save();

        return redirect()->route('home.category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $category = Category::findOrFail($id);

        $data = [
            $title = "Categories",
            $paths = [
                "Home",
                "Categories",
                "Edit"
            ],
            $uid = $id
        ];

        return view('forms.category.edit', compact("menus", "pages", "categories", "category", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permission' => 'required|max:255',
        ]);

        $input = $request->only("name", "permission");

        Category::findOrFail($id)->update($input);

        return redirect()->route('home.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('home.category');
    }
}
