<?php

namespace App\Providers;

use App\repositories\EmployeeRepository;
use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);  
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
