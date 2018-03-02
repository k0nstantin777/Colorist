<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\Page' => 'App\Policies\PagePolicy',
        'App\Models\Block' => 'App\Policies\BlockPolicy',
        'App\Models\Element' => 'App\Policies\ElementPolicy',
        'App\Models\Review' => 'App\Policies\ReviewPolicy',
        'App\Models\Prive' => 'App\Policies\PrivePolicy',
        'App\Models\Message' => 'App\Policies\MessagePolicy',
        'App\Models\Setting' => 'App\Policies\SettingPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin_access', function ($user) {
            $prives = $user->role->prives()->pluck('name');
               
            $allowed = $prives->filter(function($item){
                return $item === 'admin_access' || $item === 'superuser';
            });
            
            return $allowed->isNotEmpty();
        });
    }
}
