<?php

namespace App\Http\Controllers\Page\Transaction;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Package;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Traits\Transactional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;

class TransactionController extends Controller
{
    use Transactional;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:penjualan-list', ['only' => ['index']]);
    //     $this->middleware('permission:penjualan-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:penjualan-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:penjualan-delete', ['only' => ['destroy']]);
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
        $currency = Currency::currency("IDR");
        $transactions = Transaction::latest()->paginate(15);

        $data = [
            $title = "Penjualan",
            $paths = [
                "Home",
                "Penjualan",
                "Index"
            ]
        ];

        return view('pages.transaction.transaction-index', compact("menus", "pages", "categories", "currency", "transactions", "data"));
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
        $packages = Package::get();
        $categories = Category::get();

        $data = [
            $title = "Penjualan",
            $paths = [
                "Home",
                "Penjualan",
                "Add"
            ]
        ];

        return view('forms.transaction.add', compact("menus", "pages", "packages", "categories", "data"));
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
            'time' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required|max:255',
            'price' => 'required|numeric',
            'package_id' => 'required'
        ]);

        $input = $request->only('tiket_number', 'time', 'amount', 'status', 'price', 'package_id', 'user_id');

        $input['tiket_number'] = $this->generate_number([
            'min' => 100000,
            'max' => 999999
        ]);

        $input['user_id'] = Auth::user()->id;

        Transaction::create($input)->save();

        return redirect()->route('home.penjualan');
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
        $transaction = Transaction::findOrFail($id);

        $data = [
            $title = "Penjualan",
            $paths = [
                "Home",
                "Penjualan",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.transaction.edit', compact("menus", "pages", "categories", "transaction", "data"));
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
            'time' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required|max:255',
            'price' => 'required|numeric',
            'package_id' => 'required'
        ]);

        $input = $request->only('tiket_number', 'time', 'amount', 'status', 'price', 'package_id', 'user_id');

        Transaction::findOrFail($id)->update($input);
        
        return redirect()->route('home.penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        return redirect()->route('home.penjualan');
    }
}
