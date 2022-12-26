<?php

use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\Main;
use App\Http\Controllers\Api\Error;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LandingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
|
| You can list public API for any user in here. These routes are not guarded
| by any authentication system. In other words, any user can access it directly.
| Remember not to list anything of importance, use authenticat
e route instead.
*/

Route::get('/', LandingController::class)->name('landing.index');

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
    Route::post('login', Auth\LoginController::class)->name('login.store');
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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', Main\UserController::class)->name('user.index');
    Route::get('package', Main\PackageController::class)->name('package.index');
    Route::post('logout', Auth\LogoutController::class)->name('logout.store');
    Route::get('ticket/{id}', Main\TicketController::class)->name('ticket.show');

    Route::apiResource('transaction', Main\TransactionController::class, ['only' => ['index','store']]);
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

Route::any('{any}', Error\FallbackController::class)->where('any', '.*')->name('fallback');