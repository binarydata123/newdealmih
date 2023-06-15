<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        
        $rule = [];
        // if ($this->page == 1) {
            $rule = [
                // 'pageValue.firstname' => 'required',
                // 'pageValue.lastname' => 'required',
                // 'pageValue.gender' => 'required',
                // 'pageValue.dob' => 'required',
                // 'email' => 'required|email|unique:users',
                'username' => 'required',
                 // 'email' => 'required|email|unique:users',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required|min:8',
                'privacy_policy' => 'required'
                // regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',

            ];
        // }
        // if($this->page == 4)
        //     {
        //         $rule = [
        //             'pageValue.password'=>'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        //             'pageValue.confirm_password'=>'required|same:pageValue.password'
        //         ];
        //     }
        return $rule;
    }
    public function messages()  
    {
        return [
            // 'pageValue.firstname.required' => 'first name field required',
            // 'pageValue.lastname.required' => 'last name field required',
            // 'pageValue.gender.required' => 'gender field required',
            // 'pageValue.dob.required' => 'dob field required',
            // 'pageValue.username.required' => 'user name field required',
            // 'pageValue.email.required' => 'email field required',
            // 'pageValue.email.email' => 'valid email required',
            // 'pageValue.phone_number.required' => 'phone number field required',
            // 'pageValue.phone_number.numeric' => 'only number allowed',

            'password.required' => 'password field required',
            'username.required' => 'Full name field required',
             'privacy_policy.required' => 'You must read and accept the Terms & Conditions and Privacy Policy in order to create an account',

            'password.min' => 'password must be at least 8 characters .', 
            'password.same' => 'confirm password must be same as password .',
           
            'password.regex' => 'Password must contain at least one number and one uppercase and one special character.',

            // 'pageValue.confirm_password.required' => 'confirm password field required',
            // 'pageValue.confirm_password.same' => 'confirm password and password must match',
           


        ];  
    }
}
