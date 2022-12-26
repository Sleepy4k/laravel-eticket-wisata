<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\PackageService;

class PackageController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\Main\PackageService  $service
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PackageService $service)
    {
        try {
            return $service->invoke();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
