<?php

namespace App\Providers;

use App\Models\User;
use App\View\Components\Alerts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Notifications;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::component('alerts', Alerts::class);
        Blade::component('notification', Notifications::class);

        Gate::define('root', function(User $user) {
            $user->role === 1;
        });
    }
}