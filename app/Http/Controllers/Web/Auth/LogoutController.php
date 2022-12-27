<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\WebController;
use App\Services\Web\Auth\LogoutService;

class LogoutController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'main.dashboard.index';
        
        $this->middleware('auth');
    }

    /**
     * Invoke a new web server.
     *
     * @param  \App\Services\Web\Auth\LogoutService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LogoutService $service)
    {
        try {
            return $service->invoke() ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}