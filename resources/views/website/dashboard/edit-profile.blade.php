@extends('website.layout.app')
<link rel="stylesheet" {{-- href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css"> --}} <link
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@section('css')
    <style>
       /* #card_info1{
            display: none;
        }*/
        /* delete button  image  */
        .img-wraps {
            position: relative;
            display: inline-block;

            font-size: 0;
        }

        .img-wraps:hover .closes {
            opacity: 1;
        }

        .img-wraps .closes {
            position: absolute;
            top: -113px;
            right: -1px;
            z-index: 100;
            background-color: #FFF;
            padding: 4px 3px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
            line-height: 3px;
            border-radius: 50%;
            /* border:1px solid red; */
        }


        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #c7c7c7 !important;
            border-radius: 4px;
            height: 40px !important;
            padding-top: 6px !important;
        }
        @media(max-width:390px){
ul#progressbar li {
    font-size: 11px;
}
div#card_info1 h2 {
    font-size: 16px;
}

}


    </style>
@endsection
@section('content')
    <section class="user-form-part">
        <div class="user-form-banner">
            <div class="user-form-content">
                <!-- <a href="#"><img src="images/logow.png" alt="logo"></a>
                                                      <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                                                      <p>Biggest Online Advertising Marketplace in the World.</p> -->
            </div>
        </div>
        <div class="user-form-category">
            <input type="text" class="user_id" value="{{ $user->id }}" hidden>

            <div class="tab-pane active" id="login-tab">

                @if (session()->has('success'))
                    <div class="alert alert-success text-center" style="padding: 10px 0;">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger text-center" style="padding: 10px 0;">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div align="right">


                    <a href="#!" data-toggle="modal" data-target="#help" class="nh">Need help?</a>
                </div>
                
                <div class="user-form-title mb0" align="left">
                    <h4> &nbsp; Edit Account</h4>
                </div>
                <div>
                    <div class="col-md-10 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform" action="{{ url('register/edit', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account">Personal Info</li>
                                    
                                    <li class="fc" id="personal">Verification</li>
                                    <li class="fc" id="payment">Document</li>
                                    <li class="fc" id="confirm-last"></li>
                                    


                                </ul>
                                <br> <!-- fieldsets -->
                                <!------------------->
                                <fieldset>
                                    <div class="form-card" id="card_info1">
                                        <div class="col-6">
                                            <h2 class="fs-title">Personal Info</h2>
                                        </div>
                                        <div class="row ml0">
                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="firstname"
                                                        class="form-control firstname" placeholder="First Name"
                                                        value="{{ $user->firstname }}">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="lastname"
                                                        class="form-control lastname" placeholder="Last Name"
                                                        value="{{ $user->lastname }}">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="username"
                                                        class="form-control username" placeholder="Full Name"
                                                        value="{{ $user->username }}">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="gender" id="" class="form-control gender">
                                                        <option value="">Gender</option>
                                                        <option @if ($user->gender == 'Male') selected @endif
                                                            value="Male">Male</option>
                                                        <option @if ($user->gender == 'Female') selected @endif
                                                            value="Female">Female</option>
                                                        <option @if ($user->gender == 'Other') selected @endif
                                                            value="Other">Other</option>
                                                    </select>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input id="dob" type="text" name="dob"
                                                        class="form-control dob" placeholder="Date of Birth"
                                                        value="@if (isset($user->dob)) {{ $user->dob }} @else 01/01/1920 @endif"
                                                        <?= date('Y-m-d') ?>>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>




                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="email"
                                                        class="form-control email" placeholder="email"
                                                        value="{{ $user->email }}">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="phone_number"
                                                        class="form-control phone_number" placeholder="Phone Number"
                                                        value="{{ $user->phone_number }}">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>


                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><textarea placeholder="Address" name="address" 
                                                        class="form-control ">{{$user->address}}</textarea>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <input type="button" name="next" data-id="1" class="next action-button" value="Next"
                                        style="width: 48%;">
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                        <div class="col-6">
                                            <h2 class="fs-title">Verification Details</h2>
                                        </div>

                                        <div class="col-md-12">
                                            <p>Do you want this account to be used as Business Account:</p>
                                        </div>
                                        <div class="col-lg-7">
                                           
                                            <div class="mtb30 is_businessuser">

                                                <input type="radio" id="age1" name="is_business" value="1"
                                                    @if ($user->is_business == 1) checked @endif
                                                    class="is_business_yes is_bsns_acnt "  @if ($user->is_approve_store == 1) disabled @endif>

                                                <label class="fs" for="age1"> Yes </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="age2" name="is_business" value="2"
                                                    @if ($user->is_business == 2) checked @endif
                                                    class="is_business_no is_bsns_acnt" @if ($user->is_approve_store == 1) disabled @endif>
                                                <label class="fs" for="age2"> No</label>
                                                <span class="is_business-error" style="color: red;"></span>
                                            </div>
                                           
                                        </div>


                                        <div class="row ml0 business_detail"
                                            @if (!isset($user->businessDetails)) style="display: none;" @endif>
                                            <div class="business_store">
                                                <div class="col-md-12">
                                                    <p>Please ckeck if you want the Business Account as a Store:</p>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="mtb30 is_business_store">
                                                        <input type="radio" class="is_store_yes is_store" id="store1"
                                                            name="is_store" value="1"
                                                            @if ($user->is_business == 1) checked @endif
                                                            class="is_store_yes " @if ($user->is_approve_store == 1) disabled @endif>
                                                        <label class="fs" for="store1"> Yes </label>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" id="store2" name="is_store" value="2"
                                                            @if ($user->is_store == 2) checked @endif
                                                            class="is_store_no is_store" @if ($user->is_approve_store == 1) disabled @endif>
                                                        <label class="fs" for="store2"> No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 show-term-condition"
                                                @if ($user->is_business != 1) style="display: none;" @endif>
                                                <div class="form-group">
                                                    <span class="at-checkbox">
                                                        <input style="top:5px;" id="privacy_policy"
                                                            @if ($user->businessDetails) @if ($user->businessDetails->term == 1) checked @endif
                                                            @endif type="checkbox" name="term" value="1"
                                                            class="check-policy term-condition" >
                                                        <span class="error term-hide-error" style="color:red;"></span>

                                                        <label for="at-login" style="font-size: 12px">I have read and agreed
                                                            to the <a target="_blank" href="{{ url('terms') }}"> Terms &
                                                                Conditions </a> and <a target="_blank"
                                                                href="{{ url('privacy') }}" title="Privacy Policy">Privacy
                                                                Policy</a>
                                                        </label>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_name"
                                                        @if ($user->businessDetails) value="{{ $user->businessDetails->business_name }}" @endif
                                                        class="form-control business_name" placeholder="Business Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_reg_number"
                                                        @if ($user->businessDetails) value="{{ $user->businessDetails->business_reg_number }}" @endif
                                                        class="form-control business_reg_number"
                                                        placeholder="Business Registration Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_tax_no"
                                                        @if ($user->businessDetails) value="{{ $user->businessDetails->business_tax_number }}" @endif
                                                        class="form-control business_tax_no"
                                                        placeholder="Business Tax Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <textarea class="form-control about_company mb10xs" name="about_company" type="textarea" placeholder="What type of business you do?">@if($user->businessDetails){{$user->businessDetails->about_company}}@endif</textarea>
                                                <span class="error" style="color: red;"></span>

                                            </div>

                                            <!-- <div class="col-lg-6">
                                               
                                                    <textarea name="about_company" class="form-control about_company" type="textarea" placeholder="What type of business you do?">
                                                        @if ($user->businessDetails) {{ $user->businessDetails->about_company }} @endif
                                                        </textarea>
                                                    <span class="error" style="color:red;"></span>
                                                
                                            </div> -->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="category_id" id="" class="form-control ">
                                                        <option value="">Category</option>
                                                        @if ($marketSubCategories)
                                                            @foreach ($marketSubCategories as $marketSubCategory)
                                                                <option
                                                                    @if ($user->businessDetails) @if ($user->businessDetails->category_id == $marketSubCategory->id) 
                                                                    selected @endif
                                                                    @endif
                                                                    value="{{ $marketSubCategory->id }}">{{ $marketSubCategory->category_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>



                                            <div class="row ml0">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <img id="uploadPreview" class="iresponsive"
                                                            @if ($user->businessDetails) @if (isset($user->businessDetails->company_log))
                                                           src="{{ url('public/media/company-logo/' . $user->businessDetails->company_log) }}" @endif
                                                        @else src="{{ url('public/website/images/us.png') }}"
                                                            @endif />
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input onchange="PreviewImage();" type="file" id="image"
                                                        name="company_log" class="company_logo_file"
                                                        style="display: none;" />

                                                    <div class="form-group"><a href="#"
                                                            class="company_logo fs14 tblu"><u>
                                                                upload
                                                                logo </u>
                                                        </a></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="row ml0">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <img id="uploadPreview-cover" class="iresponsive"
                                                                @if ($user->businessDetails) @if (isset($user->businessDetails->company_cover_pic))
                                                        src="{{ url('public/media/company-cover-pic/' . $user->businessDetails->company_cover_pic) }}" @endif
                                                            @else src="{{ url('public/website/images/us.png') }}"
                                                                @endif />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <input onchange="CoverpreviewImage();" type="file" id="cover-image"
                                                            name="company_cover_pic" class="company_cover_pic_file"
                                                            style="display: none;" />

                                                        <div class="form-group"><a href="#"
                                                                class="company_cover_pic fs14 tblu mt20"><u>
                                                                    upload
                                                                    cover photo </u>
                                                            </a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><input type="file" name="company_log"
                                                       class="form-control " placeholder="ssss"
                                                       >
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="file" name="company_cover_pic"
                                                        class="form-control "
                                                       >
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}
                                        </div>


                                        <div class="col-md-12">
                                            <p class="mb10">Address Details:</p>
                                        </div>

                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control district" name="district"
                                                        data-toggle="select2" data-search="true">
                                                        <option value="">District</option>
                                                        @if ($districts)
                                                            @foreach ($districts as $district)
                                                                <option
                                                                    @if ($user->businessDetails) @if ($user->businessDetails->district_id == $district->district_id) selected @endif
                                                                    @endif value="{{ $district->district_id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="district-error" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control municipality" name="municipality">
                                                        <option value="">Municipality/Nagarpalika</option>
                                                        @if ($user->businessDetails)
                                                            @php
                                                                $muncipalities = App\Models\Municipality::where('district_id', $user->businessDetails->district_id)->get();
                                                            @endphp
                                                            @if ($muncipalities)
                                                                @foreach ($muncipalities as $muncipality)
                                                                    <option
                                                                        @if ($muncipality->municipality_id == $user->businessDetails->mucipality_id) selected @endif
                                                                        value="{{ $muncipality->municipality_id }}">
                                                                        {{ $muncipality->municipality_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </select>
                                                    <span class="municipality-error" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control village" name="village">
                                                        <option value="">Village</option>
                                                        @if ($user->businessDetails)
                                                            @php
                                                                $vallages = App\Models\Village::where('district_id', $user->businessDetails->district_id)->get();
                                                            @endphp
                                                            @if ($vallages)
                                                                @foreach ($vallages as $vallage)
                                                                    <option
                                                                        @if ($vallage->id == $user->businessDetails->village_id) selected @endif
                                                                        value="{{ $vallage->id }}">{{ $vallage->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </select>
                                                    <span class="village-error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 ">
                                                <textarea class="form-control address_one mb10xs" name="address_one" type="textarea" placeholder="Ward No.">@if($user->businessDetails){{$user->businessDetails->address_one}}@endif</textarea>

                                                <span class="error" style="color: red;"></span>

                                            </div>

                                          <!--   <div class="col-lg-6">
                                                <textarea class="form-control" name="address_two" @if ($user->businessDetails) value="{{ $user->businessDetails->address_two }}" @endif
                                                    placeholder="Address line 2"></textarea>
                                            </div> -->

                                        </div>
                                        <div class="col-md-12">
                                            <p class=" business_detail mt20"
                                                @if (!isset($user->contactPerson)) style="display: none;" @endif>Contact
                                                Person details are
                                                same
                                                as personal info</p>
                                        </div>
                                        <div class="col-lg-7 business_detail"
                                            @if (!isset($user->contactPerson)) style="display: none;" @endif>
                                            <div class="mb30">
                                                <input type="radio" id="is_contact_person1" value="1"
                                                    @if ($user->is_contacted_person == 1) checked @endif
                                                    class="personalInfo personalInfoYes hidden_contact_person"
                                                    name="is_contact_person">
                                                <label class="fs" for="is_contact_person1"> Yes </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="is_contact_person2" value="2"
                                                    class="personalInfo personalInfoNo hidden_contact_person"
                                                    @if ($user->is_contacted_person == 2) checked @endif
                                                    name="is_contact_person">
                                                <label class="fs" for="is_contact_person2"> No</label>

                                                <input type="hidden" class="" id="hidden_contact">
                                                <span class="personalinfo-error" style="color:red;"></span>
                                            </div>
                                        </div>


                                        <div class="row ml0 business_detail"
                                            @if (!isset($user->contactPerson)) style="display: none;" @endif>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_first_name"
                                                        @if ($user->contactPerson) value ="{{ $user->contactPerson->first_name }}" @endif
                                                        class="form-control person_first_name" placeholder="Full name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6" @if ($user->is_contacted_person != 1) style="display: none;" @endif>
                                                <div class="form-group"><input type="text" name="person_email"
                                                        @if ($user->contactPerson) value ="{{ $user->contactPerson->email }}" @endif
                                                        class="form-control person_email" placeholder="email">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 person-gender-block"
                                                @if ($user->is_contacted_person != 1) style="display: none;" @endif>
                                                <div class="form-group">
                                                    <select name="person_gender" id="" class="form-control person_gender">
                                                        <option value="">Gender</option>
                                                        <option
                                                            @if ($user->contactPerson) @if ($user->contactPerson->gender == 'Male') selected @endif
                                                            @endif value="Male">Male</option>
                                                        <option
                                                            @if ($user->contactPerson) @if ($user->contactPerson->gender == 'Female') selected @endif
                                                            @endif value="Female">Female</option>
                                                        <option
                                                            @if ($user->contactPerson) @if ($user->contactPerson->gender == 'Other') selected @endif
                                                            @endif value="Other">Other</option>
                                                    </select>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            {{--<div class="col-lg-6 person-email-block"
                                                @if ($user->is_contacted_person == 1) style="display: none;" @endif>
                                                <div class="form-group">

                                                    <input type="text" name="person_email" value=""
                                                        class="form-control person_email" placeholder="Email">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>--}}


                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_dob"
                                                        @if ($user->contactPerson) value="{{ $user->contactPerson->d_o_b }}" @endif
                                                        class="form-control person_dob" placeholder="Date of Birth">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_phone_no"
                                                        @if ($user->contactPerson) value="{{ $user->contactPerson->phone_number }}" @endif
                                                        class="form-control person_phone_no" placeholder="Mobile">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <input type="button" name="next" data-id="2" class="next action-button" value="Next"
                                        style="width: 48%;"><input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 48%;">
                                    {{-- <input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 48%;"> --}}
                                </fieldset>

                                <!---------------------->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row ml0" style="display: block">

                                            <h2 class="fs-title ">Documents</h2>

                                            <div class="confirm_normaluser_doc">
                                                <p>Do you want to verify your Account and Get address verified Batch to your
                                                    profile?:</p>
                                                <div class="col-lg-7">
                                                    <div class="mtb30">
                                                        <input type="radio" id="normal1" name="is_normal" value="1"
                                                            class="is_user">
                                                        <label class="fs" for="normal1"> Yes </label>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" id="normal2" name="is_normal" value="2"
                                                            class="is_user" checked>
                                                        <label class="fs" for="normal2"> No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="business_image mt60">
                                                 <img src="{{url('/images/vv.jpeg')}}" width="20%">
                                            </div>
                                            <input type="hidden" name="hidd_isuser" class="hidd_isuser" value="">
                                            <span class="error" style="color:red;"></span>
                                            
                                            <div class="businessuser_doc">
                                                <ol>
                                                    <li>1. Nepal Citizenship copy or Passport Copy.</li>
                                                    <li>2. Utility Bills like Electricity or Water.</li>
                                                    <li>3. Pan or Vat certificate.</li>
                                                    <li>4. Business registration certificate(optional).</li>
                                                    <li></li>
                                                </ol>
                                            </div>
                                            <div class="normaluser_doc">
                                                <ol>
                                                    <li>1.Nepal Citizenship copy or Passport Copy.</li>
                                                    <li>2.Utility Bills like Electricity or Water.</li>

                                                    <li></li>
                                                </ol>
                                            </div>
                                        </div>
                                        <br>
                                        @if ($user->documents)
                                            @foreach ($user->documents as $document)
                                              <!--   <img src="{{ url('public/media/user-document/' . $document->document) }}" alt=""
                                                    width="100px" height="100px"> -->
                                            @endforeach
                                        @endif





                                        <div class="col-lg-9">
                                            <div class="form-group">

                                                <div class="mt20 gallery-imgs">
                                                    <input id="gallery_image" name="media[]" type="file"
                                                        accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps"
                                                        style="visibility:hidden; display: none;" multiple />
                                                    <input type="hidden" name="hidden_imgupload" class="hidden_imgdata"
                                                        id="hidden_imgdata" value="">
                                                    {{-- <span class="error" style="color:red;"></span> --}}

                                                    <span title="attach file" class="attachFileSpan"
                                                        onclick="document.getElementById('gallery_image').click()">
                                                        <img src="{{ url('public/website/images/surface1.svg') }}">Browse or
                                                        drop file here
                                                    </span>
                                                    <div>Upload PDF, PNG, JPEG</div>
                                                    <div>File size should not exceed more than 10 mb</div>
                                                    <div> </div>
                                                </div>
                                                <span class="upload-docu" style="color: red;"></span>

                                                {{-- <input type="file" class="form-control " id="gallery_image" name="media[]"
                                                    multiple> --}}

                                            </div>
                                            <div class="gallery-image"></div>
                                        </div>

                                    </div>

                                    <br><br><br><br>
                                    <input type="button" name="next" data-id="3" class="next action-button" value="Submit"
                                        style="width: 48%;">
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" style="width: 48%;">
                                </fieldset>


                                {{-- <fieldset>
                                    <div class="form-card">

                                        <div class="col-6">
                                            <h2 class="fs-title">Set Password</h2>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="steps"></h2>
                                        </div>

                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="password"
                                                        class="form-control password" placeholder="Set Password ">
                                                    <span class="error" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="confirm_password"
                                                        class="form-control confirm_password"
                                                        placeholder="Confirm Password">
                                                    <span class="error" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div>



                                        <h2 class="fs-title mb0">Your Password must contain</h2>

                                        <ul>
                                            <li>Atleast 8 character</li>
                                            <li>1 Number,1 Upper Case ,1 Special Character</li>
                                        </ul>

                                    </div>
                                    <input type="button" name="next" data-id="4" class="next action-button" value="Submit"
                                        style="width: 48%;">
                                   
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" style="width: 48%;">
                                </fieldset> --}}

                            </form>
                        </div>
                    </div>
                </div>

                <!------------>
            </div>

        </div>
    </section>
@endsection
@section('js')
    {{-- <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ url('public/website/js/classified/user-edit.js') }}"></script>
    <script>
        $('.district').select2({
            selectOnClose: true
        });
        $('.municipality').select2({
            selectOnClose: true
        });
        $('.village').select2({
            selectOnClose: true
        });

        // $('.dob').datetimepicker({
        //     format: 'YYYY-MM-DD',
        //     // minDate: 1900-01-01,
        //     maxDate:2020-01-01,
        //     useCurrent: false,
        // });

        $(function() {
            $('input[name="dob"]').daterangepicker({
                minDate: 01 / 01 / 2006,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1920,
                maxYear: 2006
            }, function(start, end, label) {
                var years = moment().diff(start, 'years');
                // alert("You are " + years + " years old!");
            });
        });

        // $('.person_dob').datetimepicker({
        //     format: 'YYYY-MM-DD',

        // });
        $(".company_logo").click(function() {
            $("input[class='company_logo_file']").click();
            // PreviewImage();
        });
        $(".company_cover_pic").click(function() {
            $("input[class='company_cover_pic_file']").click();
            // PreviewImage();
        });
        // main image upload
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        function CoverpreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("cover-image").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview-cover").src = oFREvent.target.result;
            };
        };

        $(document).ready(function() {
            $('.hidden_imgdata').val("");
            // $('.hidden_contact_person').val('');
            $('#gallery_image').on('change', function() {
                $('.hidden_imgdata').val(1);
            });


            // var user_confirmation1 = $('input[name=is_normal]:checked').val();
            //         if(user_confirmation1 == 1){
            //              $('.normaluser_doc').show();
            //             $('.gallery-imgs').show();
            //             $('.hidden_imgdata').val("");

            //         }

            //         else {
            //             $('.normaluser_doc').hide();
            //             $('.gallery-imgs').hide();
            //             $('.hidden_imgdata').val(1);



            //         }

            $('.normaluser_doc').hide();
            $('.gallery-imgs').hide();


            $('.next').on('click', function() {

                var business_checked = $(this).data('id');

                if (business_checked == 2) {
                    var is_business = $('input[name="is_business"]:checked').val();


                    if (is_business == 1) {
                        $('.businessuser_doc').show();
                        $('.normaluser_doc').hide();
                        $('.business_image').hide();
                        $('.gallery-imgs').attr('required', 'true');
                        $('.confirm_normaluser_doc').hide();
                        $('.gallery-imgs').show();
                        $('.hidd_isuser').val(1);

                        //     var contact_person_confirm = $('input[name=is_contact_person]:checked').val();
                        // if(contact_person_confirm == ''){
                        //     $('.hidden_contact_person').val("");


                        // }
                        // else{
                        //     $('.hidden_contact_person').val(1);
                        // }


                    } else {
                        $('.businessuser_doc').hide();
                        $('.confirm_normaluser_doc').show();
                        $('.business_image').show();
                        $('.hidd_isuser').val("");
                        $('.upload-docu').html('');
                        $('.hidden_contact_person').val(1);






                    }
                    var user_confirmation2 = $('input[name=is_normal]:checked').val();
                    if (user_confirmation2 == 2 && is_business == 2) {
                        $('.hidden_imgdata').val(1);


                    } else {
                        $('.hidden_imgdata').val('');
                    }

                    // var contact_person_confirm = $('input[name=is_contact_person]:checked').val();
                    // if(contact_person_confirm == '' && is_business==1){
                    //     $('.hidden_contact_person').val("");


                    // }
                    // else{
                    //     $('.hidden_contact_person').val(1);
                    // }




                } else if (business_checked == 1) {

                    var is_business_account = $('input[name="is_business"]:checked').val();


                    if (is_business_account == 1) {

                        $('.business_store').show();
                        $('.business_detail').show();

                    } else {
                        $('.business_store').hide();
                        $('.business_detail').hide();


                    }
                }

                //    if(business_checked==3){
                //    var user_confirmation1 = $('input[name=is_normal]:checked').val();
                //         if(user_confirmation1 == 2){
                //             $('.hidden_imgdata').val(1);


                //         }
                //         else{
                //             $('.hidden_imgdata').val('');
                //         }
                //     }

            });


            $('.is_user').on('click', function() {
                $('.hidd_isuser').val(1);
                var user_confirmation = $('input[name=is_normal]:checked').val();
                if (user_confirmation == 1) {
                    $('#gallery_image').attr('required', 'required');
                    $('.normaluser_doc').show();
                    $('.business_image').hide();
                    $('.gallery-imgs').show();
                    $('.hidden_imgdata').val("");
                    $('.upload-docu').html('');


                } else {
                    $('.normaluser_doc').hide();
                    $('.business_image').show();
                    $('.gallery-imgs').hide();
                    $('.hidden_imgdata').val(1);
                    $('.upload-docu').html('');




                }
            });



            $('.hidden_contact_person').on('click', function() {
                var is_contact_person_check = $('input[name=is_contact_person]:checked').val();
                if (is_contact_person_check == 1) {
                    $('.person-email-block').hide();
                    $('.person-gender-block').show();


                } else {
                    $('.person-email-block').show();
                    $('.person-gender-block').hide();

                }
            });







            $('.is_bsns_acnt').on('click', function() {

                var store_confirmation = $('input[name=is_business]:checked').val();
                if (store_confirmation == 1) {
                    $('.business_store').show();
                } else {
                    $('.business_store').hide();
                    $('.hidd_isuser').val("");


                }
            });

            $('.is_store').on('click', function() {
                var value = $(this).val();
                $('.show-term-condition').hide();

                if (value == 1) {
                    $('.show-term-condition').show();
                }
            });

            $('.personalInfo').on('click', function() {
                // $('.hidden_contact_person').val(1);
                $('.personalinfo-error').hide();


            });

        });
    </script>
    <script type="text/javascript">
        $("#account-info").click(function(){
        $("#card_info1").toggle();
    });
    </script>
@endsection

