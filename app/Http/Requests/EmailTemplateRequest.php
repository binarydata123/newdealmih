<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
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
            'emailData.title'=>'required',
            'emailData.content'=>'required',
            'emailData.subject'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'emailData.title.required'=>"title is required",
            'emailData.content.required'=>'content is required',
            'emailData.subject.required'=>'subject is required'
        ];
    }
}
