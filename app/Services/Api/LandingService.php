<?php

namespace App\Services\Api;

use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\LandingResource;

class LandingService extends ApiService
{
    /**
     * Get routes function.
     * 
     * @return array
     */
    public function getRoutes()
    {
        $routes = [];

        foreach (Route::getRoutes() as $route){
            if (strpos($route->uri, 'api') !== false){
                $routes[] = $route;
            }
        }

        return $routes;
    }

    /**
     * Invoke a new api server.
     * 
     * @return \Illuminate\Http\Response
     */
    public function invoke()
    {
        return $this->createResponse(trans('api.response.accepted'), [
            'data' => LandingResource::collection($this->getRoutes())
        ], 202);
    }
}