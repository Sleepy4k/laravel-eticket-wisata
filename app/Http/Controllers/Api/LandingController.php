<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\LandingService;
use App\Http\Controllers\ApiController;

class LandingController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\LandingService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LandingService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
