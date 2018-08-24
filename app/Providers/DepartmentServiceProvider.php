<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class DepartmentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class
        );
    }
}
