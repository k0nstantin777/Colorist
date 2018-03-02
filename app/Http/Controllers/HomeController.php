<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ContentParser;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use App\Models\Element;
use App\Models\Review;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{

    use ContentParser;

    /**
     * Rendering Main Page
     *
     * @return string
     */
    public function index()
    {
        $page = Page::find(1);

        $blocks = $page->blocks()
                ->with('template')
                ->where('is_active', 1)
                ->orderBy('sort', 'asc')
                ->get();
                
       //image, texts или elements, ...
        $blocks->map(function($item){
            
            $tables = explode(',', $item->template->content);
            
            if ($tables[0] === 'elements'){
                $item['elements'] = Element::with('template')
                                        ->where('block_id', $item->id)
                                        ->where('is_active', 1)
                                        ->orderBy('sort', 'asc')
                                        ->get();

                $item['elements']->map(function($element){
                    $element['content'] = $this->parseContent($element);
                });
                
                return;
            }
                        
            return $item['content'] = $this->parseContent($item); 
                                  
        });
        
       //dd($blocks);
        
        return view('layouts.primary', [
            'page' => 'pages.page',
            'title' => $page->title,
            'noindex' => $page->noindex,
            'sitemap' => $page->sitemap,
            'blocks' => $blocks,
            'keywords' => $page->keywords,
            'description' => $page->description,
                       
        ]);
    }
    
     /**
     * Rendering pages
     * @return string
     */
    public function pages(Page $page)
    {
        if ($page->childrens>0){
            throw new NotFoundHttpException();
        }

        $blocks = $page->blocks()
            ->with('template')
            ->where('is_active', 1)
            ->orderBy('sort', 'asc')
            ->get();

        //image, texts или elements, ...
        $blocks->map(function($item){

            $tables = explode(',', $item->template->content);

            if ($tables[0] === 'elements'){
                $item['elements'] = Element::with('template')
                    ->where('block_id', $item->id)
                    ->where('is_active', 1)
                    ->orderBy('sort', 'asc')
                    ->get();

                $item['elements']->map(function($element){
                    $element['content'] = $this->parseContent($element);
                });

                return;
            }

            return $item['content'] = $this->parseContent($item);

        });
        return view('layouts.primary', [
            'page' => 'pages.page',
            'blocks' => $blocks,
            'noindex' => $page->noindex,
            'sitemap' => $page->sitemap,
            'title' => $page->title,
            'keywords' => $page->keywords,
            'description' => $page->description,
        ]);
    }

    public function sitemap()
    {
        $pages = Page::where('sitemap', 1)->where('childrens', 0)->get();
        return response()->view('pages.sitemap', compact('pages'))
            ->header('Content-Type', 'text/xml');

    }
       
    
}
