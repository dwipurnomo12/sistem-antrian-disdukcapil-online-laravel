<?php

namespace App\Providers;

use App\Models\Antrian;
use Illuminate\Support\ServiceProvider;
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
        $antrians = Antrian::all();
        view::share('antrians', $antrians);
    }

    
}
