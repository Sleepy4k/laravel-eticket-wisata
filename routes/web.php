<?php

use App\Http\Controllers\Web\Auth;
use App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Web\Audit;
use App\Http\Controllers\Web\System;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::get('/', fn() => view('welcome'))->name('landing.index');

/*
|--------------------------------------------------------------------------
| Unauthenticated Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are meant
| to be used for guests and are not guarded by any authentication system.
| Remember not to list anything of importance, use authenticate route instead.
*/

Route::middleware('guest')->group(function() {
    Route::resource('login', Auth\LoginController::class, ['only' => ['index', 'store']]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Route
|--------------------------------------------------------------------------
|
| In here you can list any route for authenticated user. These routes
| are meant to be used privately since the access is exclusive to authenticated
| user who had obtained their sanctum token from login API!
*/

Route::middleware('auth')->group(function() {
    Route::post('logout', Auth\LogoutController::class)->name('logout.store');

    // Dashboard Route
    Route::prefix('dashboard')->as('dashboard.')->group(function() {
        Route::get('/', Admin\DashboardController::class)->name('index');

        // Admin Route
        Route::prefix('admin')->as('admin.')->group(function() {
            Route::resources([
                'role' => Admin\RoleController::class,
                'permission' => Admin\PermissionController::class
            ]);
        });

        // System Route
        Route::prefix('system')->as('system.')->group(function() {
            Route::resource('application', System\ApplicationController::class, ['only' => ['index','create','store']]);
            Route::resources([
                'menu' => System\MenuController::class,
                'page' => System\PageController::class,
                'translate' => System\TranslateController::class
            ]);
        });

        // Audit Route
        Route::prefix('audit')->as('audit.')->group(function() {
            Route::resources([
                'auth' => Audit\AuthController::class,
                'model' => Audit\ModelController::class,
                'query' => Audit\QueryController::class,
                'system' => Audit\SystemController::class
            ], ['only' => ['index','show']]);
        });
    });
});

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
| 
| Please don't touch the code below unless you know what you're doing.
| Also keep in mind to put this code at the bottom of the route for any route
| listed below this code will not function or listed properly.
*/

Route::any('{any}', fn() => view('errors.404'))->where('any', '.*')->name('fallback');