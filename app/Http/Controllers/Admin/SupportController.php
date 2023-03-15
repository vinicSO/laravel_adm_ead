<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $service;

    public function __construct ( SupportService $service )
    {
        $this->service = $service;
    }

    public function index ( Request $request )
    {
        $supports = $this->service->getAll($request->status ?? '');

        return view('admin.supports.index', compact('supports'));
    }

}
