<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Skill;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('categories', Category::get());
        view()->share('skills', Skill::get());
        view()->share('pages', Page::get());
    }
}
