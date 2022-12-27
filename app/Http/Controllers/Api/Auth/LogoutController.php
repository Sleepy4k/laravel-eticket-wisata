<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LogoutService;

class LogoutController extends ApiController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\Auth\LogoutService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LogoutService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
