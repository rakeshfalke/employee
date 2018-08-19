<?php

namespace App\Providers;

use App\Repositories\EmployeeRepository;
use App\Repositories\EmployeeInterface;
use App\Repositories\DepartmentRepository;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(EmployeeInterface::class, EmployeeRepository::class);
      $this->app->singleton(DepartmentInterface::class, DepartmentRepository::class);
    }
}
