@extends('website.layout.app')
<link rel="stylesheet" href="{{ url('public/website/css/custom/create.css') }}">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
{{-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3,libraries=places&key=AIzaSyDjXuFOT1UaWqtZWU7ZJ6Artc8Q-LPZ1bw"></script> --}}


@section('css')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<style type="text/css">
    .error {
        font-size: 11px;
        margin-top: 4px;
        display: inline-block;
    }

    .municipality_error {
        font-size: 11px;
        margin-top: 4px;
        display: inline-block;
    }

    .district_error {
        font-size: 11px;
        margin-top: 4px;
        display: inline-block;
    }

    .quantity_error {
        font-size: 11px;
        margin-top: 4px;
        display: inline-block;
    }

    .village_error {
        font-size: 11px;
        margin-top: 4px;
        display: inline-block;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    #msform .action-button1 {
        width: 100px;
        background: #698bf5;
        font-weight: 400;
        color: white;
        border: 0 none;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 5px;
        margin: 10px 0px 10px 5px;
        font-size: 14px;
        min-width: 166px;
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
        <!-- <div class="user-form-header"><a href="#"><img src="{{ url('public/website/images/logo.png') }}" alt="logo"></a><a
                            href="{{ url('header-category') }}"><i class="fas fa-arrow-left"></i></a></div> -->

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
                <h4><a href="{{url('header-category')}}" class="tblack"><i class="fas fa-arrow-left"></i> &nbsp; List an Item</a></h4>

            </div>



            <div>
                <div class="col-md-10 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pb-0 mb-3">
                        <form id="msform" action="{{ url('create/product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" value="{{$slug}}" hidden class="slug" name="slug" id="">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account">Title &amp; category</li>
                                <li class="fc" id="personal"> Features </li>
                                @if ($slug != 'jobs')
                                <li class="fc" id="payment">Photos</li>
                                @endif
                                @if ($slug == 'jobs')
                                <li class="fc" id="jobThree">Company Details</li>
                                <li class="fc" id="confirm-last"></li>
                                @else
                                <li class="fc" id="confirm">Price &amp; Payment</li>
                                @endif
                            </ul>
                            <br> <!-- fieldsets -->

                            <!------------------->
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-6">
                                        <h2 class="fs-title">What are you listing?</h2>
                                    </div>
                                    <div class="col-6">
                                        <h2 class="steps"></h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group"><input type="text" name="title" class="form-control title" placeholder="Title">
                                            <span class="error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <select class="form-control category" name="category_id">

                                                <option value="">Select Category</option>
                                                @if ($categories)
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ ucwords($category->category_name) }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>

                                            <span class="error" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <input type="text" hidden name="is_sub_category" class="sub-category-check" id="">
                                    <div class="col-lg-6 sub-category-hide" style="display: none">
                                        <div class="form-group">

                                            <select class="form-control sub-category" name="sub_category" product-id="">

                                                <option value="">Select Sub Category</option>

                                            </select>

                                            <span class="error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <input type="text" hidden name="is_min_sub_category" class="min-sub-category-check" id="">
                                    <div class="col-lg-6 min-sub-category-hide" style="display: none">
                                        <div class="form-group">

                                            <select class="form-control min-sub-category" name="min_sub_category" product-id="">

                                                <option value="">Select Sub Category</option>

                                            </select>

                                            <span class="error" style="color:red;"></span>
                                        </div>
                                    </div>


                                    {{-- @php
                                            $number = 100;
                                        @endphp
                                        @for ($i = 0; $i < $number; $i++)
                                            <div class="sub-category-list{{ $i }} sub-category-list">
                                </div>
                                @endfor --}}
                                <!--  <div class="col-lg-6 land-area-hide" style="display: none">
                                            <div class="form-group">
                                                <select class="form-control land-area" name="land_area">
                                                    <option value="">Select Land Area</option>
                                                    <option value="aana">Aana</option>
                                                    <option value="dhur">Dhur</option>
                                                    <option value="kattha">Kattha</option>
                                                    <option value="bigha">Bigha</option>
                                                    <option value="ropani">Ropani</option>
                                                    <option value="paisa">Paisa</option>
                                                    <option value="dam">Dam</option>
                                                </select>
                                                <span class="error" style="color:red;"></span>
                                            </div>
                                        </div> -->
                    </div>
                    <input type="button" name="next" data-id="1" class="next action-button" value="Next" style="width: 48%;">
                    <input type="button" class=" action-button-previous" value="Previous" style="width: 48%;">
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="col-lg-12" style=" list-style-type:none;">
                                <textarea class="form-control description @if($slug == " jobs") job-ckeditor @endif" name="description" placeholder="Description" style="height: 100px;" required></textarea>
                                <span class="error" style="color:red;"></span>
                            </div>
                            <br>


                            @if($slug == "market-place" || $slug == "car-motor-bike-or-boat" || $slug == "property")
                            <div class="row ml0 type-new-used">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="mb10 mt20">Type</p>
                                        <input type="radio" id="type1" name="type" checked value="2">
                                        <label for="type1">
                                            <p>New</p>
                                        </label>

                                        <input type="radio" id="type2" name="type" value="1">
                                        <label for="type2">
                                            <p>Used</p>
                                        </label>
                                        <span class="error" style="color:red;"></span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12"> 
                                        <div class="mtb30">
                                      <p class="mb20">Condition</p> 
                                        <input type="radio" id="age1" name="age" value="30" checked="">
                                        <label for="age1"><p> Brand new ddddunused item</p></label>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="age2" name="age" value="60">
                                        <label for="age2"> <p>used item</p></label> 
                                     </div>
                                     </div> --}}


                            @endif

                            @if ($slug == 'property')
                            @include('website.product.property-default-feature', ['products' => array()])
                            @endif

                            @if ($slug == "jobs")
                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control salary_scal" name="salary_scal">
                                            <option value="">Select Salary</option>
                                            <option value="10000">10000 below</option>
                                            <option value="20000">20000 +</option>
                                            <option value="30000">30000 +</option>
                                            <option value="40000">40000 +</option>
                                            <option value="50000">50000 +</option>
                                            <option value="60000">60000 +</option>
                                            <option value="70000">70000 +</option>
                                            <option value="80000">80000 +</option>
                                            <option value="90000">90000 +</option>
                                            <option value="100000">100000 +</option>
                                        </select>
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>




                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control job_type" name="job_type">
                                            <option value="">Job Type</option>
                                            <option value="1">Full Time</option>
                                            <option value="2">Part Time</option>
                                            <option value="3">Work From Home </option>
                                        </select>
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control duration" name="duration">
                                            <option value="">Duration</option>
                                            <option value="1">Permanent</option>
                                            <option value="2">Temporary</option>
                                            <option value="3">Contract </option>

                                        </select>
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control pay_type" name="pay_type">
                                            <option value="">Pay Type</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Annual</option>


                                        </select>
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- @if($slug == 'market-place')
                                        
                                        <p class="mb10 mt20">Type</p> 
                                        <input type="radio" id="type1" name="type" value="1"  >
                                        <label for="type1"><p> Brand new unused item</p></label>
                                         <input type="radio" id="type2" name="type" value="2">
                                        <label for="type2"> <p>used item</p></label> 
                                @endif --}}
                            @if ($slug == "services")
                            <div class="col-lg-12">
                                <textarea class="form-control service_about" name="service_about" placeholder="About (optional)" style="height: 75px;"></textarea>
                                <span class="error" style="color:red;"></span>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <textarea class="form-control service_offered" name="service_offered" placeholder="Service Offered (optional)" style="height: 75px;"></textarea>
                                <span class="error" style="color:red;"></span>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <textarea class="form-control area_service mb10xs" name="area_service" placeholder="Area Services" style="height: 75px;"></textarea>
                                <span class="error" style="color:red;"></span>
                            </div>


                            {{-- <div class="row ml0">
                                            <div class="col-lg-12">
                                                <p class="mb10 mt20">Availability</p>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="form-group">
                                                        <select class="form-control salary_scal" name="start_day ">
                                                            <option value="">Start</option>
                                                            <option value="1">Sunday</option>
                                                            <option value="2">Monday</option>
                                                            <option value="3">Tuesday</option>
                                                            <option value="4">Wednesday</option>
                                                            <option value="5">Thursday</option>
                                                            <option value="6">Friday</option>
                                                            <option value="7">saturday</option>
                                                          
                                                        </select>
                                                    <span class="error" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                        <select class="form-control salary_scal" name="start_day ">
                                                            <option value="">End</option>
                                                            <option value="1">Sunday</option>
                                                            <option value="2">Monday</option>
                                                            <option value="3">Tuesday</option>
                                                            <option value="4">Wednesday</option>
                                                            <option value="5">Thursday</option>
                                                            <option value="6">Friday</option>
                                                            <option value="7">saturday</option>
                                                          
                                                        </select>
                                                    <span class="error" style="color: red;"></span>
                                                </div>
                                            </div>
                                        </div> --}}

                            <div class="row ml0 mt-4">

                                <div class="col-lg-6">
                                    <div class="form-group timepicker" twelvehour="true">

                                        <input id="timedemo" type="text" class="form-control" placeholder="Example: 09:00 A.M to 05.00 PM" Width="130px" name="availability_timing" />

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" name="company_email" class="form-control company_email" placeholder="Company Email ID">
                                        <span class="error" style="color: red;"></span>

                                    </div>
                                </div>
                            </div>

                            @endif
                            <div class="row ml0 feature-data-result">

                            </div>

                            <div class="feature-data-model-result">

                            </div>
                        </div>



                        <input type="button" name="next" data-id="2" class="next action-button" value="Next" style="width: 48%;"><input type="button" name="previous" class="previous action-button-previous" value="Previous" style="width: 48%;">
                    </fieldset>
                    <!---------------------->
                    @if ($slug != 'jobs')
                    <fieldset>
                        <div class="form-card">
                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <h2 class="fs-title">Main Image</h2>
                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">

                                    {{-- <input type="file" class="form-control ldash" name="image"
                                                        id="profile_file"> --}}
                                    <input id="main_image" class="main_image" onchange="mainImage();" name="image" type="file" style="visibility:hidden; display: none;" />
                                    <input type="hidden" value="0" name="mainnewimage" class="hidden_imgdata" id="hidden_imgdata" value="">
                                    <span class="error" style="color:red;"></span>
                                    <span title="attach file" class="attachFileSpan click-image">
                                        <img src="{{url('public/website/images/surface1.svg')}}"> Upload Images/Photos
                                    </span>
                                    {{-- <textarea class="form-control"
                                                    placeholder="Browse or drag and drop photos here"></textarea> --}}
                                     <span class="maine_image_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Image is required</span>

                                </div>
                                <img class="profile_pic " style="display: none;" name="profile_pic" id="profile_pic" height="100" width="100" />
                                <input type="button" name="Upload" class="upload action-button1" value="Upload Images/Photos" style="width: 40%;" id="click-image">
                                <!-- <span>Image size should not exceed more than 10 mb</span> -->
                            </div>

                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <h2 class="fs-title">Multiple Image</h2>

                                </div>

                            </div>
                            <div class="col-lg-9">
                                {{-- <div class="gallery-image"></div> --}}

                                <div class="form-group">
                                    <div class="gallery-image"></div>

                                    <input id="gallery_image" name="media[]" type="file" style="visibility:hidden; display: none;" multiple />
                                    <input type="hidden" name="hidden_imgupload" class="hidden_imgdata" id="hidden_imgdata" value="0">
                                    {{-- <span class="error" style="color:red;"></span> --}}
                                    <span title="attach file" class="attachFileSpan" onclick="document.getElementById('gallery_image').click()">
                                        <img src="{{url('public/website/images/surface1.svg')}}"> Upload Images/Photos
                                    </span>
                                    {{-- <textarea class="form-control"
                                                    placeholder="Browse or drag and drop photos here"></textarea> --}}
                                <span class="maine_image_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Image is required</span>
                    
                                </div>
                                <!-- <span>Image size should not exceed more than 10 mb</span> -->
                                <p id="image_error" style="color: #ff0000;"></p>

                                <input type="button" name="Upload" class="upload action-button1" value="Upload Images/Photos" style="width: 40%;" onclick="document.getElementById('gallery_image').click()">

                            </div>
                            {{-- <div class="col-lg-9">
                                                <a href="#!"><u>Photo Privacy and Guidelines</u> </a>
                                            </div> --}}
                        </div>

                        <br><br><br><br>
                        <input type="button" name="next" data-id="3" class="next action-button" value="Next" style="width: 48%;"><input type="button" name="previous" class="previous action-button-previous" value="Previous" style="width: 48%;">
                    </fieldset>

                    @endif
                    <fieldset>
                        <div class="form-card">

                            <div class="col-6">
                                <h2 class="fs-title">
                                    @if ($slug != 'jobs' && $slug != 'services') Price and Payment
                                    @elseif($slug == 'services') Service Location
                                    @else Company Details @endif</h2>
                            </div>
                            <div class="col-6">
                                <h2 class="steps"></h2>
                            </div>


                            @if ($slug != 'jobs' && $slug != 'services')
                            <div class="row ml0 ">
                                <div class="col-lg-6 rent_per_month" id="div_rent_per_month">
                                    <div class="form-group"><input type="number" name="price" class="form-control price" placeholder="Buy Now Price" id="txtprice">
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>



                                <div class="col-lg-6 auction_price" id="div_auction_price">
                                    <div class="form-group"><input type="number" name="auction_price" class="form-control price auction_price" placeholder="Auction Start price (optional)">
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>


                                <div class="col-lg-6 auction_date auction_price" style="display: none;">
                                    <div class="form-group"><input type="text" name="auction_end_date" class="form-control  auction_end_date" placeholder="Auction End Date">
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 auction_price">
                                <p>Do you wish to run an auction without the buy now option ?</p>
                            </div>
                            <div class="col-lg-7 auction_price">
                                <div class=" is_buynow_option" style="margin-bottom: 10px">
                                    <input type="radio" id="buynow1" name="is_buynow" value="1" class="is_buynow_yes is_buynow">
                                    <label class="fs" for="store1"> Yes </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="buynow2" name="is_buynow" value="2" class="is_buynow_no is_buynow">
                                    <label class="fs" for="store2"> No</label>
                                </div>
                            </div>
                            @endif
                            @if ($slug == "market-place" || $slug == "car-motor-bike-or-boat")
                            <div class="col-lg-7">
                                <div class="mtb30">
                                    <h2 class="fs-title mb0">Seller Location</h2>
                                    <input type="radio" id="age1" name="pick_up" value="1" checked="">
                                    <label class="fs" for="age1"> Pickup from seller </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="age2" name="pick_up" value="2">
                                    <label class="fs" for="age2"> Pickup from store </label>
                                </div>
                            </div>
                            @endif


                            @if ($slug == 'jobs')

                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" name="company_name" class="form-control company_name" placeholder="Company Name">
                                        <span class="error" style="color: red;"></span>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="email" name="company_email" class="form-control company_email" placeholder="Company Email ID">
                                        <span class="error" style="color: red;"></span>

                                    </div>
                                </div>
                            </div>

                            @endif


                            @if ($slug == 'services')

                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" name="company_name" class="form-control company_name" placeholder="Business name">
                                        <span class="error" style="color: red;"></span>

                                    </div>
                                </div>

                            </div>

                            @endif

                            <div class="form-card">
                                <div class="col-6">
                                    <h2 class="fs-title">Location</h2>
                                </div>
                            </div>

                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control district" name="district" data-toggle="select2" data-search="true">
                                            <option selected disabled>District</option>
                                            @if ($districts)
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->district_id }}">
                                                {{ $district->district_name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <!--  <span class="error" style="color: red;"></span> -->

                                        <span class="district_error" style="color:red;display: none;">district field is required</span>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control municipality" name="municipality">
                                            <option value="">Municipality/Nagarpalika</option>
                                            @if(isset($userDetail))
                                            @if(count($muncipalities) > 0)
                                            @foreach($muncipalities as $muncipality)
                                            <option value="{{$muncipality->municipality_id}}">{{$muncipality->municipality_name}}</option>
                                            @endforeach
                                            @endif
                                            @endif
                                        </select>
                                        <!-- <span class="error" style="color: red;"></span> -->
                                        <span class="municipality_error" style="color:red;display: none;">municipality field is required</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml0">

                            </div>


                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control village" name="village">
                                            <option value="">Village</option>


                                        </select>
                                        <!--  <span class="error" style="color: red;"></span> -->
                                        <span class="village_error" style="color:red;display: none;">village field is required</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb10xs">
                                    <!-- 
                                                <input class="form-control address_one" type="text" name="address_one" placeholder="Ward No."value="@if($user->businessDetails){{$user->businessDetails->address_one}}@endif"> -->

                                    <input class="form-control address_one" type="text" name="address_one" placeholder="Ward No." value="">


                                    <span class="error" style="color: red;"></span>

                                </div>


                                <!-- <div class="col-lg-6">
                                                <textarea class="form-control" name="address_two"
                                                    placeholder="Address line 2">@if($user->businessDetails) {{$user->businessDetails->address_two}} @endif</textarea>
                                            </div> -->
                            </div>
                            @if ($slug != 'jobs' && $slug != 'services' && $slug != 'property')
                            <div class="col-lg-6">
                                <br>
                                <p class=" business_detail"> Do you Provide delivery service</p>
                                <input type="radio" class="delivery_service" name="delivery_service" value="yes" onclick="show1();" />
                                Yes
                                <input type="radio" class="delivery_service" name="delivery_service" value="no" onclick="show2();" />
                                No
                                <span class="delivery_service_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Delivery field is required</span>
                                <span class="delivery_service" style="color: red;"></span>
                            </div>

                            <!--     <div class="col-lg-6">
                                                <br>
                                                <p class=" business_detail"> Included the delivery charges if any.</p>
                                                <input type="radio" class="delivery_service" name="delivery_service" value="yes" onclick="show1();" />
                                                Yes
                                                <input type="radio" class="delivery_service" name="delivery_service" value="no" onclick="show2();" />
                                                No
                                                 <span class="delivery_service_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Delivery field is required</span>
                                           <span class="delivery_service" style="color: red;"></span>
                                             </div> -->

                            <div class="" style="display: none;" id="div1">
                                <div class="row ml0 align-items-center">
                                    <div class="col-12">
                                        <h2 class="fs-title">Set delivery location</h2>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <fieldset class="ug">
                                                <select class="form-control b0 km_delivery" name="km_delivery[]" multiple="multiple">
                                                    {{-- <option value="">Kilometers for delivery</option> --}}
                                                    @if($districts)
                                                    @foreach ($districts as $district)
                                                    <option value="{{$district->district_id}}">{{ucwords($district->district_name)}}</option>
                                                    @endforeach
                                                    @endif
                                                    {{-- @php
                                                                $columns = 100;
                                                            @endphp
                                                            @for ($k = 0; $k < $columns; $k++)
                                                                <option value="{{ $k + 1 }}">{{ $k + 1 }}Km
                                                    </option>

                                                    @endfor --}}
                                                </select>
                                            </fieldset>
                                            <span class="km_delivery_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Delivery location is required</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <ul class="form-check-list">
                                                <li class="mb10"><input type="checkbox" name="delivery">&nbsp; <label for="fix-check" class="form-check-text"> Delivery all over
                                                        Nepal</label></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <br>

                                    <h2 class="fs-title" style="margin-bottom:0px">Delivery Charges informationn</h2>
                                    <div class="form-check">
                                        <input type="radio" id="flexRadioDefault1" class="delivery_charges" name="delivery_charges" value="1" style="margin-left: -1.25rem;" />
                                        <label class="form-check-label fs" for="flexRadioDefault1">Include delivery charges if any</label>

                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="flexRadioDefault2" class="delivery_charges" name="delivery_charges" value="0" style="margin-left: -1.25rem;" />
                                        <label class="form-check-label fs" for="flexRadioDefault2"> Delivery charges are extra depends on location</label>
                                    </div>
                                    <span class="delivery_charges_error" style="color:red;display: none;font-size: 11px;margin-top: 4px;">Delivery Charges information field is required</span>
                                </div>

                            </div>



                            @endif
                            <div class="col-lg-6">
                                <h2 class="fs-title mb0">
                                    @if ($slug != 'jobs' && $slug != 'services') Contact Information
                                    @elseif($slug == 'services') Service Provider Information @endif </h2>
                            </div>

                            <div class="row ml0 mt20">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <img id="uploadPreview" class="iresponsive" src="{{ url('public/website/images/us.png') }}" />
                                        <!-- @if(!empty(Auth::user()->avatar))

                                                    <img id="uploadPreview" class="iresponsive"
                                                        src="{{url('public/media/avatar/'.Auth::user()->avatar)}}" />

                                                    @else  -->

                                        <!-- @endif -->
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <input onchange="PreviewImage();" type="file" id="image" name="seller_image" class="my_file" style="display: none;" />

                                    <div class="form-group"><a class="seller_image_file fs14 tblu mt60"><u>
                                                upload @if ($slug =='jobs')
                                                Logo @else
                                                photo @endif</u>
                                        </a></div>
                                </div>
                            </div>


                            <input type="hidden" name="hidd_name" class="hidd_name" value="{{Auth::user()->username}}">
                            <input type="hidden" name="hidd_phone" class="hidd_phone" value="{{Auth::user()->phone_number}}">

                            <div class="col-md-12">
                                @if ($slug != 'jobs' && $slug != 'services')
                                <p class=" business_detail mt20" @if(!isset($user->username)) style="display: none;" @endif >Seller details are same as profile details.</p>
                                @elseif ($slug == 'services')
                                <p class=" business_detail mt20" @if(!isset($user->username)) style="display: none;" @endif >Service provider details are same as profile details.</p>
                                @else
                                <p class=" business_detail mt20" @if(!isset($user->username)) style="display: none;" @endif >Advertiser details are same as profile details.</p>
                                @endif
                            </div>
                            <div class="col-lg-7 business_detail" @if(!isset($user->username)) style="display: none;" @endif>
                                <div class="mb30">
                                    <input type="radio" id="is_contact_person1" value="1" checked class="personalInfo personalInfoYes hidden_contact_person" name="is_contact_person">
                                    <label class="fs" for="is_contact_person1"> Yes </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" id="is_contact_person2" value="2" class="personalInfo personalInfoNo hidden_contact_person" name="is_contact_person">
                                    <label class="fs" for="is_contact_person2"> No</label>

                                    <input type="hidden" class="" id="hidden_contact">
                                    <span class="personalinfo-error" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <h2 class="fs-title">
                                    @if ($slug == 'jobs') Contact Person @endif</h2>
                            </div>
                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" name="seller_first_name" class="form-control seller_first_name" placeholder="Full Name" value="{{Auth::user()->username}}">
                                        <span class="error" style="color: red;"></span>

                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="seller_last_name"
                                                        class="form-control seller_last_name" placeholder="Last Name" >
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>  -->
                            </div>
                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group"><input type="text" name="seller_phone" class="form-control seller_phone" placeholder="Phone Number" value="{{Auth::user()->phone_number}}">
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>
                            </div>
                            @if($slug == "market-place")
                            <div class="col-lg-6">

                                <h2 class="fs-title mb0">More Options</h2>
                                <p>Add a Quantity to this listing</p><br>
                            </div>


                            <div class="row ml0">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control quantity" name="quantity">

                                            <option selected disabled>Select Quantity</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                        <!-- <span class="quantity_error" style="color:red;display: none;">quantity field is required</span> -->
                                        <span class="error" style="color: red;"></span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6">
                                                    <div class="form-group"><a href="#!"><u>Learn more about
                                                                Quantity</u>
                                                        </a></div>
                                                </div> --}}
                            </div>
                            {{-- <div class="col-lg-10">
                                                <div class="form-group">
                                                    <ul class="form-check-list">

                                                        <li class="mb10"><input type="checkbox">&nbsp; <label
                                                                for="fix-check" class="form-check-text fs14o"> Only allow
                                                                bids
                                                                from
                                                                authenticated users</label></li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                            @endif
                        </div>

                        <input type="button" name="next" data-id="4" class="next action-button" style="width: 48%;" value="Submit"><input type="button" name="previous" class="previous action-button-previous" value="Previous" style="width: 48%;">
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
<script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
<script src="{{ url('public/website/js/classified/product.js') }}"></script>

<script src="https://maps.google.com/maps/api/js?key={{
env('GOOGLE_MAPS_API_KEY')
}}&libraries=places&callback=initialize" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

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
    // $('.quantity').select2({
    //     selectOnClose: true
    // });


    $('.km_delivery').select2({
        selectOnClose: true
    });
    $('.auction_end_date').datetimepicker({
        format: 'YYYY-MM-DD',

    });

    var allEditors = document.querySelectorAll('.job-ckeditor');
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(
            allEditors[i], {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
                toolbar: {
                    items: ['heading', '|', 'bold', 'italic', 'undo', 'redo',
                        'link', 'insertTable',
                        'bulletedList', 'numberedList', '|', 'blockQuote'
                    ],
                    shouldNotGroupWhenFull: true
                },
            },
        );
    }


    function initialize() {

        const locationInputs = document.getElementsByClassName("map-input");

        const autocompletes = [];
        const geocoder = new google.maps.Geocoder();
        for (let i = 0; i < locationInputs.length; i++) {
            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");
            const isEdit =
                document.getElementById(fieldKey + "-latitude").value != "" &&
                document.getElementById(fieldKey + "-longitude").value != "";

            const latitude =
                parseFloat(
                    document.getElementById(fieldKey + "-latitude").value
                ) || -33.8688;
            const longitude =
                parseFloat(
                    document.getElementById(fieldKey + "-longitude").value
                ) || 151.2195;

            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({
                input: input,
                autocomplete: autocomplete
            });
        }

        for (let i = 0; i < autocompletes.length; i++) {
            const input = autocompletes[i].input;
            const autocomplete = autocompletes[i].autocomplete;

            google.maps.event.addListener(autocomplete, "place_changed", function() {
                $("#rangeSlide").attr("disabled", false);
                const place = autocomplete.getPlace();

                geocoder.geocode({
                    placeId: place.place_id
                }, function(
                    results,
                    status
                ) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        const lat = results[0].geometry.location.lat();
                        const lng = results[0].geometry.location.lng();
                        setLocationCoordinates(autocomplete.key, lat, lng);
                        $("#statusLoc").val(1);
                    }
                });

                if (!place.geometry) {
                    window.alert(
                        "No details available for input: '" +
                        place.name +
                        "'"
                    );
                    input.value = "";
                    return;
                }
            });
        }
    }


    function setLocationCoordinates(key, lat, lng) {
        const latitudeField = document.getElementById(key + "-" + "latitude");
        const longitudeField = document.getElementById(key + "-" + "longitude");
        latitudeField.value = lat;
        longitudeField.value = lng;
    }


    //  $('#timedemo').pickatime({twelvehour: true});

    $('.available_date').datetimepicker({
        format: 'YYYY-MM-DD',

    });


    // $('.is_buynow').on('click', function() {
    //             // $('.hidden_contact_person').val(1);
    //             var is_buynow = $('input[name=is_buynow]:checked').val();
    //             if(is_buynow==1){

    //             }



    //         });
</script>
<script>
    $('.click-image').on('click', function() {
        $("input[class='main_image']").click();

    })


</script>
<script>
    $('#click-image').on('click', function() {
        $("input[class='main_image']").click();

    })

    function mainImage() {

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("main_image").files[0]);

        oFReader.onload = function(oFREvent) {
            $(".profile_pic").show();
            document.getElementById("profile_pic").src = oFREvent.target.result;
            document.getElementById("hidden_imgdata").value = "1";
        };

        
    };
</script>
<script type="text/javascript">
    function show1() {
        document.getElementById('div1').style.display = 'block';
    }

    function show2() {
        document.getElementById('div1').style.display = 'none';
    }
</script>
@endsection