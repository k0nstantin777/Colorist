<?php

namespace App\Http\Controllers\Traits;

use App\Models\Element;
use Illuminate\Support\Facades\DB;

trait ContentParser
{
    /**
     * Парсинг контента для подгрузки в шаблоны
     * Тип контента исплоьзуемого в шаблоне получаем в виде строки из таблицы Templates->content
     * @param collection $item
     * @return collection|void
     */
    protected function parseContent($item)
    {
        $tables = explode(',', $item->template->content);

        if ($tables[0] === ''){
            return;
        }

        for ($i=0; $i<count($tables); $i++){

            if ($tables[$i] === 'reviews'){
                $data[$tables[$i]] = DB::table($tables[$i])
                    ->where('block_id', $item->id)
                    ->where('is_active', 1)
                    ->orderBy('sort', 'asc')
                    ->get();

                $data[$tables[$i]]->map(function($item){
                    $image = DB::table('images')->where('table_rel', 'reviews')->where('table_id', $item->id)->first();
                    $item->image = $image;
                });

            } else if ($tables[$i] === 'elements'){
                $data[$tables[$i]] = Element::where('element_id', $item->id)
                    ->where('is_active', 1)
                    ->orderBy('sort', 'asc')
                    ->get();
                $data[$tables[$i]]->map(function($item){

                    $item['content'] = $this->parseContent($item);

                });

            } else {

                $data[$tables[$i]] = DB::table($tables[$i])
                    ->where('table_rel', $item->template->type)
                    ->where('table_id', $item->id)
                    ->orderBy('sort', 'asc')
                    ->get()
                    ->toArray();
            }
        }

        return $data;
    }
}
