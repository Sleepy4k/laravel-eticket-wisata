<?php

namespace App\Repositories\Models;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\FacilityInterface;

class FacilityRepository extends EloquentRepository implements FacilityInterface
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
    public function __construct(Facility $model)
    {
        $this->model = $model;
    }
}