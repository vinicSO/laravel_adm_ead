<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Repositories\{
    LessonRepositoryInterface,
    ModuleRepositoryInterface
};
use Illuminate\Http\Request;

class LessonController extends Controller
{

    protected $repository;
    protected $moduleRepository;
    
    public function __construct ( LessonRepositoryInterface $repository, ModuleRepositoryInterface $moduleRepository )
    {
        $this->repository = $repository;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $moduleId = $request->module_id;

        if ( !$module = $this->moduleRepository->findById($moduleId) ) return redirect()->back();

        $lessons = convertItemsOfArrayToObject($this->repository->getAllByModuleId(moduleId: $moduleId, filter: $request->filter ?? ''));

        return view('admin.courses.modules.lessons.index', compact('lessons', 'module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $moduleId = $request->module_id;

        if ( !$module = $this->moduleRepository->findById($moduleId) ) return redirect()->back();

        return view('admin.courses.modules.lessons.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateLesson $request )
    {
        $moduleId = $request->module_id;

        if ( !$this->moduleRepository->findById($moduleId) ) return redirect()->back();

        $this->repository->createByModule($moduleId, $request->validated());

        return redirect()->route('lessons.index', ['module_id' => $moduleId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request )
    {
        $moduleId = $request->module_id;

        if ( !$module = $this->moduleRepository->findById($moduleId) ) return redirect()->back();

        $lessonId = $request->lesson;

        if ( !$lesson = $this->repository->findById($lessonId) ) return redirect()->back();

        return view('admin.courses.modules.lessons.show', compact('module', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request )
    {
        $moduleId = $request->module_id;

        if ( !$module = $this->moduleRepository->findById($moduleId) ) return redirect()->back();

        $lessonId = $request->lesson;

        if ( !$lesson = $this->repository->findById($lessonId) ) return redirect()->back();

        return view('admin.courses.modules.lessons.edit', compact('module', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( StoreUpdateLesson $request )
    {
        $moduleId = $request->module_id;
        $lessonId = $request->lesson;

        if ( !$this->moduleRepository->findById($moduleId) || !$this->repository->findById($lessonId) ) return redirect()->back();

        $this->repository->update($lessonId, $request->validated());

        return redirect()->route('lessons.index', ['module_id' => $moduleId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request )
    {
        $moduleId = $request->module_id;
        $lessonId = $request->lesson;

        if ( !$this->moduleRepository->findById($moduleId) || !$this->repository->findById($lessonId) || !$this->repository->delete($lessonId) ) return redirect()->back();

        return redirect()->route('lessons.index', ['module_id' => $moduleId]);
    }
}
