<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Traits\Responsible;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    use Responsible;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->response_error([
                    'message' => 'Token is Invalid',
                    'error' => 'Token is not registered in server'
                ], 401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->response_error([
                    'message' => 'Token is Expired',
                    'error' => 'This token has passed its expiration time'
                ], 401);
            }else{
                return $this->response_error([
                    'message' => 'Authorization Token not found',
                    'error' => 'Please double check it if you filled token'
                ], 401);
            }
        }

        return $next($request);
    }
}