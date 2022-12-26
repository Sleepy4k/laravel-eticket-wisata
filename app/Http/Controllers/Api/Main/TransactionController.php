<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\TransactionService;
use App\Http\Requests\Api\Main\Transaction\StoreRequest;

class TransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Api\Main\TransactionService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(TransactionService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\Main\Transaction\StoreRequest  $request
     * @param  \App\Services\Api\Main\TransactionService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TransactionService $service)
    {
        try {
            return $service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
