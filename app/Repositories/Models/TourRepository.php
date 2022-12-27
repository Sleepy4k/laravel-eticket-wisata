<?php

namespace App\Repositories\Models;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Models\TourInterface;
use App\Repositories\EloquentRepository;

class TourRepository extends EloquentRepository implements TourInterface
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
    public function __construct(Tour $model)
    {
        $this->model = $model;
    }
}