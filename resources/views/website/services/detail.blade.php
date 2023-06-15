@extends('website.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">

@endsection
@section('content')

<style>
    #p_feedback{
    margin-left: 0 !important;
    margin-right: 0 !important;
  }

</style>

    <!-------new------------>
    
    <section id="services" class="services section-bg mt10">
        <div class="container-fluid mt60">
            <p class="fs12 mb20"><a href="{{ url('/') }}">Home</a><span
                class="cblue">{{ \Request::getRequestUri() }}</span> </p>


                <div class="row row-sm">    
                    <div class="col-lg-3"></div>     
                       <div class="col-lg-6">        
                     </div>
                   </div>

            <div class="row row-sm">
                
                <div class="col-lg-6">
                    <div class="common-card isset p0 ">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="ad-details-title"> @if(isset($service->title)){{$service->title}}@endif
                                    <!-- <span class="s-success">Listed Today</span> -->
                                </h3>
                            </div>
                        </div>
                        <div class="dbox mt0 mb10">
                            <h4 class="dfs18 mb0">Business name:</h4>
                            <p class="dfs16">@if(isset($service->company_name)){{$service->company_name}}@endif</p>
                            </div>
 <div class="dbox mt0 mb10">
                            <h4 class="dfs18 mb0"> Location:</h4>
                            <p class="dfs16">@if ($service->districtList){{ $service->districtList->district_name }} @endif @if ($service->municipalityList) , {{ $service->municipalityList->municipality_name }} @endif</p>
                            </div>
                            <div class="dbox mt0 mb10">
         <h4 class="fs20 mb0"> Areas serviced:</h4>

         <p class="dfs16"> @if(isset($service->area_service)){{$service->area_service}}@endif</p>
         </div>
                            <div class="dbox mt0 mb10">
                   <h4 class="dfs18 mb0"> Availability:</h4>
                   @if(isset($service->availability_timing)){{$service->availability_timing}}@endif
                   <!-- <p class="dfs16">	Mon-Fri 10am-6pm</p> -->
</div>
                        </div>
                    </div><div class="col-lg-6 _boxzoom">
                    
                    <div class="_product-images" align="center">
                        <div class="serimg" align="center">
                          
                            <img class="iresponsive" src="@if($service->image){{asset('media/product-image/' . $service->image)}}@else{{ url('public/website/images/product/13.jpg') }}@endif" alt="">
                          
                        </div>
                        <div class="alert alert-msg text-center" style=""></div>

                        @if (Auth::check())
                        @if($service->user_id == Auth::user()->id)


                        @else
                        <div class="w95">
                            <div class="row">
                                 <div class="col-md-6">
                                    @if (Auth::check())
                                    <button type="button" title="Wishlist"
                                        data-id="{{ $service->id }}"
                                        class="wishlist btn btn-inline2 post-btn2">Wishlist</button>
                                @endif
                            </div> 

                                <div class="col-md-6"><a href="{{ url('messages?type='.$slug) }}"
                                        class="btn btn-inline post-btn2 fs18w"><span>Contact</span></a></div>
                            </div>
                        </div>
                        @endif
                        @endif
                       
                    </div>
                    <!-- <div class="zoom-thumb">
                        <ul class="piclist">
                          
                            <li><img src="{{ url('public/website/images/product/13.jpg') }}" alt=""></li>
                             
                            

                        </ul>
                    </div> -->
                </div>
                    <div class="col-md-12">
<div class="dbox mt5 mb20">
    <h4 class="dfs18 mb0"> Services offered:</h4>

    <p class="dfs16 mb10"> @if(isset($service->service_offered)){{$service->service_offered}}@endif</p>

         <h4 class="dfs18 mb0"> Description:</h4>

<p class="dfs16">@if(isset($service->description)){{$service->description}}@endif</p>


         </div>

    
