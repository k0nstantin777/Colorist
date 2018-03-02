<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Message;
use App\Models\Block;
use App\Models\Page;
use App\Events\ReviewCreated;
use App\Events\FeedbackCreated;
use App\Models\Image;
use App\Models\Album;
use App\Includes\Classes\Uploader;
use App\Models\Slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function order(Request $request)
    {
        sleep(1);
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'phone' => 'regex:/[0-9-+ ]+/|min:6|max:100',
            'service' => 'required|min:6',
        ]);
       
        $orderNumber = Order::max('id') + 1;
                
        event(new ReviewCreated($request->all(), $orderNumber));
        
        return view('widgets.messages.success_order');
                        
    }
    
    public function feedbackSend(Request $request)
    {
        sleep(1);
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'subject' => '',
            'message' => 'required|min:8',
        ]);
      
        event(new FeedbackCreated($request->all()));

        return '<p>Ваше сообщение принято! Спасибо!</p>';
                        
    }

    public function reviewSend(Request $request)
    {
        sleep(1);
        $this->validate($request, [
            'review-name' => 'required|max:255|min:3',
            'review-text' => 'required|max:250',
        ]);

        event(new ReviewCreated($request->all()));

        return '<p>Ваш отзыв принят! Спасибо!</p>';

    }


}
