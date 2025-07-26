<?php

namespace App\Providers;

use App\Interfaces\ProjectInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\TeamInterface;
use App\Interfaces\UserInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\RoleRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class,RoleRepository::class);
        $this->app->bind(TeamInterface::class,TeamRepository::class);
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(ProjectInterface::class,ProjectRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