</div>

                </div>
            </div>
        </div>
    </section>


    <section class="p30 niche-part pb60">
            <div class="container-fluid">


                <div class="row cprofile">



                    <div class="col-md-6">
                        <div class="row">

                            <div class="common-card shadow" id="review">
                                <div class="card-header">
                                    <h5 class="card-title">Feedback ({{$reviews->count()}})</h5>
                                </div>
                                <div class="ad-details-review">
                                    @if(Auth::check())
                                        @if($service->user_id == Auth::user()->id)
                                            <p style="color: #ff0000;">You are not allowed to review or rate your own listing or Service.</p>
                                        @else
                                            <!-- services own feedback code -->
                                            <form  class="review-form mb20 formSubmit" method="post">
                                                @csrf
                                                <input type="text" hidden name="product_id" value="{{$service->id}}" id="">
                                                <input type="text" hidden name="submitted_user" value="{{Auth::user()->id}}" id="">

                                                {{-- <div class="star-rating"><input type="radio" name="rating" value="5"  id="star-1"><label
                                                        for="star-1"></label><input type="radio" name="rating" value="4" id="star-2"><label
                                                        for="star-2"></label><input type="radio" name="rating" value="3"  id="star-3"><label
                                                        for="star-3"></label><input type="radio" name="rating" value="2"  id="star-4"><label
                                                        for="star-4"></label>
                                                        <input type="radio" name="rating" value="1"  id="star-5">
                                                        <span class="error" style="color: red;"></span>

                                                     
                                                        <label
                                                        for="star-5"></label></div> --}}
                                                <div class="row">

                                                    <div class="col-md-7">
                                                    <div class="star-rating">
                                                        
                                                        <input type="radio" name="rating" value="5"  id="star-1"><label
                                                        for="star-1"></label><input type="radio" name="rating" value="4" id="star-2"><label
                                                        for="star-2"></label><input type="radio" name="rating" value="3"  id="star-3"><label
                                                        for="star-3"></label><input type="radio" name="rating" value="2"  id="star-4">
                                                       <label
                                                        for="star-4">

                                                       
                                                        
                                                    </label>
                                                        <input type="radio" name="rating" value="1"  id="star-5">
                                                       
                                                        <label
                                                        for="star-5"></label>
                                                        <div class="rating-error" style="color: red;"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                        <div class="form-group"><input type="text" class="form-control"
                                                               name="title" placeholder="Title" >
                                                        <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                 
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control"
                                                       name="review" placeholder="Describe"></textarea>
                                                       <span class="error" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                </div>
                                                <button type="submit" class="btn btn-inline review-submit"><i
                                                        class="fas fa-tint"></i><span>drop your review</span></button>
                                            </form>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-inline review-submit"
                                        @if (!Auth::check()) data-toggle="modal"
                                        data-target="#login"
                                        @endif ><i class="fas fa-tint"></i><span>Login and drop your review</span></button>
                                    @endif

                                    <ul class="review-list">
                                        @if($reviews)
                                            @foreach($reviews as $review)
                                        <li class="review-item">
                                            <div class="review-user">
                                                <div class="review-head">
                                                    <div class="review-profile">
                                                        <a href="#" class="review-avatar"><img
                                                                @if($review->user)
                                                                @if(isset($review->user->avatar))
                                                                src="{{ url('public/media/avatar/'.$review->user->avatar) }}"
                                                                 @else src="{{ url('public/website/images/user.png') }}" @endif
                                                                 @endif
                                                                alt="review"></a>
                                                        <div class="review-meta">
                                                            <h6><a href="#">@if($review->user) {{ucwords($review->user->username)}} - @endif</a><span>{{$review->created_at->format('M d Y')}}</span></h6>
                                                            <ul>
                                                                <li><i class="fas fa-star @if($review->rating >= 1) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 2) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 3) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 4) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 5) active @endif"></i></li>
                                                                <li>
                                                                    <h5>- {{$review->title}}</h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="review-desc">{{$review->review}}</p>
                                            </div>
                                        </li>
                                            @endforeach
                                        @endif
                                     
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-md-6">
                       <!--------->
                     

                       <div class="common-card dbox2">
                        <h4 class="fs20">Service Provider <br>Information </h4>
                     <!--mobile view--->
                        <p class="visible-xs mb30">
                                @if($service->userList)
                                    @if($service->userList->is_business == 1 && $service->userList->is_approve_store == 1)
                                    <span class="rbox fs12xs">In Trade </span>
                                   
                                    @elseif($service->userList->is_business == 2 && $service->userList->is_approve_store == 1)
                                <span class="gbox fs12xs">Address Verified</span> 
                                @endif
                                @endif
                               
                            
                                        <span
                                        class="rbox2 fs12xs"><a href="{{ url('messages?type='.$slug) }}" class="twhite" > Message Service Providers</a></span></p>
                                        
                                         <!--mobile view--->

                        <div class="row">
                            <div class="col-md-12" align="right">
                                                            

                            <p class="lalign hidden-x">
                                @if (Auth::check())
                                @if($service->userList)
                                    @if($service->userList->is_business == 1 && $service->userList->is_approve_store == 1)
                                    <span class="rbox">In Trade </span>
                                   
                                    @elseif($service->userList->is_business == 2 && $service->userList->is_store == '' && $service->userList->active == 1)
                                <span class="gbox">Address Verified</span> 
                                @endif
                                @endif
                            
                            @if($service->user_id == Auth::user()->id)
                             @else
                             <span
                                        class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Service Provider</a></span></p>@endif
                                        @endif
                            </div>
                            <div class="col-md-3 mtm30">
                                <a @if ($service->userList) href="{{url('store-profile/'.$service->userList->id)}}" @endif >
                                    <img class="iresponsive" @if ($service->seller_image) src="{{ url('public/media/seller-image/' . $service->seller_image) }}"  height="124" width="124" @else src="{{ url('public/website/images/us.png') }}" @endif alt="">
                                </a>
                            </div>
                            <div class="col-md-9 mtm45">
                                <ul class="ad-details-specific dbb">
                                    <li>
                                        <h6>Name:</h6>
                                        <p>{{ ucwords($service->seller_first_name) }}
                                            {{ ucwords($service->seller_last_name) }}</p>
                                    </li>
                                    <li>
                                        <h6>Location:</h6>
                                        <p>@if ($service->districtList){{ $service->districtList->district_name }} @endif @if ($service->municipalityList) , {{ $service->municipalityList->municipality_name }} @endif</p>

                                    </li>
                                   <!--  <li>
                                        <h6>Pick-up Location:</h6>
                                        <p>@if ($service->districtList){{ $service->districtList->district_name }} @endif @if ($service->municipalityList) , {{ $service->municipalityList->municipality_name }} @endif</p>

                                    </li> -->
                                    <!-- <li>
                                        <h6> Shipping Area:</h6>
                                        @if ($service->productDeliveryLocation)
                                        @php
                                        $count = count($service->productDeliveryLocation);
                                        $countDegrees = $count - 1;
              
                                         @endphp
                                            @foreach($service->productDeliveryLocation  as $key=> $location)
                                            @if($location->distrctList)
                                            
                                        {{ $location->distrctList->district_name }}@if($countDegrees != $key),@endif
                                        @endif
                                        @endforeach
                                         @else
                                            All Over Nepal @endif
                                    </li> -->
                                    <li>
                                        <h6>Mobile No:</h6>
                                         <p>{{ ucwords($service->seller_phone) }}</p>
                                    </li>
                                    <li>
                                        <h6>Payment Method:</h6>
                                        <p>Bank transfer, Cash</p>
                                    </li>

                                    <li>
                                       @if((int)$avgRating > 1)
                                    <h6><span class="pfeedback" id="p_feedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                             <a href="{{url('store-profile',$service->userList->id)}}" class="tblack" > Rating {{number_format($avgRating,1)}}
                             <i class="fa fa-star rating"></i> 
                              </a>({{$reviews->count()}})
                          </span></h6> @endif
                                    </li>
                                </ul>
                                <div align="right">
                                    <a href="{{url('store-profile',$service->userList->id)}}" class="clink mt20"> <u>View Seller's other Products</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
       

                       <!---------->
                    </div>

                </div>
        </div></section>



@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
    <script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>

    <script>

$('.wishlist').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: base_url + "wishlist",
                data: {
                    id: id
                },
                success: function(res) {
                   $('.alert-msg').html(res[0]);
                   $('.wishlist').html(res[1]);
                   $('.alert-msg').addClass("alert-success");

                },
                error: function() {

                }
            })
        })
    </script>

@endsection
