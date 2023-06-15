<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HeaderCategory extends FormRequest
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
    public function rules()
    {
        return [
            'category.name'=>'required|min:3',
            'category.ne_name'=>'required|min:3'
        ];
    }

    public function message()
    {
        return [
            'category.name.required'=>"category header name field is required",
            'category.name.min.required'=>"minimum 3 number",
            'category.ne_name.required'=>"category header name field is required",
            'category.ne_name.min.required'=>"minimum 3 number",
            ];
    }
}
