<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserFormRequest extends FormRequest
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
            'login' => 'required|min:3|max:50|regex:/[a-z]+/',
            'role' => 'required|in:1,2,3',
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'nullable|min:3|max:50',
            'age' => 'nullable|integer',
            'birthdate' => 'nullable|date',
            'sex' => 'in:мужской,женский',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|min:4|max:20',
            'file' => 'image'
        ];
        
        if ($request->input('action') === 'update'){
            if ($request->input('password') !== null){
                $array['password'] = 'required|min:6|max:50';
                $array['repeate_password'] = 'required|same:password';
            }
        }
        
        if ($request->input('action') === 'create'){
            $array['password'] = 'required|min:6|max:50';
            $array['repeate_password'] = 'required|same:password';
            $array['login'] .= '|unique:users,name';
            $array['email'] .= '|unique:users';
        }
        
        return $array;
    }
}
