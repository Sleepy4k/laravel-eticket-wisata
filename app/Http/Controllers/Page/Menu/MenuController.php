<?php

namespace App\Http\Controllers\Page\Menu;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:menu-list', ['only' => ['index']]);
    //     $this->middleware('permission:menu-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:menu-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        $menu = Menu::paginate(15);
        $pages = Page::get();
        $categories = Category::get();
        
        $data = [
            $title = "Menu",
            $paths = [
                "Home",
                "Menu",
                "Index"
            ]
        ];

        return view('pages.menu.menu-index', compact("menus", "menu", "pages", "categories", "data"));
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
        $permissions = Permission::get();

        $data = [
            $title = "Menu",
            $paths = [
                "Home",
                "Menu",
                "Add"
            ]
        ];

        return view('forms.menu.add', compact("menus", "pages", "categories", "permissions", "data"));
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
            'icon' => 'required|max:255',
            'permission' => 'required',
            'category' => 'required',
            'page_id' => 'required'
        ]);

        $input = $request->only("name", "icon", "permission", "category", "page_id");
        
        Menu::create($input)->save();

        return redirect()->route('home.menu');
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
        $menu = Menu::findOrFail($id);
        $categories = Category::get();
        $permissions = Permission::get();

        $data = [
            $title = "Menu",
            $paths = [
                "Home",
                "Menu",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.menu.edit', compact("menus", "pages", "menu", "categories", "permissions", "data"));
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
            'icon' => 'required|max:255',
        ]);

        $input = $request->only("name", "icon", "permission", "category", "page_id");

        Menu::findOrFail($id)->update($input);
        
        return redirect()->route('home.menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Menu::findOrFail($id)->delete();

        return redirect()->route('home.menu');
    }
}