<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set(settings('TIMEZONE'));
                
        config([
            'mail.host' => settings('MAIL_HOST'),
            'mail.port' => settings('MAIL_PORT'),
            'mail.from.address' => settings('MAIL_FROM_ADDRESS'),
            'mail.from.name' => settings('MAIL_FROM_NAME'),
            'mail.encryption' => settings('MAIL_ENCRYPTION'),
            'mail.username' => settings('MAIL_USERNAME'),
            'mail.password' => settings('MAIL_PASSWORD'),
        ]);
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
