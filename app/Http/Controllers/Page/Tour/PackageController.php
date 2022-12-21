<?php

namespace App\Http\Controllers\Page\Tour;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:wisata-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:wisata-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:wisata-delete', ['only' => ['destroy']]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();

        $data = [
            $title = "Paket",
            $paths = [
                "Home",
                "Wisata",
                "Pake",
                "Add"
            ],
            $uid = $id
        ];

        return view('forms.package.add', compact("menus", "pages", "categories", "data"));
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
            'price' => 'required|numeric|min:1',
            'description' => 'required|max:255',
            'tour_id' => 'required|numeric|min:1'
        ]);

        $input = $request->only("name", "price", "description", "tour_id");

        Package::create($input)->save();

        return redirect()->route('home.wisata');
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
        $paket = Package::findOrFail($id);

        $data = [
            $title = "Wisata",
            $paths = [
                "Home",
                "Wisata",
                "Paket",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.package.edit', compact("menus", "pages", "categories", "paket", "data"));
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
            'price' => 'required|numeric|min:1',
            'description' => 'required|max:255',
            'tour_id' => 'required|numeric|min:1'
        ]);

        $input = $request->only("name", "price", "description", "tour_id");

        Package::findOrFail($id)->update($input);

        return redirect()->route('home.wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::findOrFail($id)->delete();

        return redirect()->back();
    }
}
