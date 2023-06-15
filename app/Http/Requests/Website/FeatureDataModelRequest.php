<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class FeatureDataModelRequest extends FormRequest
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
            'feature_data_model_name'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'feature_data_model_name.required'=>'model is required'
        ];
    }
}
