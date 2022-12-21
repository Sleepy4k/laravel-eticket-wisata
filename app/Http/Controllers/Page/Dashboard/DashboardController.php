<?php

namespace App\Http\Controllers\Page\Dashboard;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $currency = Currency::currency("IDR");
        $transactions = Transaction::whereDate('created_at', Carbon::today())->latest()->get();

        for ($i = 1; $i < 12; $i++) {
            $chart_income   = collect(DB::SELECT("SELECT sum(price) AS harga from transactions where month(created_at)='$i'"))->first();
            $total_income[] = $chart_income->harga;

            $chart_transaction   = collect(DB::SELECT("SELECT count(id) AS ids from transactions where month(created_at)='$i'"))->first();
            $total_transaction[] = $chart_transaction->ids;

            $chart_ticket   = collect(DB::SELECT("SELECT sum(amount) AS total from transactions where month(created_at)='$i'"))->first();
            $total_ticket[] = $chart_ticket->total;
        }

        for ($i=0; $i < 30; $i++) { 
            $chart_transaction_ticket   = collect(DB::SELECT("SELECT sum(amount) AS penjualan from transactions where day(created_at)='$i'"))->first();
            $total_transaction_ticket[] = $chart_transaction_ticket->penjualan;
        }

        $data = [
            $title = "Dashboard",
            $paths = [
                "Home",
                "Dashboard",
                "Index"
            ]
        ];

        return view('pages.dashboard.dashboard-index', compact("users", "menus", "pages", "categories", "currency", "transactions", "chart_income", "total_income", "total_transaction", "total_ticket", "total_transaction_ticket", "data"));
    }
}