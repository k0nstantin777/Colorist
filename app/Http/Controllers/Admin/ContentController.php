<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\ImageMover;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Model\Text;
use App\Models\Image;
use App\Models\Icon;

use App\Models\Element;

class ContentController extends Controller
{
    use ImageMover;

    public function update(Request $request)
    {
        $inputs = $request->all();

        //Поле name вида: texts_id, images_id ...
        foreach ($inputs as $input => $value)
        {
            $content = explode('_', $input);
            if ($content[0] === 'texts'){
                $request->validate([
                    $input => 'nullable|min:3',
                ]);

                Text::find($content[1])->update([
                    'text' => $value,
                ]);

            }

            if ($content[0] === 'icons'){
                $request->validate([
                    $input => 'in:'.implode(',', array_keys(config('icons.icons'))),
                ]);

                Icon::find($content[1])->update([
                    'icon' => $value,
                ]);
            }

            if ($content[0] === 'images' && $value !== null){
                $request->validate([
                    $input => 'image',
                ]);

                try {
                    $this->saveImage($request, $input, $content[1]);
                } catch (\ErrorException $e){
                    return redirect()->back()->with(['errorUpload' => $e->getMessage(), 'error' => $e->getMessage()]);
                }

            }
        }

        return redirect()->back()->with('success', 'Cохранено!');
    }

    public function create(Request $request, Model $model)
    {
        $this->authorize('create', $model);

        $action = $request->input('action');
        if($action === 'slideCreate'){
            $max_sort = Text::where('table_rel', 'blocks')->where('table_id', $model->id)->max('sort');
            Text::create([
                'text' => '',
                'table_rel' => 'blocks',
                'table_id' => $model->id,
                'sort' => $max_sort + 1
            ]);

            Image::create([
                'path' => '',
                'size' => '0',
                'oldname' => '',
                'ext' => '',
                'mime' => '',
                'table_rel' => 'blocks',
                'table_id' => $model->id,
                'sort' => $max_sort + 1
            ]);

            return redirect()->back()->with('success', 'Элемент создан, теперь его можно отредактировать');
        }

        if ($action === 'elementContentCreate'){
            $inputs = $request->all();

            //Поле name вида: texts_id, images_id ...
            foreach ($inputs as $input => $value)
            {
                $content = explode('_', $input);
                if ($content[0] === 'texts'){
                    $request->validate([
                        $input => 'nullable|min:3',
                    ]);

                    $max_sort = Text::where('table_rel', 'elements')->where('table_id', $model->id)->max('sort');
                    Text::create([
                        'text' => $value,
                        'table_rel' => 'elements',
                        'table_id' => $model->id,
                        'sort' => $max_sort + 1
                    ]);

                }

                if ($content[0] === 'icons'){
                    $request->validate([
                        $input => 'in:'.implode(',', array_keys(config('icons.icons'))),
                    ]);

                    $max_sort = Icon::where('table_rel', 'elements')->where('table_id', $model->id)->max('sort');
                    Icon::create([
                        'icon' => $value,
                        'table_rel' => 'elements',
                        'table_id' => $model->id,
                        'sort' => $max_sort + 1
                    ]);
                }

                if ($content[0] === 'images' && $value !== null){
                    $request->validate([
                        $input => 'image',
                    ]);

                    try {
                        $this->saveImage($request, $input);
                    } catch (\ErrorException $e){
                        return redirect()->back()->with(['errorUpload' => $e->getMessage(), 'error' => $e->getMessage()]);
                    }

                }
            }
        }

        if ($action === 'elementCreate'){
            $request->validate([
                'head' => 'min:3|max:50',
            ]);
            $max_sort = Element::where('element_id', $model->id)->max('sort');
            $head = $request->input('head');
            Element::create([
                'name' => $head,
                'head' => $head,
                'element_id' => $model->id,
                'template_id' => $request->input('elementTemplate'),
                'sort' => $max_sort ? $max_sort+1 : 0,

            ]);
        }

        return redirect()->back()->with('success', 'Изменения сохранены!');
    }

    public function delete(Request $request, Model $model)
    {
        $this->authorize('delete', $model);

        $action = $request->input('action');
        if($action === 'slideDelete'){
            $sort = $request->input('sort');
            Text::where([
                'table_rel' => 'blocks',
                'table_id' => $model->id,
                'sort' => $sort
            ])->delete();

            $image = Image::where([
                'table_rel' => 'blocks',
                'table_id' => $model->id,
                'sort' => $sort
            ])->first();

            $this->removeImage($image);
        }

        if($action === 'contactDelete'){
            $sort = $request->input('sort');

            Text::where([
                'table_rel' => 'elements',
                'table_id' => $model->id,
                'sort' => $sort
            ])->delete();

            Icon::where([
                'table_rel' => 'elements',
                'table_id' => $model->id,
                'sort' => $sort
            ])->delete();

        }

        if($action === 'priceDelete'){
            $sort = $request->input('sort');
            Text::where([
                'table_rel' => 'elements',
                'table_id' => $model->id,
                'sort' => $sort
            ])->delete();
            Text::where([
                'table_rel' => 'elements',
                'table_id' => $model->id,
                'sort' => $sort+1
            ])->delete();
        }

        if ($action === 'priceGroupDelete'){
            Text::where([
                'table_rel' => 'elements',
                'table_id' => $model->id,
            ])->delete();
            $model->delete();
        }

        return redirect()->back()->with('success', 'Выбранный элемент удален!');
    }

    public function activate(Model $model)
    {
        $this->authorize('update', $model);

        //dd($model);

        $model->is_active = !$model->is_active;
        $model->save();

        return redirect()->back()->with('success', 'Изменения сохранены!');
    }

}
