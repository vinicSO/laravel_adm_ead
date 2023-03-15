<?php

namespace App\Services;

use App\Repositories\CourseRepositoryInterface;

class CourseService 
{

    private $repository;

    public function __construct ( CourseRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function getAll ( $filter = '' ): array
    {
        $courses = $this->repository->getAll($filter);

        return convertItemsOfArrayToObject($courses);
    }

    public function findById ( string $id ): object | null
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