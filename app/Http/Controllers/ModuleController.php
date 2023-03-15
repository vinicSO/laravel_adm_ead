<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModuleRepositoryInterface;

class ModuleController extends Controller
{

    protected $repository;
    
    public function __contruct ( ModuleRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }
}
