<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $service;

    public function __construct ( CourseService $service )
    {
        $this->service = $service;    
    }

    public function index ( Request $request )
    {
        $courses = $this->service->getAll(
            $filter = $request->get('filter', '')
        );

        return view('admin.courses.index', compact('courses'));
    }

    public function create ()
    {
        return view('admin.courses.create');
    }

    public function store ( StoreCourseRequest $request, UploadFileService $uploadFileService )
    {
        $data = $request->only([
            'name',
            'description'
        ]);
        $data['available'] = isset($request->available);

        if ( $request->image )
        {
            $data['image'] = $uploadFileService->store($request->image, 'courses');
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }

    public function edit ( Request $request )
    {
        if ( !$course = $this->service->findById($request->course) ) return back();

        return view('admin.courses.edit', compact('course'));
    }

    public function update ( UpdateCourseRequest $request, UploadFileService $uploadFileService )
    {
        $data = $request->only([
            'name',
            'description'
        ]);
        $data['available'] = isset($request->available);

        if ( $request->image )
        {
            $course = $this->service->findById($request->course);

            if ( $course && $course->image )
            {
                $uploadFileService->remove($course->image);
            }

            $data['image'] = $uploadFileService->store($request->image, 'courses');
        }

        $this->service->update($request->course, $data);

        return redirect()->route('courses.index');
    }

    public function show ( Request $request )
    {
        if ( !$course = $this->service->findById($request->course) ) return redirect()->back();

        return view('admin.courses.show', compact('course'));
    }

    public function destroy ( Request $request )
    {
        $this->service->delete($request->course);

        return redirect()->route('admin.courses.index');
    }
}
