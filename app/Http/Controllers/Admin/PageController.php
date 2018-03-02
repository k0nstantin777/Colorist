<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageFormRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Page::class);

        $pages = Page::where('is_main', null)->where('level',1)->orderBy('sort', 'asc')->get();
        $pages->map(function($item){
            $item->childs = Page::where('parent_id', $item->id)->where('level',2)->orderBy('sort', 'asc')->get();
        });

        //dd($pages);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.page.index',
            'title' => 'Страницы',
            'pages' => $pages,
            'pages_level1' => Page::where('is_main', null)->where('level',1)->orderBy('sort', 'asc')->get(),
            'pages_level2' => Page::where('is_main', null)->where('level',2)->orderBy('sort', 'asc')->get(),
            'mainPage' => Page::where('is_main', 1)->first()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Page::class);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.page.create',
            'title' => 'Создание страницы',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        $this->authorize('create', Page::class);

        $parentPage = Page::find($request->input('parentPage'));

        $page = Page::create([
            'name' => $request->input('pageName'),
            'slug' => $request->input('pageSlug'),
            'hint' => $request->input('pageHint'),
            'title' => $request->input('pageTitle'),
            'keywords' => $request->input('pageKeywords'),
            'description' => $request->input('pageDescription'),
            'is_active' => $request->input('pageStatus'),
            'noindex' => $request->input('pageNoindex'),
            'sitemap' => $request->input('pageSitemap'),

        ]);

        if($parentPage){
            $max_sort = Page::where('parent_id', $parentPage->id)->max('sort');
            $page->update([
                'sort' => $max_sort+1,
                'parent_id' => $parentPage->id,
                'level' => 2
            ]);
            $parentPage->update([
                'childrens' => $parentPage->childrens + 1,
            ]);
        } else {
            $max_sort = Page::where('level', 1)->max('sort');
            $page->update([
                'sort' => $max_sort+1,
            ]);
        }


        return redirect()->route('admin.page.index')->with('success', 'Изменения сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->authorize('update', Page::class);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.page.edit',
            'title' => 'Редактирование страницы '.$page->name,
            'pageModel' => $page,
            'blocks' => $page->blocks()->orderBy('sort', 'asc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, Page $page)
    {
        $this->authorize('update', Page::class);

        $slug = $request->input('pageSlug');
        $page->update([
            'name' => $request->input('pageName'),
            'hint' => $request->input('pageHint'),
            'slug' => $slug,
            'title' => $request->input('pageTitle'),
            'keywords' => $request->input('pageKeywords'),
            'description' => $request->input('pageDescription'),
            'is_active' => $request->input('pageStatus'),
            'noindex' => $request->input('pageNoindex'),
            'sitemap' => $request->input('pageSitemap'),
        ]);



        return redirect()->route('admin.page.edit', $slug)->with('success', 'Изменения сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', Page::class);

        $page->delete();

        return redirect()->back()->with('success', 'Страница удалена!');
    }

    public function childCreate(Page $page)
    {
        $this->authorize('update', Page::class);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.page.create',
            'title' => 'Создание страницы',
            'parentPage' => $page,
        ]);
    }

}
