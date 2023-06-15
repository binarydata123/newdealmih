<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        // dd($this->all());
        return [
            'district_id'=>'required',
            'municipaliti_id'=>'required',
            'village_id'=>'required',
            'address_one'=>'required',
         
        ];
    }
    public function messages()
    {
        return[
            'district_id.required'=>'The district field is required',
            'municipaliti_id.required'=>'The municipality field is required',
            'village.required'=>'The village field is required'
        ];

    }
}
