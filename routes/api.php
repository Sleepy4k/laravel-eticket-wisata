<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RefreshController;
use App\Http\Controllers\Api\Package\PackageController;
use App\Http\Controllers\Api\Transaction\TicketController;
use App\Http\Controllers\Api\Transaction\TransactionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',
    [LoginController::class, 'login']
)->name('api.login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.verify'], function() {
    Route::post('logout',
        [LogoutController::class, 'logout']
    )->name('api.logout');

    Route::post('refresh',
        [RefreshController::class, 'refresh']
    )->name('api.refresh');
});

Route::post('transaction',
    [TransactionController::class, 'store']
)->name('api.transaction.store');

Route::get('transaction',
    [TransactionController::class, 'index']
)->name('api.transaction.index');

Route::get('paket',
    [PackageController::class, 'index']
)->name('api.paket.index');

Route::get('user',
    [UserController::class, 'index']
)->name('api.user.index');

Route::get('ticket/{data}',
    [TicketController::class, 'index']
)->name('api.ticket.index');
