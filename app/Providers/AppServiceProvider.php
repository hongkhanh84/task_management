<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
