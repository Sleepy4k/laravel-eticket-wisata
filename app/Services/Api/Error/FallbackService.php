<?php

namespace App\Services\Api\Error;

use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Invoke a new api server.
     * 
     * @return \Illuminate\Http\Response
     */
    public function invoke()
    {
        return $this->createResponse(trans('api.fallback.error'), [
            'error' => trans('api.fallback.message')
        ], 404);
    }
}