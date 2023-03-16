<?php

namespace App\Repositories\Eloquent;

use App\Models\Support as Model;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;

class SupportRepository implements SupportRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function getByStatus ( string $status = '', int $page ): PaginationInterface
    {
        $limit = 15;
        $skip = ($page -1) * $limit;
        $supports = $this->model
            ->where('status', $status)
            ->with(['user', 'lesson'])
            ->skip($skip)
            ->limit(15)
            ->paginate();
        
        return new PaginationPresenter($supports);
    }

    public function findById ( string $id ): object | null
    {
        return $this->model
            ->with(['user', 'replies.user', 'replies.admin', 'lesson'])
            ->find($id);
    }
    
}