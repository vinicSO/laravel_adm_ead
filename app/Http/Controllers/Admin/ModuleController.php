<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\{
    CourseRepositoryInterface,
    ModuleRepositoryInterface
};
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    protected $repository;
    protected $courseRepository;
    
    public function __construct ( ModuleRepositoryInterface $repository, CourseRepositoryInterface $courseRepository )
    {
        $this->repository = $repository;
        $this->courseRepository = $courseRepository;
    }

    public function index ( Request $request ) 
    {
        $courseId = $request->course_id;

        if ( !$course = $this->courseRepository->findById($courseId) ) return redirect()->back();

        $modules = convertItemsOfArrayToObject($this->repository->getAllByCourseId($courseId));

        return view('admin.courses.modules.index', compact('modules', 'course'));
    }
}
