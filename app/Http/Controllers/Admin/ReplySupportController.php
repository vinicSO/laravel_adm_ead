<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Repositories\ReplySupportRepositoryInterface;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    
    protected $repository;
    protected $supportService;

    public function __construct ( ReplySupportRepositoryInterface $repository, SupportService $supportService )
    {
        $this->repository = $repository;
        $this->supportService = $supportService;
    }

    public function store ( StoreReplySupport $request )
    {
        $this->repository->store($request->only([
            'description',
            'support_id'
        ]));

        return redirect()->route('supports.show', $request->support_id);
    }
}
