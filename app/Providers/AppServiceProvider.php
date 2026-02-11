<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
Use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;

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
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar'
        ]);

        Paginator::useBootstrap();
    }
}
