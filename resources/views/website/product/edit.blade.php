@extends('website.layout.app')
<link rel="stylesheet" href="{{ url('public/website/css/custom/create.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js">
</script>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?v=3,libraries=places&key=AIzaSyDjXuFOT1UaWqtZWU7ZJ6Artc8Q-LPZ1bw"></script>

@section('css')

<style>

.select2-selection__choice {
    background-color:#fff !important;
    width: 300px !important;

}
div#login-tab .select2-container--default .select2-selection--multiple {
        border: 1px solid #aaa !important; 
}
input.form-control.address_one {
    height: 40px;
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
                    <a href="#!" class="nh">Need help?</a>
                </div>
                <div class="user-form-title mb0" align="left">
                    <h4><a href="{{ url('header-category') }}" class="tblack"><i class="fas fa-arrow-left"></i>
                            &nbsp; List an Item</a></h4>

                </div>
                <div>
                    <div class="col-md-10 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform" action="{{ url('product/edit', $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account">Title &amp; category</li>
                                    <li class="fc" id="personal"> Features </li>
                                    @if ($slug != 'jobs')
                                        <li class="fc" id="payment">Photos</li>
                                    @endif
                                    @if ($slug == 'jobs')
                                        <li class="fc" id="jobThree">Company Details</li>
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
                                            <div class="form-group"><input type="text" name="title"
                                                    value="{{ $product->title }}" class="form-control title"
                                                    placeholder="Title">
                                                <span class="error" style="color:red;"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <select class="form-control category" name="category_id">

                                                    <option value="">Select Category</option>
                                                    @if ($categories)
                                                        @foreach ($categories as $category)
                                                            <option @if ($product->category_id == $category->id) selected @endif value="{{ $category->id }}">
                                                                {{ ucwords($category->category_name) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <span class="error" style="color:red;"></span>
                                            </div>
                                        </div>
                                        @if ($product->category_id != 326)
                                         @if ($slug != 'jobs')
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <select class="form-control sub-category" name="sub_category" product-id="@if ($product->id){{$product->id}}@endif">

                                                    <option value="">Select Sub Category</option>
                                                    @if ($subCategories)
                                                        @foreach ($subCategories as $subCategory)
                                                            <option @if ($subCategory->id == $product->sub_category) selected @endif
                                                                value="{{ $subCategory->id }}">
                                                                {{ $subCategory->category_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <span class="error" style="color:red;"></span>
                                            </div>
                                        </div>
                                        @endif
                                        @endif
                                        {{-- @php
                                            $number = 100;
                                        @endphp
                                        @for ($i = 0; $i < $number; $i++)
                                            <div class="sub-category-list{{ $i }}  sub-category-list"></div>
                                        @endfor --}}
                                    </div>
                                    <input type="button" name="next" data-id="1" class="next action-button" value="Next"
                                        style="width: 49%;">
                                    <input type="button" class=" action-button-previous" value="Previous"
                                        style="width: 49%;">
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="col-lg-12">
                                            <textarea class="form-control description @if ($slug == 'jobs') job-ckeditor @endif"
                                                name="description" placeholder="Description"
                                                style="height: 100px;">{!! $product->description !!}</textarea>
                                            <span class="error" style="color:red;"></span>
                                        </div>
                                        <br>


                                        @if ($slug == 'market-place' || $slug == 'car-motor-bike-or-boat' || $slug == 'property')
                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <p class="mb10 mt20">Type</p>
                                                        <input type="radio" id="type1" name="type" value="2"
                                                            @if ($product->type == 2) checked @endif>
                                                        <label for="type1">
                                                            <p> New</p>
                                                        </label>

                                                        <input type="radio" id="type2" name="type" value="1"
                                                            @if ($product->type == 1) checked @endif>
                                                        <label for="type2">
                                                            <p>Used</p>
                                                        </label>
                                                        <span class="error" style="color:red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if ($slug == 'property')
                                            @include('website.product.property-default-feature', ['products' => $product])
                                            
                                        @endif

                                        @if ($slug == 'jobs')
                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control salary_scal" name="salary_scal">
                                                            <option @if ($product->salary_scal == 10000) selected @endif value="10000">10000 below
                                                            </option>
                                                            <option @if ($product->salary_scal == 20000) selected @endif value="20000">20000 +</option>
                                                            <option @if ($product->salary_scal == 30000) selected @endif value="30000">30000 +</option>
                                                            <option @if ($product->salary_scal == 40000) selected @endif value="40000">40000 +</option>
                                                            <option @if ($product->salary_scal == 50000) selected @endif value="50000">50000 +</option>
                                                            <option @if ($product->salary_scal == 60000) selected @endif value="60000">60000 +</option>
                                                            <option @if ($product->salary_scal == 70000) selected @endif value="70000">70000 +</option>
                                                            <option @if ($product->salary_scal == 80000) selected @endif value="80000">80000 +</option>
                                                            <option @if ($product->salary_scal == 90000) selected @endif value="90000">90000 +</option>
                                                            <option @if ($product->salary_scal == 100000) selected @endif value="100000">100000 +
                                                            </option>
                                                        </select>
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>




                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control job_type" name="job_type">
                                                            <option value="">Job Type</option>
                                                            <option @if ($product->job_type == 1) selected @endif value="1">Full Time</option>
                                                            <option @if ($product->job_type == 2) selected @endif value="2">Part Time</option>
                                                            <option @if ($product->job_type == 3) selected @endif value="3">Work From Home
                                                            </option>
                                                        </select>
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control duration" name="duration">
                                                            <option value="">Duration</option>
                                                            <option @if ($product->duration == 1) selected @endif value="1">Permanent</option>
                                                            <option @if ($product->duration == 2) selected @endif value="2">Temporary</option>
                                                            <option @if ($product->duration == 3) selected @endif value="3">Contract </option>

                                                        </select>
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control pay_type" name="pay_type">
                                                            <option value="">Pay Type</option>
                                                            <option @if ($product->pay_type == 1) selected @endif value="1">Monthly</option>
                                                            <option @if ($product->pay_type == 2) selected @endif value="2">Annual</option>


                                                        </select>
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- @if ($slug == 'market-place')
                                        
                                        <p class="mb10 mt20">Type</p> 
                                        <input type="radio" id="type1" name="type" value="1"  >
                                        <label for="type1"><p> Brand new unused item</p></label>
                                         <input type="radio" id="type2" name="type" value="2">
                                        <label for="type2"> <p>used item</p></label> 
                                @endif --}}
                                        @if ($slug == 'services')
                                            <div class="col-lg-12">
                                                <textarea class="form-control service_about" name="service_about"
                                                    placeholder="About"
                                                    style="height: 75px;">{{ $product->service_about }}</textarea>
                                                <span class="error" style="color:red;"></span>
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <textarea class="form-control service_offered" name="service_offered"
                                                    placeholder="Service Offered"
                                                    style="height: 75px;">{{ $product->service_offered }}</textarea>
                                                <span class="error" style="color:red;"></span>
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <textarea class="form-control area_service" name="area_service"
                                                    placeholder="Area Services"
                                                    style="height: 75px;">{{ $product->area_service }}</textarea>
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

                                            {{-- <div class="row ml0">
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="opening_time"
                                                        class="form-control opening_time" placeholder="Opening Time">
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="email" name="company_email"
                                                        class="form-control company_email" placeholder="Company Email ID">
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>
                                        </div> --}}

                                        @endif
                                        <div class="row ml0 feature-data-result">

                                        </div>
                                        <div class="feature-data-model-result">
                                     
                                        </div>
                                    </div>



                                    <input type="button" name="next" data-id="2" class="next action-button" value="Next"
                                        style="width: 49%;"><input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 49%;">
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
                                                   
                                                    <!-- <input type="file" class="form-control ldash" name="image"
                                                        id="profile_file"> -->
                                                    
                                                    <input id="main_image" class="main_image" onchange="mainImage();" name="image" type="file" style="visibility:hidden; display: none;"  />
                                                    
                            
                                                    
                                                    @if(!empty($product->image))
                                                    <input type="hidden" name="mainnewimage" class="hidden_imgdata" value="1" id="hidden_imgdata" value="">
                                                    @else
                                                    <input type="hidden" name="mainnewimage" class="hidden_imgdata" value="0" id="hidden_imgdata" value="">
                                                    @endif
                                                    <span title="attach file" class="attachFileSpan click-image" >
                                                        <img src="{{url('public/website/images/surface1.svg')}}"> Browse or drag & drop photos here
                                                    </span>
                                                </div>
                                                @if(!empty($product->image))
                                                    <img class="profile_pic"  name="profile_pic" id="profile_pic" src="{{asset('media/product-image/'.$product->image)}}" height="100" width="100" />
                                                @else
                                                    <img class="profile_pic" style="display: none;" name="profile_pic"
                                                    id="profile_pic"  height="100" width="100" />
                                                @endif
                                                <span>Image size should not exceed more than 10 mb</span>     
                                            </div>

                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <h2 class="fs-title">Multiple Image</h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <div class="gallery-image"></div>
                                                    <!-- <input type="file" class="form-control ldash" id="gallery_image"
                                                        name="media[]" multiple> -->
                                                    <input id="gallery_image" name="media[]" type="file" style="visibility:hidden; display: none;" multiple />
                                                    <input type="hidden" name="hidden_imgupload" class="hidden_imgdata" id="hidden_imgdata" value="">
                                                    <span title="attach file" class="attachFileSpan" onclick="document.getElementById('gallery_image').click()">
                                                        <img src="{{url('public/website/images/surface1.svg')}}"> Browse or drag & drop photos here
                                                    </span>    
                                                    {{-- <textarea class="form-control"
                                                    placeholder="Browse or drag and drop photos here"></textarea> --}}
                                                </div>
                                                <div class="row">
                                                    @if($product->media)
                                                        @foreach ($product->media as $media)
                                                        <div class="col-md-3 mb10">
                                                            <img src="{{asset('media/product-multi-image/'.$media->file)}}" alt="" width="100px" height="100px">
                                                            <div class="img-wraps2  trash-image delete-trash">
                                                            <span class="closes delete" data-content="product/media" data-id="{{$media->id}}" title="Delete">×</span>
                                                    </div> 
                                                        </div>
                                                            @endforeach
                                                    @endif
                                                    </div>
                                                <span>Image size should not exceed more than 10 mb</span>
                                                <p id="image_error" style="color: #ff0000;"></p>
                                            </div>
                                            {{-- <div class="col-lg-9">
                                                <a href="#!"><u>Photo Privacy and Guidelines</u> </a>
                                            </div> --}}
                                        </div>

                                        <br><br><br><br>
                                        <input type="button" name="next" data-id="3" class="next action-button" value="Next"
                                            style="width: 49%;"><input type="button" name="previous"
                                            class="previous action-button-previous" value="Previous" style="width: 49%;">
                                    </fieldset>

                                @endif
                                <fieldset>
                                    <div class="form-card">

                                        <div class="col-6">
                                            <h2 class="fs-title">
                                                @if ($slug != 'jobs' && $slug != 'services') Price and Payment
                                                @elseif($slug == 'services') Service Location
                                                @else Company Details @endif
                                            </h2>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="steps"></h2>
                                        </div>

                                        @if ($slug != 'jobs' && $slug != 'services')
                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="price"
                                                            value="{{ $product->price }}" class="form-control price"
                                                            placeholder="Buy Now (optional) ">
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="auction_price"
                                                            value="{{ $product->auction_price }}"
                                                            class="form-control price auction_price"
                                                            placeholder="Auction Start price (optional)">
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 auction_date" @if ($product->is_auction != 1) style="display: none;" @endif>
                                                   <!--  <div class="form-group"><input type="text" name="auction_end_date"
                                                            value="{{ $product->auction_end_date }}"
                                                            class="form-control  auction_end_date"
                                                            placeholder="Auction End Date">
                                                        <span class="error" style="color: red;"></span>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-12 auction_price">
                                                <p>Do you wish to run an auction without the buy now option ?</p>
                                           </div>
                                            <div class="col-lg-7 auction_price">
                                                <div class=" is_buynow_option" style="margin-bottom: 10px">
                                                    <input type="radio" id="buynow1" name="is_buynow"  value="1"
                                                            class="is_buynow_yes is_buynow"  @if ($product->is_buynow == 1) checked @endif>
                                                    <label class="fs" for="store1"> Yes </label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" id="buynow2" name="is_buynow" value="2"
                                                          class="is_buynow_no is_buynow" @if ($product->is_buynow == 2) checked @endif>
                                                    <label class="fs" for="store2"> No</label>
                                                </div>
                                            </div> 
                                        @endif
                                        @if ($slug != 'jobs' && $slug != 'services' && $slug != 'property' )
                                            <div class="col-lg-7">
                                                <div class="mtb30">
                                                    <h2 class="fs-title mb0">Seller Location</h2>
                                                    <input type="radio" id="age1" name="pick_up" value="1"
                                                        @if ($product->pick_up == 1) checked @endif>
                                                    <label class="fs" for="age1"> Pickup from seller </label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" id="age2" name="pick_up" value="2"
                                                        @if ($product->pick_up == 2) checked @endif>
                                                    <label class="fs" for="age2"> Pickup from store </label>
                                                </div>
                                            </div>
                                        @endif


                                        @if ($slug == 'jobs')

                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="company_name"
                                                            value="{{ $product->company_name }}"
                                                            class="form-control company_name" placeholder="Company Name">
                                                        <span class="error" style="color: red;"></span>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="email" name="company_email"
                                                            value="{{ $product->company_email }}"
                                                            class="form-control company_email"
                                                            placeholder="Company Email ID">
                                                        <span class="error" style="color: red;"></span>

                                                    </div>
                                                </div>
                                            </div>

                                        @endif


                                        @if ($slug == 'services')

                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="company_name"
                                                            value="{{ $product->company_name }}"
                                                            class="form-control company_name" placeholder="Business name">
                                                        <span class="error" style="color: red;"></span>

                                                    </div>
                                                </div>

                                            </div>

                                        @endif
            
                                        <div class="row ml0">
                                            <div class="col-md-12">
                                            <h2 class="fs-title mb0">Location</h2>
                                        </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control district" name="district"
                                                        data-toggle="select2" data-search="true">
                                                        <option value="">District</option>
                                                        @if ($districts)
                                                            @foreach ($districts as $district)
                                                                <option @if ($district->district_id == $product->district) selected @endif
                                                                    value="{{ $district->district_id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control municipality" name="municipality">
                                                        <option value="">Muncipality/Nagarpalika</option>
                                                        @if ($muncipalities)
                                                            @foreach ($muncipalities as $muncipality)
                                                                <option @if ($muncipality->municipality_id == $product->municipality) selected @endif
                                                                    value="{{ $muncipality->municipality_id }}">
                                                                    {{ $muncipality->municipality_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control village" name="village">
                                                        <option value="">Village</option>
                                                        @if ($villages)
                                                            @foreach ($villages as $village)
                                                                <option @if ($village->id == $product->village) selected @endif
                                                                    value="{{ $village->id }}">{{ $village->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <input class="form-control address_one" type="text" name="address_one" placeholder="Ward No."value="{{ $product->address_one }}">

                                                </div>
                                            </div>
                                        </div>

                                         {{-- 
                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                                <textarea class="form-control address_one" name="address_one"
                                                    placeholder="Address line 1">{{ $product->address_one }}</textarea>
                                                <span class="error" style="color: red;"></span>

                                            </div>

                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="address_two"
                                                    placeholder="Address line 2">{{ $product->address_two }}</textarea>
                                            </div>
                                        </div>
                                        --}}
                                        @if ($slug != 'jobs' && $slug != 'services' && $slug != 'property')
                                        <div class="col-lg-6">
                                                <br>
                                                <p class="business_detail"> Do you Provide delivery service</p>
                                                <input type="radio" name="delivery_service" value="igotnone" onclick="show1();" @if($product->delivery_service == 'igotnone') checked @endif/>
                                                Yes
                                                <input type="radio" name="delivery_service" value="igottwo" onclick="show2();" @if($product->delivery_service == 'igottwo') checked @endif/>
                                                No
                                             </div>
                                        <div class="" style="display: none;" id="div1">
                                            <div class="col-lg-6">
                                                <br>
                                                <h2 class="fs-title">Set delivery location</h2>
                                            </div>

                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control km_delivery" name="km_delivery[]" multiple="multiple">
                                                            <option value="">Select Kilometers for delivery</option>
                                                            @if ($districts)
                                                            @foreach ($districts as $district)
                                                           
                                                                <option @if ($product->productDelivery($product->id,$district->district_id)) selected @endif
                                                                    value="{{ $district->district_id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach
                                                        @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <ul class="form-check-list" style="margin-top: 10px">
                                                            <li class="mb10"><input type="checkbox"
                                                                    name="delivery">&nbsp; <label for="fix-check"
                                                                    class="form-check-text"> Delivery all over
                                                                    Nepal</label></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-6">
                                            <h2 class="fs-title mb0">
                                                {{--@if ($slug != 'jobs' && $slug != 'services' && $slug != 'property') Seller Information
                                                @elseif($slug == 'services') Service Information @endif
                                                @if($slug == 'property') Contact Information @endif--}}

                                                @if ($slug != 'jobs' && $slug != 'services') Contact Information
                                                @elseif($slug == 'services') Service Information @endif

                                            </h2>
                                        </div>
                                        <div class="row ml0 mt20">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                   
                                                    <img id="uploadPreview" class="iresponsive"
                                                    
                                                       @if($product->seller_image) 
                                                       src="{{ url('public/media/seller-image/'.$product->seller_image) }}" 
                                                       @else src="{{ url('public/website/images/us.png') }}" @endif />
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <input onchange="PreviewImage();" type="file" id="image" name="seller_image"
                                                    class="my_file" style="display: none;" />

                                                <div class="form-group"><a
                                                        class="seller_image_file fs14 tblu mt60"><u>
                                                            upload @if ($slug == 'jobs')
                                                            Logo @else
                                                                photo @endif</u>
                                                    </a></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="hidd_name" class="hidd_name" value="{{Auth::user()->username}}">
                                        <input type="hidden" name="hidd_phone" class="hidd_phone" value="{{Auth::user()->phone_number}}">

                                        <div class="col-md-12">
                                            @if ($slug != 'jobs') 
                                            <p class=" business_detail mt20" @if(!isset($user->username)) style="display: none;" @endif >Seller details are same as profile details.</p>
                                            @else
                                            <p class=" business_detail mt20" @if(!isset($user->username)) style="display: none;" @endif >Advertiser details are same as profile details.</p>
                                            @endif
                                        </div>
                                        <div class="col-lg-7 business_detail" @if(!isset($user->username)) style="display: none;" @endif>
                                            <div class="mb30">
                                                <input type="radio" id="is_contact_person1"  value="1"     
                                                    class="personalInfo personalInfoYes hidden_contact_person" name="is_contact_person" @if($product->is_contact_person=='1') checked @endif>
                                                <label class="fs" for="is_contact_person1"> Yes </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="is_contact_person2" value="2" class="personalInfo personalInfoNo hidden_contact_person"
                                                     name="is_contact_person" @if($product->is_contact_person=='2') checked @endif>
                                                <label class="fs" for="is_contact_person2"> No</label>
                                          
                                                <input type="hidden" class="" id="hidden_contact" >
                                                <span class="personalinfo-error" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h2 class="fs-title">
                                                @if ($slug == 'jobs')  Contact Person @endif</h2>
                                        </div>
                                        <div class="row ml0">
                                            <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="seller_first_name"
                                                        value="{{ $product->seller_first_name }}"
                                                        class="form-control seller_first_name" placeholder="Full Name">
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>
                                             {{-- <div class="col-lg-6">
                                                <div class="form-group"><input type="text" name="seller_last_name"
                                                        value="{{ $product->seller_last_name }}"
                                                        class="form-control seller_last_name" placeholder="Last Name">
                                                    <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>--}}
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group"><input type="text" name="seller_phone"
                                                    value="{{ $product->seller_phone }}" class="form-control seller_phone"
                                                    placeholder="Phone Number">
                                                <span class="error" style="color: red;"></span>
                                            </div>
                                        </div>

                                        @if ($slug == 'market-place')
                                            <div class="col-lg-6">

                                                <h2 class="fs-title mb0">More Options</h2>
                                                <p>Add a Quantity to this listing</p><br>
                                            </div>

                                            <div class="row ml0">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select class="form-control quantity" name="quantity">
                                                            <option selected disabled>Select Quantity</option>
                                                            <option @if ($product->quantity == 1) selected @endif value="1">1</option>
                                                            <option @if ($product->quantity == 2) selected @endif value="2">2</option>
                                                            <option @if ($product->quantity == 3) selected @endif value="3">3</option>
                                                            <option @if ($product->quantity == 4) selected @endif value="4">4</option>
                                                            <option @if ($product->quantity == 5) selected @endif value="5">5</option>
                                                            <option @if ($product->quantity == 6) selected @endif value="6">6</option>
                                                            <option @if ($product->quantity == 7) selected @endif value="7">7</option>
                                                            <option @if ($product->quantity == 8) selected @endif value="8">8</option>
                                                            <option @if ($product->quantity == 9) selected @endif value="9">9</option>
                                                            <option @if ($product->quantity == 10) selected @endif value="10">10</option>
                                                            <option @if ($product->quantity == 11) selected @endif value="11">11</option>
                                                            <option @if ($product->quantity == 12) selected @endif value="12">12</option>
                                                            <option @if ($product->quantity == 13) selected @endif value="13">13</option>
                                                            <option @if ($product->quantity == 14) selected @endif value="14">14</option>
                                                            <option @if ($product->quantity == 15) selected @endif value="15">15</option>
                                                        </select>
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

                                    <input type="button" name="next" data-id="4" class="next action-button"
                                        style="width: 49%;" value="update"><input type="button" name="previous"
                                        class="previous action-button-previous" value="Previous" style="width: 49%;">
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
<style>
.img-wraps2 .closes{
    top: -63px !important;
    right: 15px !important;
}
</style>
@section('js')
    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="{{ url('public/website/js/classified/product.js') }}"></script>
    <script src="{{ url('public/website/js/classified/delete.js') }}"></script>

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
        $('.auction_end_date').datetimepicker({
            format: 'YYYY-MM-DD',

        });
        $('.km_delivery').select2({
            selectOnClose: true
        });
        var allEditors = document.querySelectorAll('.job-ckeditor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(
                allEditors[i], {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                },
            );
        }


        var autocomplete = 'address-input';

        $(document).ready(function() {

            autocomplete = new google.maps.places.Autocomplete((document.getElementById(Searchinput)), {
                type: ['geocode'],
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
            });

        });
    </script>
    <script>
        $('.click-image').on('click',function()
        {
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
        function show1(){
            document.getElementById('div1').style.display ='block';
        }
        function show2(){
          document.getElementById('div1').style.display = 'none';
        }
        $(document).ready(function() {
            if($("input[name='delivery_service'][value='igotnone']").prop("checked")) {
                $('#div1').show();
            } else {
                $('#div1').hide();
            }
        });
    </script>
@endsection


