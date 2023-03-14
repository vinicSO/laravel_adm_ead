<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $service;

    public function __construct ( UserService $service )
    {
        $this->service = $service;    
    }

    public function index ( Request $request )
    {
        $users = $this->service->getAll(
            $filter = $request->get('filter', '')
        );

        return view('admin.users.index', compact('users'));
    }

    public function create ( )
    {
        return view('admin.users.create');
    }

    public function store ( StoreUserRequest $request )
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $this->service->create($data);

        return redirect()->route('users.index');
    }

    public function edit ( Request $request )
    {
        if (!$user = $this->service->findById($request->id)) return redirect()->back();

        return view('admin.users.edit', compact('user'));
    }

    public function update ( UpdateUserRequest $request )
    {
        $data = $request->only([
            'name',
            'email'
        ]);

        if ($request->password) $data['password'] = bcrypt($request->password);

        if (!$this->service->update($request->id, $data)) return redirect()->back();

        return redirect()->route('users.index');
    }
}
