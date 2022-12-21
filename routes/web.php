<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\Home\HomeController;
use App\Http\Controllers\Page\Menu\MenuController;
use App\Http\Controllers\Page\Page\PageController;
use App\Http\Controllers\Page\Role\RoleController;
use App\Http\Controllers\Page\Tour\TourController;
use App\Http\Controllers\Page\Auth\LoginController;
use App\Http\Controllers\Page\Auth\LogoutController;
use App\Http\Controllers\Page\Tour\PackageController;
use App\Http\Controllers\Page\Tour\FacilityController;
use App\Http\Controllers\Page\Account\AccountController;
use App\Http\Controllers\Page\Profile\ProfileController;
use App\Http\Controllers\Page\Activity\ActivityController;
use App\Http\Controllers\Page\Category\CategoryController;
use App\Http\Controllers\Page\Dashboard\DashboardController;
use App\Http\Controllers\Page\Transaction\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['guest']], function(){
    Route::get('signin', 
        [LoginController::class, 'index']
    )->name('signin');

    Route::post('post-login', 
        [LoginController::class, 'login']
    )->name('signin.post');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 
        [HomeController::class, 'index']
    )->name('home');

    Route::get('signout', 
        [LogoutController::class, 'logout']
    )->name('signout');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'role_or_permission:loket|penjualan page']], function(){
    Route::get('penjualan/index', 
        [TransactionController::class, 'index']
    )->name('home.penjualan');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'role_or_permission:admin|dashboard page']], function(){
    Route::get('dashboard/index', 
        [DashboardController::class, 'index']
    )->name('home.dashboard');

    Route::get('wisata/index', 
        [TourController::class, 'index']
    )->name('home.wisata');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth', 'role_or_permission:superadmin|penjualan page']], function(){
    Route::get('menu/index', 
        [MenuController::class, 'index']
    )->name('home.menu');

    Route::get('halaman/index', 
        [PageController::class, 'index']
    )->name('home.halaman');

    Route::get('akun/index', 
        [AccountController::class, 'index']
    )->name('home.akun');

    Route::get('role/index', 
        [RoleController::class, 'index']
    )->name('home.role');

    Route::get('activity/index', 
        [ActivityController::class, 'index']
    )->name('home.activity');

    Route::get('category/index', 
        [CategoryController::class, 'index']
    )->name('home.category');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
    Route::get('profile', 
        [ProfileController::class, 'index']
    )->name('home.profile');

    Route::get('profile/edit/{data}', 
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::post('profile/update/{data}', 
        [ProfileController::class, 'update']
    )->name('profile.update');
});

Route::group(['prefix' => 'home/halaman', 'middleware' => ['auth', 'role_or_permission:superadmin|halaman page']], function(){
    Route::get('add', 
        [PageController::class, 'create']
    )->name('halaman.add');

    Route::get('edit/{data}', 
        [PageController::class, 'edit']
    )->name('halaman.edit');

    Route::post('update/{data}', 
        [PageController::class, 'update']
    )->name('halaman.update');
    
    Route::get('delete/{data}', 
        [PageController::class, 'destroy']
    )->name('halaman.delete');

    Route::post('store', 
        [PageController::class, 'store']
    )->name('halaman.store');
});

Route::group(['prefix' => 'home/menu', 'middleware' => ['auth', 'role_or_permission:superadmin|menu page']], function(){
    Route::get('add', 
        [MenuController::class, 'create']
    )->name('menu.add');

    Route::get('edit/{data}', 
        [MenuController::class, 'edit']
    )->name('menu.edit');

    Route::post('update/{data}', 
        [MenuController::class, 'update']
    )->name('menu.update');

    Route::get('delete/{data}', 
        [MenuController::class, 'destroy']
    )->name('menu.delete');

    Route::post('store', 
        [MenuController::class, 'store']
    )->name('menu.store');
});

Route::group(['prefix' => 'home/role', 'middleware' => ['auth', 'role_or_permission:superadmin|role page']], function(){
    Route::get('add', 
        [RoleController::class, 'create']
    )->name('role.add');

    Route::get('edit/{data}', 
        [RoleController::class, 'edit']
    )->name('role.edit');

    Route::post('update/{data}', 
        [RoleController::class, 'update']
    )->name('role.update');

    Route::get('delete/{data}', 
        [RoleController::class, 'destroy']
    )->name('role.delete');

    Route::post('store', 
        [RoleController::class, 'store']
    )->name('role.store');
});

