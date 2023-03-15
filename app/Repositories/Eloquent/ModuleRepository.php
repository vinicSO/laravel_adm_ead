<?php

namespace App\Repositories\Eloquent;

use App\Models\Module as Model;
use App\Repositories\ModuleRepositoryInterface;

class ModuleRepository implements ModuleRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function getAllByCourseId ( string $courseId, string | null $filter = '' ): array
    {
        $modules = $this->model
            ->where( function ($query) use ($filter) {
                if ( $filter )
                {
                    $query->where('name', 'LIKE', "%{$filter}%");
                }
            })
            ->where('course_id', $courseId)
            ->get();

        return $modules->toArray();
    }

    public function findById ( string $id ): object | null
    {
        return $this->model->find($id);
    }

    public function createByCourse ( string $courseId, array $data ): object
    {
        $data['course_id'] = $courseId;
        
        return $this->model->create($data);
    }

    public function update ( string $id, array $data ): object | null
    {
        $module = $this->findById($id);
        
        if ( !$module ) return null;

        $module->update($data);

        return $module;
    }

    public function delete ( string $id ): bool
    {
        $module = $this->findById($id);

        if ( !$module ) return null;

        return $module->delete();
    }

    
}