<?php

namespace App\Repositories\Eloquent;

use App\Models\Lesson as Model;
use App\Repositories\LessonRepositoryInterface;

class LessonRepository implements LessonRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function getAllByModuleId ( string $moduleId, string | null $filter = '' ): array
    {
        $lessons = $this->model
            ->where( function ($query) use ($filter) {
                if ( $filter )
                {
                    $query->where('name', 'LIKE', "%{$filter}%");
                }
            })
            ->where('module_id', $moduleId)
            ->with('module')
            ->get();

        return $lessons->toArray();
    }

    public function findById ( string $id ): object | null
    {
        return $this->model->find($id);
    }

    public function createByModule ( string $moduleId, array $data ): object
    {
        $data['module_id'] = $moduleId;
        
        return $this->model->create($data);
    }

    public function update ( string $id, array $data ): object | null
    {
        $lesson = $this->findById($id);
        
        if ( !$lesson ) return null;

        $lesson->update($data);

        return $lesson;
    }

    public function delete ( string $id ): bool
    {
        $lesson = $this->findById($id);

        if ( !$lesson ) return null;

        return $lesson->delete();
    }

    
}