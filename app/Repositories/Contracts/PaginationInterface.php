<?php

namespace App\Repositories\Contracts;

interface PaginationInterface
{
    public function items (): array;
    public function total (): int;
    public function currentPage (): int;
    public function lastPage (): int;
    public function firstPage (): int;
}