<?php

namespace App\Repositories\Eloquent;

use App\Models\ReplySupport as Model;
use App\Repositories\ReplySupportRepositoryInterface;

class ReplySupportRepository implements ReplySupportRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function store ( array $data ): object
    {
        return $this->model->create($data);
    }
    
}