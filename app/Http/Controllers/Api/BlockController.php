<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Model\Text;
use App\Models\Element;
use App\Models\Review;
use App\Models\Icon;

class BlockController extends Controller
{
    public function sliderSort(Request $request)
    {
        $blockId = $request->input('blockId');
        $contents = $request->input('contents');
        $images = Image::where('table_rel', 'blocks')
            ->where('table_id', $blockId)
            ->orderBy('sort', 'asc')->pluck('id')->toArray();
        $texts = Text::where('table_rel', 'blocks')
            ->where('table_id', $blockId)
            ->orderBy('sort', 'asc')->pluck('id')->toArray();

        for ($i=0; $i<count($contents); $i++){
            Image::find($images[$i])->update(['sort' => $contents[$i]]);
            Text::find($texts[$i])->update(['sort' => $contents[$i]]);
        }

    }

    public function elementSort(Request $request)
    {
        $blockId = $request->input('blockId');
        $elements = $request->input('elements');

        for($i=0; $i<count($elements); $i++){
            Element::where('id', $elements[$i])
                ->where('block_id', $blockId)
                ->update([
                    'sort' => $i,
                ]);
        };
    }

    public function imageSort(Request $request)
    {
        $images = $request->input('images');

        for($i=0; $i<count($images); $i++){
            Image::where('id', $images[$i])
                ->update([
                    'sort' => $i,
                ]);
        };
    }

    public function reviewSort(Request $request)
    {
        $reviews = $request->input('reviews');

        for($i=0; $i<count($reviews); $i++){
            Review::where('id', $reviews[$i])
                ->update([
                    'sort' => $i,
                ]);
        };
    }

    public function contactSort(Request $request)
    {
        //print_r($request->all()); return;
        $elementId = $request->input('elementId');
        $contents = $request->input('contents');
        $icons = Icon::where('table_rel', 'elements')
            ->where('table_id', $elementId)
            ->orderBy('sort', 'asc')->pluck('id')->toArray();
        $texts = Text::where('table_rel', 'elements')
            ->where('table_id', $elementId)
            ->orderBy('sort', 'asc')->pluck('id')->toArray();

        for ($i=0; $i<count($contents); $i++){
            Icon::find($icons[$i])->update(['sort' => $contents[$i]]);
            Text::find($texts[$i])->update(['sort' => $contents[$i]]);
        }

    }

    public function priceSort(Request $request)
    {
        //print_r($request->all()); return;
        $elementId = $request->input('elementId');
        $contents = $request->input('contents');
        $texts = Text::where('table_rel', 'elements')
            ->where('table_id', $elementId)
            ->orderBy('sort', 'asc')->pluck('id')->toArray();

        //print_r($texts); return;

        for ($i=0; $i<count($contents); $i++){
            Text::find($texts[$contents[$i]])->update(['sort' => $i*2]);
            Text::find($texts[$contents[$i]+1])->update(['sort' => $i*2+1]);
        }

    }

}
