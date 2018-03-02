<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IncludeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once (app_path('Includes/Helpers/helpers.php'));
        require_once (app_path('Includes/Helpers/url_slug.php'));
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
