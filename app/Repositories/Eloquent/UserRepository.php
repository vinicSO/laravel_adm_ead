<?php

namespace App\Repositories\Eloquet;

use App\Models\User as Model;

class UserRepository implements UserRepositoryInterface
{

    private $model;

    public function __construct ( Model $model )
    {
        $this->model = $model;
    }

    public function getAll ( string $filter = '' ): array
    {
        $users = $this->model
            ->where( function ($query) use ($filter) {
                if ( $filter )
                {
                    $query->where('email', $filter);
                    $query->orWhere('name', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $users->toArray();
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
        $user = $this->findById($id);
        
        if ( !$user ) return null;

        $user->update($data);

        return $user;
    }

    public function delete ( string $id ): bool
    {
        $user = $this->findById($id);

        if ( !$user ) return null;

        return $user->delete();
    }

    
}