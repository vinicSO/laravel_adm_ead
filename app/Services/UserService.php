<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService 
{

    private $repository;

    public function __construct ( UserRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function getAll ( $filter = '' ): array
    {
        return $this->repository->getAll($filter);
    }

    public function findById ( $id ): object | null
    {
        return $this->repository->findById($id);
    }

    public function create ( $data ): object
    {
        return $this->repository->create($data);
    }

    public function update ( $id, $data ): object | null
    {
        return $this->repository->update($id, $data);
    }

    public function delete ( $id ): bool
    {
        return $this->repository->delete($id);
    }
}