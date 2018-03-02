<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BlockFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $array = [
            'blockName' => 'required|min:3|max:50|unique:blocks,name',
            'blockDescription' => 'nullable',
            'blockHead' => 'nullable|min:3|max:200',
            'blockSubHead' => 'nullable|min:3|max:255',
            'blockPage' => 'required|integer',

        ];

        if ($request->input('action') === 'update'){

        }

        if ($request->input('action') === 'create'){
            $array['blockTemplate'] = 'required|integer';
        }

        return $array;
    }
}
