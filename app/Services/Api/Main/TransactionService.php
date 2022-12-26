<?php

namespace App\Services\Api\Main;

use App\Services\ApiService;
use App\Http\Resources\Main\TransactionResource;

class TransactionService extends ApiService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transactionInterface->all(['*'], ['package','user']);

        if (count($transactions) > 0) {
            return $this->createResponse(trans('api.response.accepted'), [
                'data' => TransactionResource::collection($transactions)
            ], 202);
        }

        return $this->createResponse(trans('api.response.accepted'), [
            'data' => trans('api.response.no_data')
        ], 202);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        $date = now();

        $request['payment_date'] = $date->format('Y-m-d');
        $request['ticket_id'] = 'TICKET-'.$date->format('Ymd').'-'.$request['package_id'].'-'.$request['user_id'].'-'.$request['amount'];

        $this->transactionInterface->create($request);

        return $this->index();
    }
}