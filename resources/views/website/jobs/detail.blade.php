<style>
   
    @media(max-width:767px){
 .product-meta { 
     height: unset !important;
 }
 
 }
 #job_dec ul{
    list-style: unset !important;
    margin-left: 20px;
 }
 #job_dec ol{
    list-style: auto !important;
    margin-left: 20px;
 }
 #jobs-ads{
    width: 100%;
    min-height: 500px;
    object-fit: cover;
 }
 </style>
@extends('website.layout.app')

@section('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
<link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">
@endsection
@section('content')


<!-------new------------>
<section id="services" class="services section-bg mt10">
    <div class="container-fluid mt60">
        <p class="fs12 mb20"><a href="{{ url('/') }}">Home</a>
            <span class="cblue">{{ \Request::getRequestUri() }}</span> </p>

        <div class="row row-sm">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="alert alert-msg text-center" style="padding: 10px
                    0;"></div>
            </div>
        </div>


        <div class="row row-sm" id="details_Data" style="margin-left:50%;">
            @if($job->is_sold=='1')
                        <div class="col-md-4">
                            <p style="background: #ff0000;color: #fff;padding: 10px 15px 10px 15px;font-size: 13px;text-align: center;border-radius: 5px;">Job is Closed.</p>
                        </div>
                    @elseif($job->is_sold=='2')  
                        <div class="col-md-4">
                            <p style="background: #ff0000;color: #fff;padding: 10px 15px 10px 15px;font-size: 13px;text-align: center;border-radius: 5px;">Job is Paused.</p>
                        </div>
                    @else
                        @if (Auth::check())
                            @if($job->user_id != Auth::user()->id)
                                <div class="col-md-3">
                                    <a href="{{asset('/apply-job?slug='.$job->slug)}}"
                                        class="btn btn-inline post-btn2 fs18w"><span>Apply
                                            Now</span></a>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" title="Wishlist" data-id="{{ $job->id }}" class="wishlist btn btn-inline2 post-btn2">Wishlist</button>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <p style="color: #ff0000;font-size: 14px;text-align: center;">You can not apply and wishlist your job.</p>
                                </div>
                            @endif
                        @else
                            <div class="col-md-4">
                                <a href="{{url('/login')}}" class="btn btn-inline post-btn2 fs18w"><span>Apply Now</span></a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{url('/login')}}" class="wishlist btn btn-inline2 post-btn2"><span>Wishlist</span></a>
                            </div>
                        @endif
                    @endif
        </div>
        <div class="row row-sm">
            <!-- <div class="col-lg-6 _boxzoom">
                <div class="zoom-thumb">
                  <ul class="piclist">
                    <li><img src="images/dea/p2.png" alt=""></li>
                    <li><img src="images/dea/p3.png" alt=""></li>
                    <li><img src="images/dea/p4.png" alt=""></li>
                    <li><img src="images/dea/p2.png" alt=""></li>
                    
                  </ul>
                </div>
                <div class="_product-images" align="center">
                  <div class="picZoomer" align="center">
                    <img class="my_img" src="images/dea/p2.png" alt="">
                  </div>
 
                  <div class="w95">
                     <div class="row">
                        <div class="col-md-6"> <a href="login.html" class="btn btn-inline2 post-btn2"><span>Place Bid</span></a></div>
                        <div class="col-md-6"><a href="login.html" class="btn btn-inline post-btn2 fs18w"><span>Buy Now</span></a></div>
                     </div>
                
                  
                   
                
                   </div>
 
 
                </div>
 
               
              </div> -->

               

            <div class="col-md-9">
                <div class="row">

                    <div class="col-md-12">
                        <div class="common-card p0">
                            <h3 class="ad-details-title p10 mb0">{{
                                ucwords($job->title) }} </h3>
                            <div class="product-meta product-flx-mobile">
                                <div class="row brb2">
                                    <div class="col-md-4 brb job-flx-mobile">
                                        <span>
                                            <!-- <i class="fas fa-map-marker-alt"></i> -->
                                            Location</span><br>
                                        <spn class="torng"> @if($job->address_one)
                                                    {{$job->address_one}}@endif
                                                    @if($job->address_two)
                                                    , {{$job->address_two}}@endif
                                                    @if($job->district)
                                                        @php
                                                            $district_data = DB::table('districts')->where('district_id', $job->district)->first();
                                                        @endphp
                                                    , {{$district_data->district_name}}@endif
                                                    @if($job->municipality)
                                                        @php
                                                            $municipality_data = DB::table('municipalities')->where('municipality_id', $job->municipality)->first();
                                                        @endphp
                                                    , {{$municipality_data->municipality_name}}@endif
                                        </span>
                                    </div>

                                    <div class="col-md-2 brb job-flx-mobile">
                                        <span>
                                            <!-- <i class="fa fa-briefcase"></i> -->
                                            Job Type: <span class="torng"><br>
                                                @if($job->job_type == 1){{"Full
                                                Time"}}@endif
                                                @if($job->job_type == 2){{"Part
                                                Time"}}@endif
                                                @if($job->job_type == 3){{"Work
                                                From Home "}}@endif
                                            </span>
                                        </div>

                                        <div class="col-md-2 brb job-flx-mobile">
                                            <span>
                                                <!-- <i class="fa fa-briefcase"></i> -->
                                                Salary: <span class="torng"><br>
                                                    रू@if($job->salary_scal)
                                                    {!!$job->salary_scal!!}@endif
                                                </span>
                                            </div>

                                            <div class="col-md-2 brb job-flx-mobile">
                                                <span>
                                                    <!-- <i class="fa fa-clock"></i> -->
                                                    Duration: <br><span
                                                        class="torng">
                                                        @if($job->duration ==
                                                        1){{"Permanent"}}@endif
                                                        @if($job->duration ==
                                                        2){{"Temporary"}}@endif
                                                        @if($job->duration ==
                                                        3){{"Contract"}}@endif</span>
                                                </span>
                                            </div>
                                            <div class="col-md-2 job-flx-mobile">
                                                <span class="test">
                                                    <!-- <i class="fa fa-clock"></i> -->
                                                    Pay Type: <br><span
                                                        class="torng">
                                                        @if($job->pay_type ==
                                                        1){{"Monthly"}}@endif
                                                        @if($job->pay_type ==
                                                        2){{"Annual"}}@endif
                                                    </span>

                                                </span>
                                            </div>
                                           

                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-md-12">
                            <div class="dbox" id="job_dec">
                                <h4 class="fs20">Description</h4>

                                {{-- <ul class="ldisc">
                                    <li>Excellent condition, always in a
                                        protective cover.</li>
                                    <li>Comes with an Apple box, original unused
                                        Apple charge cable, fitted lens
                                        protector, wired Apple EarPods (unused)
                                        and Apple original clear case.</li>
                                </ul> --}}

                                <p class="p10">@if($job->description) {!!$job->description!!}@endif
                                </p>
                            </div>
                            <div class="common-card dbox2 col-md-12">
                                <h4 class="fs20">About the advertiser </h4>
                                <!--mobile view--->

                                <p class="visible-xs mb30"><span class="gbox
                                        fs12xs">Address Verified</span>
                                    <span
                                        class="rbox2 fs12xs"><a href="{{
                                            url('messages?type='.$slug) }}"
                                            class="twhite fs12xs">Message Advertiser</a></span> </p>
                                <!--mobile view--->

                                <div class="row">
                                    <div class="col-md-12" align="right">
                                        @if($job->userList->is_business == 2 && $job->userList->is_store == '' && $job->userList->active == 1)
                                        <p class="lalign hidden-x">
                                            <span class="gbox">Address Verified</span>
                                        @endif
                                        @if(Auth::check())
                                           @if($job->user_id == Auth::user()->id)
                                        @else
                                        <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                        @endif
                                        @else
                                        <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                    @endif
                                                   
                                    </div>
                                    <div class="col-md-3 mtm30">
                                        <img class="iresponsive" @if ($job->seller_image)
                                        src="{{ url('public/media/seller-image/' .
                                        $job->seller_image) }}" @else src="{{
                                        asset('website/images/dea/old_logo.png')
                                        }}" @endif alt="">

                                        <!-- <img class="iresponsive" src="{{url('public/website/images/dea/p1.png')}}" alt=""> -->
                                    </div>
                                    <div class="col-md-9 mtm45">
                                        <ul class="ad-details-specific dbb">
                                            <li>
                                                <h6>Company Name:</h6>
                                                <p>@if($job->company_name)
                                                    {{$job->company_name}}@endif
                                                </p>
                                            </li>
                                            <li>
                                                <h6>Location:</h6>
                                                <p>@if($job->address_one)
                                                    {{$job->address_one}}@endif
                                                    @if($job->address_two)
                                                    , {{$job->address_two}}@endif
                                                    @if($job->district)
                                                        @php
                                                            $district_data = DB::table('districts')->where('district_id', $job->district)->first();
                                                        @endphp
                                                    , {{$district_data->district_name}}@endif
                                                    @if($job->municipality)
                                                        @php
                                                            $municipality_data = DB::table('municipalities')->where('municipality_id', $job->municipality)->first();
                                                        @endphp
                                                    , {{$municipality_data->municipality_name}}@endif
                                                </p>
                                            </li>
                                            <li>
                                                <h6>Contact Person :</h6>
                                                <p>@if($job->seller_first_name)
                                                    {{$job->seller_first_name}}@endif
                                                    @if($job->seller_last_name)
                                                    {{$job->seller_last_name}}@endif
                                                </p>
                                            </li>
                                            <li>
                                                <h6> Contact Number:</h6>
                                                <p>@if($job->seller_phone)
                                                    {{$job->seller_phone}}@endif
                                                </p>
                                            </li>
                                            <li>
                                                <h6>Email:</h6>
                                                <p>@if($job->company_email)
                                                    {{$job->company_email}}@endif
                                                </p>
                                            </li>
                                            <li>
                                                @if((int)$avgRating > 1)
                                                <h6><span class="pfeedback">@if((int)$avgRating
                                                        >= 3) positive @endif</span>
                                                    <span>
                                                        <a
                                                            href="{{url('store-profile',$job->userList->id)}}"
                                                            class="tblack">
                                                            Rating
                                                            {{number_format($avgRating,1)}}
                                                            <i class="fa fa-star
                                                                rating"></i>
                                                        </a>({{$reviews->count()}})
                                                    </span></h6> @endif
                                            </li>

                                        </ul>
                                        <!-- <div align="right">
                            <a href="#!" class="clink mt20"> <u>View advertiser's other listings</u></a>
                           </div>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @php 
                        $webads = DB::table('web_ads')->where('page','job-right')->first();
                        @endphp
                        <br>
                        <br>
                        <a target="_blank" href="">
                        <img src="{{url('public/media/webads-image',$webads->image)}}" class="br5" id="jobs-ads"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------new------------>


    @endsection
    @section('js')

    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
    <script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>
    <script>
 $('.wishlist').on('click', function() {
    //$('.wishlist').prop('disabled', true);
    //$('.wishlist').html("Remove Wishlist");
             var id = $(this).data('id');
          
             $.ajax({
                 type: "post",
                 url: base_url + "wishlist",
                 data: {
                     id: id
                 },
                 success: function(res) {
                       //alert("wishlist");
                    $('.alert-msg').html(res[0]);
                    $('.wishlist').html(res[1]);
                    $('.alert-msg').addClass("alert-success");
                    $('.alert-msg').addClass("wishlist-add");
                 },
                 error: function() {
 
                 }
             })
         })
    </script>
    @endsection