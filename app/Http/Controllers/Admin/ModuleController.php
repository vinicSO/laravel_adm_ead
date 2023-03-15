<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ModuleRepositoryInterface;

class ModuleController extends Controller
{

    protected $repository;
    
    public function __construct ( ModuleRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function index ( Request $request ) 
    {
        $courseId = $request->course_id;

        dd($this->repository->getAllByCourseId($courseId));
    }
}
