<?php 

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\Page;
use App\Models\Album;
use App\Models\Status;
use App\Models\Message;
use App\Models\Image;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;

class MainComposer
{
    /**
     * Create a new Footer composer.
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
//        $comments = Cache::remember('comments', env('CACHE_TIME', 0), function(){
//            return Comment::with('post')->orderBy('created_at', 'desc')
//                ->limit(3)
//                ->get();
//        });
//        $view->with('comments', $comments);
//       
//        $archives = Cache::remember('archives', env('CACHE_TIME', 0), function(){
//            return Post::orderBy('created_at', 'desc')
//                        ->actual()
//                        ->select(DB::raw('DISTINCT MONTHNAME(created_at) AS month, YEAR(created_at) AS year'))
//                        ->get();
//        });    
//        $view->with('archives', $archives);
        
//         $pages = Page::all();
//         $view->with('pages', $pages);
         
//         $albums = Album::all();
//         $view->with('albums', $albums);
         
//         $sliders = Slider::all();
//         $view->with('sliders', $sliders);
         
         $newReviews = Review::where('is_active', 0)->get();

         $view->with('newReviews', $newReviews);

         $statuses = Status::all();
         $view->with('statuses', $statuses);
         
         $newMessages = Message::where('is_read', 0)->get();
         $view->with('newMessages', $newMessages);
         
         $user = Auth::user();
         $view->with('authUser', $user);
         
//         if ($user->profile->image_id === null){
             $userImage = config('imagestorage.defaultUserImage', '');
//         } else {
//             $userImage = config('imagestorage.userFilesPath').$user->profile->image->path;
//         }
         $view->with('userImage', $userImage);
         
    }
}
