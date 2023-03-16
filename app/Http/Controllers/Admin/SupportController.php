<?php

namespace App\Http\Controllers\Admin;

use App\Enum\SupportEnum;
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
        $supports = $this->service->getAll($request->status ?? 'P');

        $statusOptions = SupportEnum::cases();

        return view('admin.supports.index', compact('supports', 'statusOptions'));
    }

    public function show( Request $request )
    {
        if ( !$support = $this->service->findById($request->id) ) return redirect()->back();

        return view('admin.supports.show', compact('support'));
    }

}
