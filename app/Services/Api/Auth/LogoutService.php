<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use App\Http\Resources\Auth\LogoutResource;

class LogoutService extends ApiService
{
    /**
     * Invoke a new api server.
     * 
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function invoke()
    {
        $user = auth('sanctum')->user();
        $user->tokens()->delete();

        activity('auth')->withProperties($user)->log($user->username . ' berhasil logout');

        return $this->createResponse(trans('api.logout.success'), [
            'data' => new LogoutResource($user)
        ], 202);
    }
}