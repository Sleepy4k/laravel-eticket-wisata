<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LoginService;
use App\Http\Requests\Api\Auth\Login\StoreRequest;

class LoginController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Api\Auth\LoginService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreRequest $request, LoginService $service)
    {
        try {
            return $service->invoke($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
