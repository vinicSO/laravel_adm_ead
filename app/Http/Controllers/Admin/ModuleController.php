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

    public function create ( Request $request )
    {
        $courseId = $request->course_id;

        if ( !$course = $this->courseRepository->findById($courseId) ) return redirect()->back();

        return view('admin.courses.modules.create', compact('course'));
    }

    public function store ( Request $request )
    {
        $courseId = $request->course_id;

        if ( !$this->courseRepository->findById($courseId) ) return redirect()->back();

        $this->repository->createByCourse($courseId, $request->only('name'));

        return redirect()->route('modules.index', ['course_id' => $courseId]);

    }

    public function edit ( Request $request )
    {
        $courseId = $request->course_id;

        if ( !$course = $this->courseRepository->findById($courseId) ) return redirect()->back();

        $moduleId = $request->module;

        if ( !$module = $this->repository->findById($moduleId) ) return redirect()->back();

        return view('admin.courses.modules.edit', compact('course', 'module'));
    }

    public function update ( Request $request )
    {
        $courseId = $request->course_id;
        $moduleId = $request->module;

        if ( !$this->courseRepository->findById($courseId) || !$this->repository->findById($moduleId) ) return redirect()->back();

        $this->repository->update($moduleId, $request->only('name'));

        return redirect()->route('modules.index', ['course_id' => $courseId]);
    }
}
