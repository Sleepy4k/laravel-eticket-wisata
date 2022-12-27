<?php

namespace App\Repositories\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepository;
use App\Contracts\Models\PackageInterface;

class PackageRepository extends EloquentRepository implements PackageInterface
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
    public function __construct(Package $model)
    {
        $this->model = $model;
    }
}