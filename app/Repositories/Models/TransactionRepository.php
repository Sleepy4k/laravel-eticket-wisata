<?php

namespace App\Repositories\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\TransactionInterface;

class TransactionRepository extends EloquentRepository implements TransactionInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Base respository constructor
     * 
     * @param  Model  $model
     */
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }
}