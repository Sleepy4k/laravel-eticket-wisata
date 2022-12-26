<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\TicketService;

class TicketController extends ApiController
{
    /**
     * Invoke a new api server.
     *
     * @param  \App\Services\Api\Main\TicketService  $service
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TicketService $service, $id)
    {
        try {
            return $service->invoke($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
