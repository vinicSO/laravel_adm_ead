<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    CourseController,
    UserController,
    ModuleController,
};


Route::prefix('admin')->group( function () {

    /**
     * Routes Modules
     */
    Route::resource(
        name: '/courses/{course_id}/modules',
        controller: ModuleController::class
    );

    /**
     * Routes Courses
     */
    Route::resource('/courses', CourseController::class);
    Route::put('/courses/{id}/uploadFile', [CourseController::class, 'uploadFile'])->name('courses.uploadFile');
    Route::get('/courses/{id}/edit-image', [CourseController::class, 'editImage'])->name('courses.editImage');

    /**
     * Routes Admins
     */
    Route::resource('/admins', AdminController::class);
    Route::put('/admins/{id}/uploadFile', [AdminController::class, 'uploadFile'])->name('admins.uploadFile');
    Route::get('/admins/{id}/edit-image', [AdminController::class, 'editImage'])->name('admins.editImage');

    /**
     * Routes Users
     */
    Route::put('/users/{id}/uploadFile', [UserController::class, 'uploadFile'])->name('users.uploadFile');
    Route::get('/users/{id}/edit-image', [UserController::class, 'editImage'])->name('users.editImage');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});
