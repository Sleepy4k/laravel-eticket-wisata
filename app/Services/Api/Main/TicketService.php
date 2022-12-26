<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\TicketResource;

class TicketService extends ApiService
{
    /**
     * Invoke a new api server.
     * 
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function invoke($id)
    {
        $transaction = $this->transactionInterface->findByCustomId([['ticket_id', $id]], ['*'], ['package','user']);

        if (empty($transaction)) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => trans('api.response.no_data')
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => new TicketResource($transaction)
        ], 202);
    }
}