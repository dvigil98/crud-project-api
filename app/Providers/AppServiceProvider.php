<?php

namespace App\Providers;

use App\Interfaces\ICategoryRepository;
use App\Interfaces\ICategoryService;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);

        // Services
        $this->app->bind(ICategoryService::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
