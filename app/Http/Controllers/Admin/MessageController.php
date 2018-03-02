<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $this->authorize('index', Message::class);

        $messages = Message::orderBy('created_at','desc')->paginate(20);
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.message.index',
            'title' => 'Сообщения',
            'messages' => $messages,
        ]);
    }
    
    public function show($id)
    {
        $this->authorize('show', Message::class);

        $message = Message::find($id);
        
        $message->is_read = 1;
        $message->save();
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.message.show',
            'title' => 'Просмотр сообщения',
            'message' => $message,
        ]);
    }
    
    public function delete($id)
    {
        $this->authorize('delete', Message::class);

        $message = Message::find($id);
        
        $message->delete();
        
        return redirect()->route('admin.message.index');
    }
}
