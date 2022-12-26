<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\UserResource;

class UserService extends ApiService
{
    /**
     * Invoke a new api server.
     * 
     * @return \Illuminate\Http\Response
     */
    public function invoke()
    {
        $users = $this->userInterface->all();

        if (count($users) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => UserResource::collection($users)
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => trans('api.response.no_data')
        ], 202);
    }
}