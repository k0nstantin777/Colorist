<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;

class MainController extends Controller
{
    public function index()
    {

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.home',
            'title' => 'Панель администратора '.env('APP_NAME'),

        ]);
    }
    
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $blocks = $page->blocks()->get();
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.page-edit',
            'title' => 'Редактирование страницы: '.$page->name,
            'blocks' => $blocks,
            'pageModel' => $page,
        ]);
    }

}
