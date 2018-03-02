<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ElementFormRequest extends FormRequest
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
            'elementName' => 'required|min:3|max:50|unique:elements,name',
            'elementDescription' => 'nullable',
            'elementHead' => 'nullable|min:3|max:200',
            'elementSubHead' => 'nullable|min:3|max:255',

        ];

        if ($request->input('action') === 'update'){

        }

        if ($request->input('action') === 'create'){
            $array['elementTemplate'] = 'required|integer';
        }

        return $array;
    }
}