Route::group(['prefix' => 'home/akun', 'middleware' => ['auth', 'role_or_permission:superadmin|akun page']], function(){
    Route::get('add', 
        [AccountController::class, 'create']
    )->name('akun.add');

    Route::get('edit/{data}', 
        [AccountController::class, 'edit']
    )->name('akun.edit');

    Route::post('update/{data}', 
        [AccountController::class, 'update']
    )->name('akun.update');

    Route::get('delete/{data}', 
        [AccountController::class, 'destroy']
    )->name('akun.delete');

    Route::post('store', 
        [AccountController::class, 'store']
    )->name('akun.store');
});

Route::group(['prefix' => 'home/wisata', 'middleware' => ['auth', 'role_or_permission:admin|wisata page']], function(){
    Route::get('add', 
        [TourController::class, 'create']
    )->name('wisata.add');

    Route::get('edit/{data}', 
        [TourController::class, 'edit']
    )->name('wisata.edit');

    Route::post('update/{data}', 
        [TourController::class, 'update']
    )->name('wisata.update');

    Route::get('delete/{data}', 
        [TourController::class, 'destroy']
    )->name('wisata.delete');

    Route::post('store', 
        [TourController::class, 'store']
    )->name('wisata.store');

    Route::get('detail/{data}', 
        [TourController::class, 'detail']
    )->name('wisata.detail');
});

Route::group(['prefix' => 'home/wisata/fasilitas', 'middleware' => ['auth', 'role_or_permission:admin|wisata page']], function(){
    Route::get('add/{data}', 
        [FacilityController::class, 'create']
    )->name('fasilitas.add');

    Route::get('edit/{data}', 
        [FacilityController::class, 'edit']
    )->name('fasilitas.edit');

    Route::post('update/{data}', 
        [FacilityController::class, 'update']
    )->name('fasilitas.update');

    Route::get('delete/{data}', 
        [FacilityController::class, 'destroy']
    )->name('fasilitas.delete');

    Route::post('store', 
        [FacilityController::class, 'store']
    )->name('fasilitas.store');
});

Route::group(['prefix' => 'home/wisata/paket', 'middleware' => ['auth', 'role_or_permission:admin|wisata page']], function(){
    Route::get('add/{data}', 
        [PackageController::class, 'create']
    )->name('paket.add');

    Route::get('edit/{data}', 
        [PackageController::class, 'edit']
    )->name('paket.edit');

    Route::post('update/{data}', 
        [PackageController::class, 'update']
    )->name('paket.update');

    Route::get('delete/{data}', 
        [PackageController::class, 'destroy']
    )->name('paket.delete');

    Route::post('store', 
        [PackageController::class, 'store']
    )->name('paket.store');
});

Route::group(['prefix' => 'home/penjualan', 'middleware' => ['auth', 'role_or_permission:admin|penjualan page']], function(){
    Route::get('add', 
        [TransactionController::class, 'create']
    )->name('penjualan.add');

    Route::get('edit/{data}', 
        [TransactionController::class, 'edit']
    )->name('penjualan.edit');

    Route::post('update/{data}', 
        [TransactionController::class, 'update']
    )->name('penjualan.update');

    Route::get('delete/{data}', 
        [TransactionController::class, 'destroy']
    )->name('penjualan.delete');

    Route::post('store', 
        [TransactionController::class, 'store']
    )->name('penjualan.store');
});

Route::group(['prefix' => 'home/category', 'middleware' => ['auth', 'role_or_permission:admin|category page']], function(){
    Route::get('add', 
        [CategoryController::class, 'create']
    )->name('category.add');

    Route::get('edit/{data}', 
        [CategoryController::class, 'edit']
    )->name('category.edit');

    Route::post('update/{data}', 
        [CategoryController::class, 'update']
    )->name('category.update');

    Route::get('delete/{data}', 
        [CategoryController::class, 'destroy']
    )->name('category.delete');

    Route::post('store', 
        [CategoryController::class, 'store']
    )->name('category.store');
});