<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Post;
use App\Models\Page;

class SidebarComposer
{
    /**
     * Create a new App composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $categories = Cache::remember('categories', env('CACHE_TIME', 0), function(){
//                return Category::with('posts')->orderBy('name', 'ASC')->get();
//            });
//        $view->with('categories', $categories);
//            
//        $post = Cache::remember('favorite.post', env('CACHE_TIME', 0), function(){
//            return Post::where('is_favorite', 1)->first();
//        });
//        $view->with('post', $post);
//            
//        $posts = Cache::remember('popular.posts', env('CACHE_TIME', 0), function(){
//            return Post::where('views_count', '>' , 3)
//                    ->limit(5)
//                    ->orderBy('views_count','desc')
//                    ->get();
//        });
//        $view->with('posts', $posts);
//        $view->with('fdata', resolve('App\Includes\Classes\FormatData'));
        
        //страницы в шаблон parts.mainnavbar
        $pages_level1 = Cache::remember('pages1', env('CACHE_TIME', 0), function(){
            return Page::where([
                    'is_main' => null,
                    'level' => 1,
                    'is_active' => 1])
                ->orderBy('sort', 'asc')->get();
        });
        $view->with('pages_level1', $pages_level1);
        
        $pages_level2 = Cache::remember('pages2', env('CACHE_TIME', 0), function(){
            return Page::where([
                    'is_main' => null,
                    'level' => 2,
                    'is_active' => 1])
                ->orderBy('sort', 'asc')->get();
        });
        $view->with('pages_level2', $pages_level2);
        
               
    }
}
