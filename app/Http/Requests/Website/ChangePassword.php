<?php

namespace App\Http\Requests\Website;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends FormRequest
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
        $id = Auth::user()->id;
        $user = User::find($id);;
        // dd($user->google_id,$user->facebook_id);
        // dd(!isset($this->password));
        $rule = [];
      
        $rule = [
           'new_password'=>'required|min:8|regex:/^.*(?=.{3,})(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/|different:password',
           'confirm_password'=>'required|same:new_password'
        ];
        
        // dd(!isset($this->password));
        if(Auth::user()->google_id == null && Auth::user()->facebook_id == null) {
            //    dd('d');
            $rule =  array_merge($rule,[
               'password'=> ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }]]);
        }
        return $rule ;
    }
}
