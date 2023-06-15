<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreate extends FormRequest
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
        $category = json_decode($this->data, true);
       
        $rules = [];
        // dd($this->all());
        if ($category['name']== null && $category['status'] == null) {
            $rules = [
                'category.name' => 'required',
                // 'category.parent'=>'required',
                'category.status' => 'required'

            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'category.name.required' => "category field is requird",
            // 'category.parent.required'=>"parent category field is requird",
            'category.status.required' => "status field is requird"

        ];
    }
}
