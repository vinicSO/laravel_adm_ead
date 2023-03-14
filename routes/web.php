<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    UserController
};


Route::prefix('admin')->group( function () {
    
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});
