@extends('website.layout.app')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@section('css')
    <style>
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
            top: -100px;
    right: 5px;
    z-index: 100;
    background-color: #020202;
    padding: 6px 3px;
    color: #fff;
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

    </style>
@endsection
@section('content')
    <section class="user-form-part">
        <div class="user-form-banner" style="background: url(../../website/images/dea/signup.png);height: 100vh;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    z-index: 1;">
            <div class="user-form-content">
                <!-- <a href="#"><img src="images/logow.png" alt="logo"></a>
                                      <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
                                      <p>Biggest Online Advertising Marketplace in the World.</p> -->
            </div>
        </div>
        <div class="user-form-category">


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
                 <span class="stxt">   Already have account ? <a href="{{ url('login') }}"><u>Login</u> </a> </span>

                    <a href="#!" class="nh">Need help?</a>
                </div>
                <div class="user-form-title mb0" align="left">
                    <h4> &nbsp; Create Account</h4>
                </div>
                <div>
                    <div class="col-md-10 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform" action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account">Personal Info</li>
                                    <li class="fc" id="personal">Business Details</li>
                                    <li class="fc" id="payment">Document</li>
                                    <li class="fc" id="confirm">Set Password</li>
                                </ul>
                                <br> <!-- fieldsets -->

                                <!------------------->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="col-6">
                                            <h2 class="fs-title">Personal Info</h2>
                                        </div>
                                        <div class="row ml0">
                                            {{-- <div class="col-lg-8">
                                                <div class="form-group"><input type="text" name="firstname"
                                                        class="form-control firstname" placeholder="First Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="lastname"
                                                        class="form-control lastname" placeholder="Last Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="gender" id="" class="form-control gender fs122">
                                                        <option value="">Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="dob"
                                                        class="form-control dob" placeholder="Date of Birth">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-8">
                                                <div class="form-group"><input type="text" name="username"
                                                        class="form-control username" placeholder="user name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-group"><input type="text" name="email"
                                                        class="form-control email" placeholder="email">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-group"><input type="text" name="phone_number"
                                                        class="form-control phone_number" placeholder="Phone Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>


                                            {{-- <div class="col-lg-6">
                                                <div class="form-group"><textarea placeholder="Address" name="address"
                                                        class="form-control "></textarea>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    

                                    <input type="button" name="next" data-id="1" class="next action-button" value="Next"
                                        style="width: 47%;">
                                   

                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                        <div class="col-lg-8">
                                            <h2 class="fs-title">Business Details</h2>
                                            <p class="regp">if you want this account to be used as Business Account:</p>
                                        </div>
                                       
                                        <div class="col-lg-8">
                                            <div class="mtb20">
                                                <input type="radio" id="age1" name="is_business" value="1" class="is_business_yes">
                                                <label class="fs" for="age1"> Yes </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="age2" name="is_business" value="2" class="is_business_no">
                                                <label class="fs" for="age2"> No</label>
                                            </div>
                                        </div>
                                        <div class="row ml0 business_detail" style="display: none;">
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_name"
                                                        class="form-control " placeholder="Business Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_reg_number"
                                                        class="form-control " placeholder="Business Registration Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="business_tax_no"
                                                        class="form-control " placeholder="Business Tax Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="row ml0">
                                        <div class="col-lg-12">
                                        <p class="regtitle mb20">Address Details:</p>
    </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control district fs122" name="district"
                                                        data-toggle="select2" data-search="true">
                                                        <option value="">District</option>
                                                        @if ($districts)
                                                            @foreach ($districts as $district)
                                                                <option value="{{ $district->district_id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control municipality fs122" name="municipality">
                                                        <option value="">Muncipality/Nagarpalika</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="pincode"
                                                        class="form-control " placeholder="Pincode">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <textarea class="form-control address_one" name="address_one"
                                                    placeholder="Address line 1"></textarea>
                                                <span class="error" style="color: red;"></span>

                                            </div>

                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="address_two"
                                                    placeholder="Address line 2"></textarea>
                                            </div>

                                        </div>
                                       
                                        <div class="col-lg-9 business_detail" style="display: none;">
                                        <p class=" business_detail regtitle mt20" style="display: none;">Contact Person details are same as personal info</p>
                                            <div class="mtb20">
                                                <input type="radio" id="is_contact_person1" class="personalInfoYes"
                                                    name="is_contact_person" value="1">
                                                <label class="fs" for="is_contact_person1"> Yes </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="is_contact_person2" class="personalInfoNo"
                                                    name="is_contact_person" value="2">
                                                <label class="fs" for="is_contact_person2"> No</label>
                                            </div>
                                        </div>
                                        <div class="row ml0 business_detail" style="display: none;">
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_first_name"
                                                        class="form-control person_first_name" placeholder="First Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_last_name"
                                                        class="form-control person_last_name" placeholder="Last Name">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="person_gender" id="" class="form-control person_gender fs122">
                                                        <option value="">Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_dob"
                                                        class="form-control person_dob" placeholder="Date of Birth">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="person_phone_no"
                                                        class="form-control person_phone_no" placeholder="Phone Number">
                                                    <span class="error" style="color:red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="button" name="next" data-id="2" class="next action-button" value="Next"
                                        style="width: 49%;"><input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 49%;">
                                    {{-- <input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 49%;"> --}}
                                </fieldset>

                                <!---------------------->
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row ml0">

                                            <h2 class="fs-title ">Documents</h2>

                                            <ol>
                                                <li>1.Upload your KYC document to verify user</li>
                                                <li>2.Upload your tax and Firm Documents in case of Business Account</li>
                                                <li>3.Upload your logo and Brand Document</li>
                                                <li>4.These documents help to feature product and verify user in case of
                                                    Business Account</li>
                                            </ol>
                                        </div>



                                        <div class="col-lg-9">
                                            <div class="form-group" align="center">
                                                <input type="file" class="form-control bgl" id="gallery_image" name="media[]"
                                                    multiple>

                                            </div>
                                            <div class="gallery-image"></div>
                                        </div>

                                    </div>

                                    <br><br><br><br>
                                    <input type="button" name="next" data-id="3" class="next action-button" value="Next"
                                        style="width: 49%;">
                                        <input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 49%;">
                                </fieldset>


                                <fieldset>
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

                                           
                                        </div>

                                        <div class="row ml0">
                                        <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="confirm_password"
                                                        class="form-control confirm_password" placeholder="Confirm Password">
                                                    <span class="error" style="color: red;"></span>
                                                </div>
                                            </div>
                                    </div>


                                    <div class="row ml0">
                                    <div class="col-lg-12">
                                        <h2 class="fs14o mb0">Your Password must contain</h2>
                                    </div>
                                    </div>

                                    <div class="row ml0">
                                    <div class="col-lg-12">

                                        <ul>
                                            <li class="fs122 dcolor">&#9679; Atleast 8 character</li>
                                            <li class="fs122 dcolor">&#9679; 1 Number,1 Upper Case ,1 Special Character</li>
                                        </ul>
                                    </div>
                                    </div>

                                        <div class="col-lg-12">
                                             <div class="form-group">
                                                <ul class="form-check-list">
                                                  
                                                   <li class="mb10"><input type="checkbox">&nbsp; <label for="fix-check" class="form-check-text tnc"> I accept Terms and Conditions</label></li>
                                                  
                                                  
                                                </ul>
                                             </div>
                                          </div>

                                    </div>
                                    <input type="button" name="next" data-id="4" class="next action-button" value="Submit"
                                    style="width: 49%;">
                                    {{-- <input type="submit" name="next" class="next action-button" style="width: 49%;"> --}}
                                    <input
                                        type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" style="width: 49%;">
                                </fieldset>

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
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ url('public/website/js/classified/user.js') }}"></script>
    <script>
        $('.district').select2({
            selectOnClose: true
        });
        $('.municipality').select2({
            selectOnClose: true
        });
        $('.dob').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('.person_dob').datetimepicker({
            format: 'YYYY-MM-DD',

        });
    </script>
@endsection
