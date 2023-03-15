<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
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
        $data = $request->only('name');
        $data['available'] = isset($request->available);

        if ( $request->image )
        {
            $data['image'] = $uploadFileService->store($request->image, 'courses');
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }
}
