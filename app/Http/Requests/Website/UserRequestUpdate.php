<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
        if ($this->page == 1) {
            $rule = [
                // 'pageValue.firstname' => 'required',
                // 'pageValue.lastname' => 'required',
                'pageValue.gender' => 'required',
                'pageValue.dob' => 'required',
                'pageValue.username' => 'required',
                'pageValue.email' => 'required|email',
                'pageValue.phone_number' => 'required|numeric|digits:10',

            ];
        }
        if($this->page == 2)
        {
            $rule = [
                'pageValue.district'=>'required',
                'pageValue.municipality'=>'required',
                'pageValue.village'=>'required',
                'pageValue.address_one'=>'required',
               

                // 'pageValue.business_name'=>'required',
                // 'pageValue.business_reg_number'=>'required',
                // 'pageValue.business_tax_no'=>'required',
                // 'pageValue.about_company'=>'required',
            ];
            if(isset($this->pageValue['is_business']))
            {
                if($this->pageValue['is_business'] == 1)
                    {
                        $rule = array_merge($rule,[
                        'pageValue.business_name'=>'required',
                        'pageValue.business_reg_number'=>'required',
                        'pageValue.business_tax_no'=>'required',
                        'pageValue.about_company'=>'required',
                        'pageValue.is_contact_person'=>'required',
                        'pageValue.person_first_name'=>'required',
                            'pageValue.person_gender'=>'required',
                            'pageValue.person_dob'=>'required',
                            'pageValue.person_phone_no'=>'required'
                    ]);

                    if(isset($this->pageValue['is_store']))
            {
                if($this->pageValue['is_store'] == 1 && !isset($this->pageValue['term']))
                {
                    $rule =array_merge($rule,['pageValue.term'=>[
                        'required']]);
                }
              
            }
                    }
            }else
            {
                $rule = array_merge($rule,[
                    'pageValue.is_business'=>'required'
                ]);
            }
            

            // if($this->pageValue['is_contact_person']=='')
            // {
                 
            //         // $rule =array_merge($rule,[]]);
            //         // $rule,[''=>[
            //         //         'required']],
            //         // $rule,['pageValue.person_gender'=>[
            //         //             'required']],
            //         // $rule,['pageValue.person_dob'=>[
            //         //                 'required']],
            //         // $rule,['pageValue.person_phone_no'=>[
            //         //                     'required']]);
               
            // }
        }
        if ($this->page == 3) {

            if($this->hidden_imgdata == ""){
                 
                // $rule =array_merge($rule,['pageValue.hidden_imgdata'=>[
                //     'required']]);

                    $rule = [
                        'pageValue.hidden_imgdata' => 'required'
                    ];
            
             }
             
        }
       
        return $rule;
    }
    public function messages()  
    {
        return [
            // 'pageValue.firstname.required' => 'first name field required',
            // 'pageValue.lastname.required' => 'last name field required',
            'pageValue.gender.required' => 'gender field required',
            'pageValue.dob.required' => 'dob field required',
            'pageValue.username.required' => 'user name field required',
            'pageValue.email.required' => 'email field required',
            'pageValue.email.email' => 'valid email required',
            'pageValue.phone_number.required' => 'phone number field required',
            'pageValue.phone_number.numeric' => 'only number allowed',
            'pageValue.phone_number.digits' => '10 digit mobile number is required',
            'pageValue.hidden_imgdata.required' => 'Upload document',
            // 'pageValue.hidd_isuser.required' => 'select any of these to continue',
            'pageValue.district.required' =>'district field required',
            'pageValue.municipality.required' =>'municipality field required',
            'pageValue.village.required' =>'village field required',
            'pageValue.address_one.required' =>'address field required',

            'pageValue.business_name.required' =>'business name field required',
            'pageValue.business_reg_number.required' =>'business reg number field required',
            'pageValue.business_tax_no.required' =>'business tax no field required',
            'pageValue.about_company.required' =>'about company field required',
            'pageValue.term.required' =>'terms and condition field required',
            'pageValue.is_business.required'=>'field is required',
            'pageValue.is_contact_person.required'=>'Check any of these',
            'pageValue.person_first_name.required'=>'field is required',
            'pageValue.person_gender.required'=>'field is required',
            'pageValue.person_dob.required'=>'field is required',
            'pageValue.person_phone_no.required'=>'field is required'




        ];  
    }
}
