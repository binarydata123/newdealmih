<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            $rule =  [
                'pageValue.title' => 'required',
                'pageValue.category_id' => 'required',
            ];
            if(isset($this->pageValue['is_sub_category']))
                {
            if($this->pageValue['is_sub_category'] == 1 && $this->pageValue['sub_category'] == '')
                {
                    $rule =array_merge($rule,['pageValue.sub_category'=>[
                        'required']]);
                }
            }

            if(isset($this->pageValue['is_min_sub_category']))
                {
            if($this->pageValue['is_min_sub_category'] == 1 && $this->pageValue['min_sub_category'] == '')
                {
                    $rule =array_merge($rule,['pageValue.min_sub_category'=>[
                        'required']]);
                }
            }

        }
        if ($this->page == 2) {
            // if(isset($this->pageValue['type']))
            // {
            // $rule =[
            //     'pageValue.description' => 'required'
            // //     'pageValue.type' => 'required',
            // //     'pageValue.location' => 'required',
            //  ];
            //  }
            

            // if($this->slug == "jobs")
            // {
            //     $rule =[
                    
            //             'pageValue.description' => 'required'              
            //             ];
            // }

           
            if($this->slug == "property")
            {
                $rule =[
                    
                        'pageValue.location' => 'required',              
                        ];
            }
        


           
        }

        if($this->page == 3)
        {

            if($this->pageValue['mainnewimage'] == 0 )
                {
                    $rule =array_merge($rule,['pageValue.image'=>[
                        'required']]);
                }
            


        }
          
        if($this->page == 4)
        {
            $rule = [
               
                'pageValue.district'=>'required',
                'pageValue.municipality'=>'required',
                'pageValue.village'=>'required',
                // 'pageValue.quantity'=>'required',
                'pageValue.address_one'=>'required',
                'pageValue.seller_first_name'=>'required',
                 'pageValue.seller_phone'=>'required|min:10'
            ];
            if($this->slug == 'market-place' || $this->slug == "car-motor-bike-or-boat" || $this->slug == "property")
            {
                if( $this->pageValue['auction_price'] == '')
                        {
                $rule =array_merge($rule,['pageValue.price'=>[
                'required']]);
            }
            }

             if($this->slug == 'market-place' || $this->slug == "car-motor-bike-or-boat" )
            {
        

                $rule =array_merge($rule,['pageValue.delivery_service'=>[
                'required']]);

                if(isset($this->pageValue['delivery_service'])){

                    if($this->pageValue['delivery_service'] == 'yes')
                        {
                    $rule =array_merge($rule,['pageValue.km_delivery'=>['required']]);

                    $rule =array_merge($rule,['pageValue.delivery_charges'=>['required']]);

                }

                }
                 
           
            }


                    if($this->slug == 'market-place')
            {
                if( $this->pageValue['quantity'] == '')
                        {
            $rule =array_merge($rule,['pageValue.quantity'=>[
                'required']]);
            }
            }
        }
       
        // if(isset($this->pageValue->company_name))
        // {
        //     $rule = [
        //         'pageValue.company_name'=>'required',
        //     ];
        // }
        // if(isset($this->pageValue->company_email))
        // {
        //     $rule = [
        //         'pageValue.company_email'=>'required',
        //     ];
        // }
        return $rule;
    }

    public function messages()
    {   
        return [
            'pageValue.title.required' => 'title field is required',
            'pageValue.category_id.required' => 'category field is required',
            'pageValue.description.required' => 'description field is required',
            'pageValue.type.required' => 'type field is required',
            'pageValue.location.required' => 'Property location is required',
            'pageValue.image.required' => 'image is required',
            'pageValue.image.required' => 'image is required',
            'pageValue.delivery_service.required' => 'Delivery Service image is required',
            'pageValue.km_delivery.required' => 'Delivery location image is required',
            'pageValue.delivery_charges.required' => 'Delivery Charges information is required',




            'pageValue.price.required' => 'price field is required',
            // 'pageValue.auctionfield.required' => 'auctionfield field is required',
            'pageValue.district.required' => 'district field is required',
             'pageValue.municipality.required' => 'municipality field is required',
              'pageValue.village.required' => 'village field is required',
              'pageValue.quantity.required' => 'quantity field is required',


            'pageValue.profile_pic.required' => 'image field is required',
            'pageValue.address_one.required' => 'ward no field is required',
            'pageValue.seller_first_name.required' => 'first name field is required',
            'pageValue.seller_phone.required' => 'phone number field is required',
            'pageValue.seller_phone.min' => 'Enter a valid mobile number',
            'pageValue.sub_category.required' => 'sub category field required',
            'pageValue.min_sub_category.required' => 'sub category field required'


            

            // 'pageValue.company_name.required' => 'Company name number is required',
            // 'pageValue.company_email.required' => 'Company Email ID is required'
           
        ];
    }
}
