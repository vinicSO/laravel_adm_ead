<?php

namespace App\Repositories;

use App\Repositories\Contracts\PaginationInterface;

interface SupportRepositoryInterface
{
    
    public function getByStatus ( string $status = '', int $page ): PaginationInterface;
    public function findById ( string $id ): object | null;
    
}