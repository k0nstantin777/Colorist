<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PageFormRequest extends FormRequest
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
                'pageName' => 'required|min:3|max:50|unique:pages,name',
                'pageHint' => 'nullable',
                'pageTitle' => 'required|min:3|max:80',
                'pageKeywords' => 'nullable|min:3|max:250',
                'pageDescription' => 'required|max:200|min:10',
                'pageStatus' => 'required|boolean',
                'pageNoindex' => 'required|boolean',
                'pageSitemap' => 'required|boolean',
                'pageSlug' => 'required|regex:/^[a-z-_ ]+$/|unique:pages,slug'

        ];

        if ($request->input('action') === 'update'){

        }

        if ($request->input('action') === 'create'){

        }

        return $array;

    }
}
