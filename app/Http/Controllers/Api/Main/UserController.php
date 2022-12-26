<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\UserService;

class UserController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\Main\UserService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
