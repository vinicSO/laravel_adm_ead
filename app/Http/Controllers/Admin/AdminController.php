<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\Admin\{
    StoreAdminRequest,
    UpdateAdminRequest
};
use App\Services\{
    AdminService,
    UploadFileService
};
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    protected $service;

    public function __construct ( AdminService $service )
    {
        $this->service = $service;    
    }

    public function index ( Request $request )
    {
        $admins = $this->service->getAll(
            $filter = $request->get('filter', '')
        );

        return view('admin.admins.index', compact('admins'));
    }

    public function create ( )
    {
        return view('admin.admins.create');
    }

    public function store ( StoreAdminRequest $request )
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $this->service->create($data);

        return redirect()->route('admins.index');
    }

    public function edit ( Request $request )
    {
        if (!$admin = $this->service->findById($request->admin)) return redirect()->back();

        return view('admin.admins.edit', compact('admin'));
    }

    public function update ( UpdateAdminRequest $request )
    {
        $data = $request->only([
            'name',
            'email'
        ]);

        if ($request->password) $data['password'] = bcrypt($request->password);

        if (!$this->service->update($request->admin, $data)) return redirect()->back();

        return redirect()->route('admins.index');
    }

    public function uploadFile ( StoreImageRequest $request, UploadFileService $uploadFileService ) 
    {
        $path = $uploadFileService->store($request->image, 'admins');

        if (!$this->service->update($request->id, ['image' => $path]))
        {
            return back();
        }

        return redirect()->route('admins.index');
    }

    public function editImage ( Request $request )
    {
        if (!$admin = $this->service->findById($request->id)) return redirect()->back();

        return view('admin.admins.edit-image', compact('admin'));
    }

}
