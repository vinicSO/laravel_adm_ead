<?php

namespace App\Repositories\Eloquent;

use App\Models\Course as Model;
use App\Repositories\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function getAll ( string | null $filter = '' ): array
    {
        $admins = $this->model
            ->where( function ($query) use ($filter) {
                if ( $filter )
                {
                    $query->where('email', $filter);
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $admins->toArray();
    }

    public function findById ( string $id ): object | null
    {
        return $this->model->find($id);
    }

    public function create ( array $data ): object
    {
        return $this->model->create($data);
    }

    public function update ( string $id, array $data ): object | null
    {
        $admin = $this->findById($id);
        
        if ( !$admin ) return null;

        $admin->update($data);

        return $admin;
    }

    public function delete ( string $id ): bool
    {
        $course = $this->findById($id);

        if ( !$course ) return null;

        return $course->delete();
    }

    
}