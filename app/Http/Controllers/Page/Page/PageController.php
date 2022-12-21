<?php

namespace App\Http\Controllers\Page\Page;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:halaman-list', ['only' => ['index']]);
    //     $this->middleware('permission:halaman-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:halaman-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:halaman-delete', ['only' => ['destroy']]);
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
        $page = Page::paginate(15);

        $data = [
            $title = "Halaman",
            $paths = [
                "Home",
                "Halaman",
                "Index"
            ]
        ];

        return view('pages.page.page-index', compact("menus", "pages", "categories", "page", "data"));
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
            $title = "Halaman",
            $paths = [
                "Home",
                "Halaman",
                "Add"
            ]
        ];

        return view('forms.page.add', compact("menus", "pages", "categories", "data"));
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
            'label' => 'required|max:255',
            'page_url' => 'required|max:255'
        ]);

        $input = $request->only("name", "label", "page_url");
        
        Page::create($input)->save();

        return redirect()->route('home.halaman');
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
        $page = Page::findOrFail($id);

        $data = [
            $title = "Halaman",
            $paths = [
                "Home",
                "Halaman",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.page.edit', compact("menus", "pages", "categories", "page", "data"));
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
            'label' => 'required|max:255',
            'page_url' => 'required|max:255'
        ]);

        $input = $request->only("name", "label", "page_url");

        Page::findOrFail($id)->update($input);
        
        return redirect()->route('home.halaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Page::findOrFail($id)->delete();

        return redirect()->route('home.halaman');
    }
}