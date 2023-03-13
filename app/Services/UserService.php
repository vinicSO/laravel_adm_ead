<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use stdClass;

class UserService 
{

    private $repository;

    public function __construct ( UserRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function getAll ( $filter = '' ): array
    {
        $users = $this->repository->getAll($filter);

        $users = array_map( function ( $user )
        {
            $stdClass = new stdClass;

            foreach ( $user as $key => $value )
            {
                $stdClass->{ $key } = $value;
            }

            return $stdClass;
        }, $users);

        return $users;
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