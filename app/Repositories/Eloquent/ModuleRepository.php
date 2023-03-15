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

    public function getAll ( string | null $filter = '' ): array
    {
        $modules = $this->model
            ->where( function ($query) use ($filter) {
                if ( $filter )
                {
                    $query->where('email', $filter);
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $modules->toArray();
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