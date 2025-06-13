<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Posts;
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.app', function ($view) {
            $view->with('allPosts', Posts::latest()->get());
        });
    }
}
