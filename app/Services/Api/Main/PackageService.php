<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\PackageResource;

class PackageService extends ApiService
{
    /**
     * Invoke a new api server.
     * 
     * @return \Illuminate\Http\Response
     */
    public function invoke()
    {
        $packages = $this->packageInterface->all(['*'], ['tour']);

        if (count($packages) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => PackageResource::collection($packages)
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => trans('api.response.no_data')
        ], 202);
    }
}