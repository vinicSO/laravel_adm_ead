<?php

namespace App\Services;

use App\Repositories\Eloquet\UserRepositoryInterface;

class UserService 
{

    private $repository;

    public function __construct ( UserRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

}