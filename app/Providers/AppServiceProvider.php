<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Debugbar::disable();

//        View::composer('*', function($view){
//            $imgPath = Cache::remember('img_path', env('CACHE_TIME', 0), function(){
//                    return settings('USE_WATERMARK') ? config('blog.editionPath') : config('blog.originalPath') ;
//            });
//            
//            $view->with('imgPath', $imgPath);
//        });
        View::composer('parts.mainnavbar', 'App\Http\ViewComposers\SidebarComposer');
        View::composer('admin.*', 'App\Http\ViewComposers\Admin\MainComposer');
        View::composer('admin.pages.home', 'App\Http\ViewComposers\Admin\HomePageComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
