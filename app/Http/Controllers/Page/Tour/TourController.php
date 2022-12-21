<?php

namespace App\Http\Controllers\Page\Tour;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Tour;
use App\Models\Package;
use App\Models\Category;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:wisata-list', ['only' => ['index']]);
    //     $this->middleware('permission:wisata-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:wisata-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:wisata-delete', ['only' => ['destroy']]);
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
        $packages = Package::latest()->paginate(15);
        $tours = Tour::latest()->paginate(15);
        $facilities = Facility::latest()->paginate(15);

        $data = [
            $title = "Wisata",
            $paths = [
                "Home",
                "Wisata",
                "Index"
            ]
        ];

        return view('pages.tour.tour-index', compact("menus", "pages", "categories", "packages", "tours", "facilities", "data"));
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
            $title = "Wisata",
            $paths = [
                "Home",
                "Wisata",
                "Add"
            ]
        ];

        return view('forms.tour.add', compact("menus", "pages", "categories", "data"));
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
            'description' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'contact' => 'required|max:255',
            'responsible' => 'required|max:255',
            'user_id' => 'required|numeric|min:1',
            'alamat_prov' => 'required',
            'alamat_kab' => 'required',
            'alamat_kec' => 'required',
            'alamat_kel' => 'required',
            'alamat_jal' => 'required'
        ]);

        $input = $request->only("name", "description", "latitude", "longitude", "contact", "responsible", "user_id", "address");
        $input['address'] = $request->input("alamat_jal").", ".$request->input("alamat_kel").", ".$request->input("alamat_kec").", ".$request->input("alamat_kab").", ".$request->input("alamat_prov");

        Tour::create($input)->save();

        return redirect()->route('home.wisata');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $tour = Tour::findOrFail($id);

        $data = [
            $title = "Wisata",
            $paths = [
                "Home",
                "Wisata",
                $tour->name,
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.tour.edit', compact("menus", "pages", "categories", "tour", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
            'contact' => 'required|max:255',
            'responsible' => 'required|max:255',
            'user_id' => 'required|numeric|min:1',
            'address' => 'required',
        ]);

        $input = $request->only("name", "description", "latitude", "longitude", "contact", "responsible", "user_id", "address");

        Tour::findOrFail($id)->update($input);

        return redirect()->route('home.wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();

        return redirect()->route('home.wisata');
    }

    /**
     * Show detail spesific data.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $tour = Tour::findOrFail($id);
        $packages = Package::where('tour_id', $id)->get();
        $facilities = Facility::where('tour_id', $id)->get();

        $data = [
            $title = "Wisata",
            $paths = [
                "Home",
                "Wisata",
                $tour->name,
                "Index"
            ]
        ];

        return view('pages.tour.tour-sub-index', compact("menus", "pages", "categories", "tour", "packages", "facilities", "data"));
    }
}