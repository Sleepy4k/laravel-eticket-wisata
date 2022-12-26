<?php

namespace App\Http\Controllers\Api\Error;

use App\Http\Controllers\ApiController;
use App\Services\Api\Error\FallbackService;

class FallbackController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\Error\FallbackService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FallbackService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
