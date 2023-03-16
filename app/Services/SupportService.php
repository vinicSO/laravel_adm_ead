<?php

namespace App\Services;

use App\Repositories\SupportRepositoryInterface;

class SupportService
{

    private $repository;

    public function __construct ( SupportRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function getAll ( string $status = 'P', int $page = 1)
    {
        return $this->repository->getByStatus($status, $page);
    }

    public function findById ( string $id )
    {
        return $this->repository->findById($id);
    }
}