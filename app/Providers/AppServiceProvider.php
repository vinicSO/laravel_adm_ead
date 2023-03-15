<?php

namespace App\Providers;

use App\Repositories\{
    AdminRepositoryInterface,
    CourseRepositoryInterface,
    UserRepositoryInterface
};
use App\Repositories\Eloquent\{
    AdminRepository,
    CourseRepository,
    UserRepository
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
