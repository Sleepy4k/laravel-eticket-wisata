<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class LogoutService extends WebService
{
    /**
     * Invoke a new web server.
     * 
     * @return void
     */
    public function invoke()
    {
        try {
            $user = auth()->user();
    
            activity('auth')->withProperties($user)->log($user->username.' berhasil logout');
    
            auth()->logout();
             
            $session = request()->session();
            $session->invalidate();
            $session->regenerateToken();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}