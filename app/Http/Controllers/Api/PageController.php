<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Block;

class PageController extends Controller
{
    /**
     * Редактирование SEO параметров на странице редактирования страниц
     * @param Request $request
     * @return string
     */
    public function pageEditPost(Request $request)
    {
        sleep(1);
        $this->validate($request, [
            'titleSEO' => 'max:80|min:2',
            'keywords'=> 'max:250',
            'description'=> 'max:200',
        ]);
        
        $page = Page::find($request->input('pageId'));
                
        $page->update([
            'title' => $request->input('titleSEO'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
        ]);
        
        return 'success';
    }
    
    /**
     * Сортировка блоков на странице редактирование страниц
     * @param Request $request
     */
    public function blockSort(Request $request)
    {
        $blocks = $request->input('blocks');
        for($i=0; $i<count($blocks); $i++){
            Block::where('id', $blocks[$i])
                    ->where('page_id', $request->input('pageId'))
                    ->update([
                        'sort' => $i,
                    ]);
        };

    }

    public function sort(Request $request)
    {
        $move = $request->input('move');
        $page = Page::find($request->input('pageId'));

        if ($move === 'up' || $move === 'down'){
            $this->moveByOneLevel($page, $move);
        } else if ($move === 'right') {
            $this->moveByDownLevel($page);
        } else if ($move === 'left') {
            $this->moveByUpLevel($page);
        }

        $pages = Page::where('is_main', null)->where('level',1)->orderBy('sort', 'asc')->get();
        $pages->map(function($item){
            $item->childs = Page::where('parent_id', $item->id)->where('level',2)->orderBy('sort', 'asc')->get();
        });

        return view('admin.widgets.lists.pages', [
            'pages' => $pages,
            'mainPage' => Page::where('is_main', 1)->first()
        ]);

    }

    private function moveByOneLevel ($page, $move)
    {
        if($move === 'up'){
            $sort = $page->sort - 1;
        }
        if($move === 'down'){
            $sort = $page->sort + 1;
        }

        $page_affect = Page::where('sort', $sort)->where('level', $page->level)->first();

        $page_affect_sort = $page_affect->sort;
        $page_sort = $page->sort;
        $page->update(['sort' => $page_affect_sort]);
        $page_affect->update(['sort' => $page_sort]);

        $this->sortsUpdate($page->level);
    }

    private function moveByDownLevel($page)
    {
        $parent_page = Page::where('sort', $page->sort - 1)->where('level', $page->level)->first();
        $parent_page->update(['childrens' => $parent_page->childrens+1]);
        $max_sort = Page::where('parent_id', $parent_page->id)->max('sort');
        $page->update([
            'level' => 2,
            'sort' => $max_sort +1,
            'parent_id' => $parent_page->id,
        ]);
        $this->sortsUpdate($page->level);
        $this->sortsUpdate($parent_page->level);
    }

    private function moveByUpLevel($page)
    {
        $new_level = $page->level-1;
        $parent_page = Page::find($page->parent_id);
        $new_sort = $parent_page->sort+1;
        Page::where('level', $parent_page->level)
            ->where('sort', '>', $parent_page->sort)
            ->update(['sort' => $new_sort+1]);

        $page->update([
            'level' => $new_level,
            'sort' => $new_sort,
            'parent_id' => null,
        ]);
        $parent_page->update(['childrens'=> $parent_page->childrens-1]);
        $this->sortsUpdate($page->level+1);
        $this->sortsUpdate($page->level);

    }

    private function sortsUpdate($level)
    {
        $pages = Page::where('level', $level)->where('is_main', null)->orderBy('sort','asc')->get();
        $i=1;
        foreach($pages as $key => $page){
            $page->update(['sort'=>$i]);
            $i++;
        }
    }

}
