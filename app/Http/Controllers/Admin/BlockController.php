<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\ContentParser;
use App\Http\Controllers\Traits\ImageMover;
use App\Http\Requests\BlockFormRequest;
use App\Models\Block;
use App\Models\Image;
use App\Model\Text;
use App\Http\Controllers\Controller;
use App\Models\Element;
use App\Models\Page;
use App\Models\Review;
use App\Models\Template;
use App\Models\Icon;

class BlockController extends Controller
{
    use ContentParser;
    use ImageMover;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page_slug)
    {
        $this->authorize('create', Block::class);

        $page = Page::where('slug', $page_slug)->first();
        $templates_coll = Template::where('type', 'blocks')->get();
        $templates = $templates_coll->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.block.create',
            'title' => 'Создание блока',
            'pageModel' => $page,
            'templates' => $templates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlockFormRequest $request)
    {
        $this->authorize('update', Block::class);

        $pageId = $request->input('blockPage');
        $max_sort = Block::where('page_id', $pageId)->max('sort');
        $block = Block::create([
            'name' => $request->input('blockName'),
            'description' => $request->input('blockDescription', null),
            'head' => $request->input('blockHead', null),
            'sub_head' => $request->input('blockSubHead', null),
            'page_id' => $pageId,
            'slug' => url_slug($request->input('blockName')),
            'template_id' => $request->input('blockTemplate'),
            'sort' => $max_sort ? $max_sort+1 : 0,
        ]);

        return redirect()->route('admin.page.edit', $block->page->slug )->with('success', 'Изменения сохранены!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block $block
     * @return \Illuminate\Http\Response
     */
    public function edit(Block $block)
    {
        $this->authorize('update', Block::class);

        $tables = explode(',', $block->template->content);
            
        if ($tables[0] === 'elements'){
            $elements = Element::with('template')
                                    ->where('block_id', $block->id)
                                    ->orderBy('sort', 'asc')
                                    ->get();
            $block['elements'] = $elements->map(function($element){
                $element['content'] = $this->parseContent($element);
                return $element;
            });

        } else {
            $content = $this->parseContent($block);
            $block['content'] = $content;
        }

        //dd($block);
        $pages_coll = Page::orderBy('sort', 'asc')->get();
        $pages = $pages_coll->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.block.edit',
            'title' => 'Редактирование блока '.$block->name,
            'block' => $block,
            'pages' => $pages,
            'reviews' => Review::where('is_active', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(BlockFormRequest $request, Block $block)
    {
        $this->authorize('update', Block::class);

        $slug = url_slug($request->input('blockName'));
        $block->update([
            'name' => $request->input('blockName'),
            'description' => $request->input('blockDescription', null),
            'head' => $request->input('blockHead', null),
            'sub_head' => $request->input('blockSubHead', null),
            'page_id' => $request->input('blockPage'),
            'slug' => $slug,
        ]);

        return redirect()->route('admin.block.edit', $slug)->with('success', 'Изменения сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        $this->authorize('delete', Block::class);

        $page = Page::find($block->page_id);
        Text::where('table_rel', 'blocks')->where('table_id', $block->id)->delete();
        $images = Image::where('table_rel', 'blocks')->where('table_id', $block->id)->get();
        foreach($images as $image){
            $this->removeImage($image);
        }

        Icon::where('table_rel', 'blocks')->where('table_id', $block->id)->delete();
        $elements = Element::where('block_id', $block->id)->get();
        foreach($elements as $element){
            Text::where('table_rel', 'elements')->where('table_id', $element->id)->delete();
            $images = Image::where('table_rel', 'elements')->where('table_id', $element->id)->get();
            foreach($images as $image){
                $this->removeImage($image);
            }
            Icon::where('table_rel', 'elements')->where('table_id', $element->id)->delete();
            $element->delete();
        }
        $block->delete();

        return redirect()->route('admin.page.edit', $page->slug)->with('success', 'Блок удален!');
    }

}
