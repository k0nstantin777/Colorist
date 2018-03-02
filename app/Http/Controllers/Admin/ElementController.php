<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\ImageMover;
use App\Http\Requests\ElementFormRequest;
use App\Models\Element;
use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Template;
use App\Models\Image;
use App\Model\Text;
use App\Models\Icon;

class ElementController extends Controller
{
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
    public function create($block_slug)
    {
        $this->authorize('create', Element::class);

        $block = Block::where('slug', $block_slug)->first();
        $templates_coll = Template::where('type', 'elements')->get();
        $templates = $templates_coll->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.element.create',
            'title' => 'Создание элемента',
            'block' => $block,
            'templates' => $templates
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ElementFormRequest $request)
    {
        $this->authorize('create', Element::class);

        $blockId = $request->input('blockId');
        $max_sort = Element::where('block_id', $blockId)->max('sort');
        $element = Element::create([
            'name' => $request->input('elementName'),
            'description' => $request->input('elementDescription', null),
            'head' => $request->input('elementHead', null),
            'sub_head' => $request->input('elementSubHead', null),
            'block_id' => $blockId,
            'template_id' => $request->input('elementTemplate'),
            'sort' => $max_sort ? $max_sort+1 : 0,
        ]);

        return redirect()->route('admin.block.edit', $element->block->slug )->with('success', 'Элемент создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(ElementFormRequest $request, Element $element)
    {
        $this->authorize('update', Element::class);

        $element->update([
            'name' => $request->input('elementName'),
            'description' => $request->input('elementDescription', null),
            'head' => $request->input('elementHead', null),
            'sub_head' => $request->input('elementSubHead', null),
        ]);

        return redirect()->back()->with('success', 'Изменения сохранены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        $this->authorize('delete', Element::class);

        $block = Block::find($element->block_id);
        Text::where('table_rel', 'elements')->where('table_id', $element->id)->delete();
        $images = Image::where('table_rel', 'elements')->where('table_id', $element->id)->get();
        foreach($images as $image){
            $this->removeImage($image);
        }

        Icon::where('table_rel', 'elements')->where('table_id', $element->id)->delete();

        $element->delete();

        return redirect()->route('admin.block.edit', $block->slug)->with('success', 'Элемент удален!');
    }

}
