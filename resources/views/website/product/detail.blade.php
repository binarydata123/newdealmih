<style>
    @media(max-width:1050px){
.clink { 
    font-size: 14px !important;
    line-height: 18px !important; 
}

}
ul.ldisc.more ul {
    list-style: unset !important;
}
ul.ldisc ol {
    list-style: auto;
}
img.mfp-img{
    height: 500px !important;
}

</style>
 

@extends('website.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <!-- <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">


    <style>
        a[disabled="disabled"] {
            pointer-events: none;
        }

        .link-copied-success {
         padding: 20px 0;
          margin-bottom:10px;
          color:#008000;
        }

        .wishlist-add {
            padding: 10px 0 !important;
            margin-bottom: 10px !important;
        }

    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
    }
    img.nav_gakllery.w-100.h-50 {
        height: 100px !important;
    }
    .plisting li{
        margin-bottom: 10px !important;

    }
    .item-slick.slick-slide.slick-current.slick-active
        outline: none!important

    .slider-for
        margin-bottom: 15px
        img
            width: 100%
            min-height: 100%

    .slider-nav
        margin: auto
    .slider-nav
        .item-slick
            max-width: 240px
            margin-right: 15px
            outline: none!important
            cursor: pointer
            img
                max-width: 100%
                background-size: cover
                background-position: center
    .slick-arrow
        position: absolute
        top: 50%
        z-index: 50
        margin-top: -12px

    .slick-prev
        left: 0
    .slick-next
        right: 0

    // Magnific
    .mfp-zoom-out-cur, .mfp-zoom-out-cur .mfp-image-holder .mfp-close:hover
        cursor: pointer

    .mfp-container:hover
        cursor: default

    // Magnific gallery
    .image-source-link
        color: #98C3D1

    .mfp-with-zoom .mfp-container
    .mfp-with-zoom.mfp-bg
        opacity: 0
        transition: all 0.3s ease-out

    .mfp-with-zoom.mfp-ready .mfp-container
        opacity: 1
    .mfp-with-zoom.mfp-ready.mfp-bg
        opacity: 0.8

    .mfp-with-zoom.mfp-removing .mfp-container
    .mfp-with-zoom.mfp-removing.mfp-bg
        opacity: 0


    /*BLUR background*/
    *
        transition: filter .25s ease
    .mfp-wrap ~ *
        filter: blur(5px)

    .mfp-ready .mfp-figure
        opacity: 0

    .mfp-zoom-in
    /* start state */
    /* animate in */
    /* animate out */

    .mfp-zoom-in .mfp-figure, .mfp-zoom-in .mfp-iframe-holder .mfp-iframe-scaler
        opacity: 0
        transition: all 0.3s ease-out
        transform: scale(0.95)

    .mfp-zoom-in.mfp-bg
    .mfp-zoom-in .mfp-preloader
        opacity: 0
        transition: all 0.3s ease-out

    .mfp-zoom-in.mfp-image-loaded .mfp-figure, .mfp-zoom-in.mfp-ready .mfp-iframe-holder .mfp-iframe-scaler
        opacity: 1
        transform: scale(1)

    .mfp-zoom-in.mfp-ready.mfp-bg
    .mfp-zoom-in.mfp-ready .mfp-preloader
        opacity: 0.8

    .mfp-zoom-in.mfp-removing .mfp-figure, .mfp-zoom-in.mfp-removing .mfp-iframe-holder .mfp-iframe-scaler
        transform: scale(0.95)
        opacity: 0

    .mfp-zoom-in.mfp-removing.mfp-bg
    .mfp-zoom-in.mfp-removing .mfp-preloader
        opacity: 0

    .mfp-iframe-scaler
        overflow: visible
    .mfp-zoom-out-cur
        cursor: auto
    .mfp-zoom-out-cur .mfp-image-holder .mfp-close
        cursor: pointer

    </style>
@endsection
@section('content')

   

    <section id="services" class="services section-bg mt10">
        <div class="container-fluid mt30">
            <p class="fs12 mb20 ml15"><a href="{{ url('/') }}">Home</a><span
                    class="cblue">{{ \Request::getRequestUri() }}</span> </p>
            <div class="row row-sm">

 <!-------old------------>

            {{--  <div class="col-lg-6 _boxzoom">
               <div class="zoom-thumb">
                  <ul class="piclist">

                  
                  @if ($product->media)
                                @foreach ($product->media as $media)

                     <li><img src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt=""></li>

                     @endforeach
                            @endif
                     

                  </ul>
               </div>
               <div class="_product-images" align="center">
                  <div class="picZoomer detailimg" align="center">
                  @if ($product->image)
                  <img src="{{ url('public/media/product-image/' . $product->image) }}" alt="details">
                      
                  @else 

                    <img src="{{ url('public/media/product-image/' . $product->image) }}" alt="details">

                     @endif
                  </div>

                <div class="w95 fsd">

                    <div class="row">
                        <div class="col-md-6">
                            @if($product->is_auction == 1)
                                <a href="#!" class="btn btn-inline2 post-btn2" data-toggle="modal" data-target="#number"><span>Place Bid</span></a>
                            @else
                                <a href="#!" class="btn btn-inline2 post-btn2 cart" data-id="{{$product->id}}"><span>Add To Cart</span></a>
                           @endif
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('order-address?product='.$product->slug)}}" data-toggle="modal" data-target="#help" class="btn btn-inline post-btn2 fs18w"><span>Buy Now</span></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>--}}


            <!----------------->

            <div class="col-lg-6">


<!-----new----->

<div class="container">
     @if(isset($product->image))
  <div class="row">
    <div class="col-md-12 col-md-offset-3">
      
     <div class="slider-for">
        @if ($product->image)

        <a href="{{ url('public/media/product-image/' . $product->image) }}" class="item-slick"><img class="w-100 nav-single_image" src="{{ url('public/media/product-image/' . $product->image) }}" alt="Alt"></a>

        @endif
        @foreach ($product->media as $media)
        <a href="{{ url('public/media/product-multi-image/' . $media->file) }}" class="item-slick nav-single_image"><img class="w-100" src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt="Alt"></a>
        @endforeach
    </div>
    <div class="slider-nav mt-2 mb-2">
        @if ($product->image)

         <div class="item-slick mr-2"><img class="nav_gakllery w-100 h-50" src="{{ url('public/media/product-image/' . $product->image) }}" alt="Alt" ></div>

        @endif
        @foreach ($product->media as $media)
        <div class="item-slick mr-2"><img class="nav_gakllery w-100 h-50" src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt="Alt" ></div>
        @endforeach
    </div>
      
    </div>
  </div>
   @else 

    <img class="w-100 mb-4" src="{{ url('public/website/images/no-image.png') }}" alt="product">

     @endif

@if($product->is_sold != '1')
    <div class="w95 sdf add-bay">
<div class="row">
@if (Auth::check())
  @if($product->user_id != Auth::user()->id)
    @if($product->is_buynow == 2)
       @if(isset($product->is_auction))
       
      <div class="col-md-6"> <a href="javascript:void(0)" class="btn btn-inline2 post-btn2 bid-modal 1"
            data-toggle="modal"><span>Place Bid</span></a></div>
            @else
            <div class="col-md-6"> <a class="btn btn-inline2 post-btn2 cart" data-id="{{$product->id}}"
                ><span>Add To Cart</span></a></div>
            @endif
            @endif

<!-------hcopy the changes--------->
          

             <!--------copy-------->

            @if($product->is_buynow == 2)
                <div class="col-md-6"><a href="{{url('order-address?product='.$product->slug)}}" data-toggle="modal" data-target="#help" class="btn btn-inline post-btn2 fs18w"><span>Buy Now</span></a></div>
            @else
                <div class="col-md-6">
                    @if (Auth::check())
                        @if($product->user_id != Auth::user()->id)
                            @if($product->wishlist)
                                @if($product->wishlist->user_id == Auth::user()->id)
                                    <button type="button" title="Wishlist" onClick="window.location.reload();" data-id="{{ $product->id }}" class="wishlist wishlist_btn btn btn-inline post-btn2 fs18w">Remove Wishlist</button>
                                @endif
                            @else
                                <button type="button" title="Wishlist" onClick="window.location.reload();"
                                    data-id="{{ $product->id }}"
                                    class="wishlist btn btn-inline post-btn2 fs18w"> Wishlist</button>
                            @endif  
                        @endif
                    @endif
                </div>
                <!-------here the code--------->
            @endif
        @endif
    @endif
            @php
                $product_property_features_data = DB::table('product_property_features')->where('product_id', $product->id)->first();
            @endphp
      @if($product_property_features_data->youtube_url!='')
      <div class="col-12">
      <div class="mb20 mt-5" id="youtubevideo">
      <h4 class="fs20">Videos </h4>
      <?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" height=\"400px\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",$product_property_features_data->youtube_url); ?>
      </div>
  </div>
      @endif


   </div>

</div>
@endif
</div>


{{-- <div class="alert alert-msg  text-center" ></div> --}}

            
<!---------------->
</div>

                <div class="col-lg-6">
                    <div class="alert alert-msg  text-center" ></div>

                    <div class="common-card p0">
                        <div class="row">
                            <div class="col-md-6 pl15">
                                <h3 class="ad-details-title">{{ ucwords($product->title) }}
                                     <span>@if($product->type==1)
                                         <span class="s-used"> Used </span> 
                                      @else 
                                      <span class="s-success">New </span> 
                                      @endif</span>
                                      @if($product->is_sold == '1')<span style="position: absolute;background: #ff0000;margin-left: 5px;margin-top: 7px;padding: 0 15px 0 15px;line-height: 24px;color: #fff;font-size: 12px;border-radius: 3px;/*z-index: 9999 !important;*/">Sold</span>@endif
                                    </h3>
                                     <span>
                                    @php
                                    use Carbon\Carbon;
                                     $today = Carbon::now()->format('Y-m-d');
                                     $date = $product->created_at->format('Y-m-d');
                                    @endphp
                                   
                                    <span>
                                        Listing Id : #{{$product->id}} </span><br>
                                    <span style="color: #567df4;" class="">
                                     
                                        Listed date : {{$product->created_at->format('Y M d')}} 
                                     
                                        <br>    
                                        {{-- Closes: {{Carbon::parse($product->auction_end_date)->format('D d M')}} --}}
                                    </span>

                           <h5 class="fs16">Location <span class="actualp">
                            
                    @if ($product->address_one){{ $product->address_one }} @endif @if ($product->districtList) , {{ $product->districtList->district_name }} @endif @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif @if ($product->villageList) , {{ $product->villageList->name }} @endif 
                </span></h5>

                                     <span>  @if($product->auction_end_date != null) Closes : {{ Carbon::parse($product->auction_end_date)->format('d/m/Y')}} @endif  </span><br>
                                        
                                     <span>@if (isset($product->productBidPrice)) Current Bid: <span class="actualp" style="color:#444"> रू {{ number_format($product->productBidPrice->price) }}</span> @endif </span>
                            </div>


                            <div class="col-md-2">
                                
                                @if (Auth::check())
                                    @if($product->user_id != Auth::user()->id)
                                        @if($product->is_buynow == 1)
                                            <div class="product-type2">
                                                <div class="product-btn">
                                                    <button type="button" title="Wishlist" data-id="{{ $product->id }}" class="
                                                        @if ($product->wishlist) 
                                                            @if ($product->wishlist->user_id == Auth::user()->id) 
                                                                fa fa-heart wishlist fas      
                                                            @endif 
                                                        @else
                                                            fa fa-heart wishlist 
                                                        @endif">
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endif
     
                                </div>

                            <div class="col-md-3">
                                
                            <div class="alert alert-link-copied text-center" style=""></div>
                                <button  class="clink copy_link"><i class="fa fa-clone" aria-hidden="true"></i>
                                    <u>Copy Link</u></button>
 
                            </div>
                        </div>

                        <ol class="breadcrumb ad-details-breadcrumb">

                            {{-- <li class="breadcrumb-item fs18">@if ($product->category) {{ $product->category->category_name }} @endif</li> --}}
                            {{-- <li class="breadcrumb-item active fs18" aria-current="page">@if ($product->subCategory) {{ $product->subCategory->category_name }} @endif</li> --}}
                        </ol>
                        

                        @php

                        $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                        
                       @endphp
                      @if($product->subcategory)
                        @if($product->subcategory->slug == 'land')
                            @php
                                $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                                $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                            @endphp
                            @if($feature_data->data_name == 'for rent')
                                @if($product->price)<h5 class="fs16">Rent Per Month <span class="actualp"> रू {{ number_format($product->price) }}</span></h5>@endif 
                            @else
                                @if($product->price)<h5 class="fs16">Buy Now Price <span class="actualp"> रू {{ number_format($product->price) }}</span></h5>@endif
                            @endif
                        @else
                            @if($product->sub_category == 67 ||  $product->sub_category == 71 ||  $product->sub_category == 68)                       
                                @if($product->price)<h5 class="fs16">Rent Per Month <span class="actualp"> रू {{ number_format($product->price) }}</span></h5>@endif 
                            @else
                                @if($product->price)<h5 class="fs16">Buy Now Price <span class="actualp"> रू {{ number_format($product->price) }}</span></h5>@endif
                            @endif
                            @if ($product->is_auction) <h5 class="fs16 mt15">Auction Start Price <span class="aucp"> 
                                @if (isset($product->productBidPrice)) रू  {{ number_format($product->productBidPrice->price) }}
                                 @else {{ $product->auction_price }} @endif</span></h5>
                            @endif
                        @endif
                    @endif
                       

                        @if($product->delivery_charges==1) <p style="font-size: 13px; font-weight: 400; color: #17181d;">Include delivery charges if any.</p> @else <p style="font-size: 13px; font-weight: 400; color: #17181d;">Delivery charges are extra depends on location  </p>@endif
                        <div class="dbox">
                            <h4 class="fs20">Description </h4>

                            <ul class="ldisc  more">
                                @if(strlen($product->description) > 500)
                                {{substr($product->description,0,500)}}
                                <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                                <span class="read-more-content"> {{substr($product->description,500,strlen($product->description))}} 
                                <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                                @else
                                 {!!$product->description!!}
                                @endif      
                            </ul>
                            {{-- detail start  --}}

                            
                            
                            <div class="dbox">
                                <h4 class="fs20 mb10">Details </h4>
                                            
                                        {{-- {{dd($productData)}} --}}
                                      <ul class="ad-details-specific plisting">
                                        @php
                                            $product_property_features_data = DB::table('product_property_features')->where('product_id', $product->id)->first();

                                        @endphp
                                        @if($product->auction_end_date != '')
                                            <li>
                                                <h6>Auction End Date: <h6>
                                                <p>{{$product->auction_end_date}}</p>
                                            </li>
                                        @endif
                                        @if($product->feature_data_model_id != '')
                                            @php
                                                $feature_model_data = DB::table('feature_data_models')->where('id', $product->feature_data_model_id)->first();
                                            @endphp
                                            <li>
                                                <h6>Model: <h6>
                                                <p>{{$feature_model_data->model_name}}</p>
                                            </li>
                                        @endif
                                        
                                            @if($product_property_features_data != '' || $product->productDataList != '')

                                                @if($product_property_features_data->bathrooms!='')
                                                    <li>
                                                        <h6>Bathrooms: <h6>
                                                        <p>{{$product_property_features_data->bathrooms}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->listed_by!='')
                                                    <li>
                                                        <h6>Listed By: <h6>
                                                        @if($product_property_features_data->listed_by=='1')
                                                            <p>Owner</p>
                                                        @elseif($product_property_features_data->listed_by=='2')
                                                            <p>Agent</p> 
                                                        @else    
                                                            <p>Individual</p>
                                                        @endif
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->carpet_area!='')
                                                    <li>
                                                        <h6>Carpet Area: <h6>
                                                        <p>{{$product_property_features_data->carpet_area}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->facilities!='')
                                                    <li>
                                                        <h6>Facilities: <h6>
                                                        <p>{{$product_property_features_data->facilities}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->floor_no!='')
                                                    <li>
                                                        <h6>Floor No: <h6>
                                                        <p>{{$product_property_features_data->floor_no}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->facing!='')
                                                    <li>
                                                        <h6>Facing: <h6>
                                                        @if($product_property_features_data->facing=='1')
                                                            <p>North</p>
                                                        @elseif($product_property_features_data->facing=='2')
                                                            <p>East</p>
                                                        @elseif($product_property_features_data->facing=='3')
                                                            <p>West</p>
                                                        @else
                                                            <p>South</p>
                                                        @endif
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->bedrooms!='')
                                                    <li>
                                                        <h6>Bedrooms: <h6>
                                                        <p>{{$product_property_features_data->bedrooms}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->furnished!='')
                                                    <li>
                                                        <h6>Furnished: <h6>
                                                        @if($product_property_features_data->furnished == '1')
                                                            <p>Yes</p>
                                                        @else
                                                            <p>No</p>
                                                        @endif
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->car_parking!='')
                                                    <li>
                                                        <h6>Car Parking: <h6>
                                                        <p>{{$product_property_features_data->car_parking}}</p>
                                                    </li>
                                                @endif
                                                @if($product_property_features_data->project_name!='')
                                                    <li>
                                                        <h6>Project Name: <h6>
                                                        <p>{{$product_property_features_data->project_name}}</p>
                                                    </li>
                                                @endif
                                                <!-- @if($product_property_features_data->youtube_url!='')
                                                    <li>
                                                        <h6>Youtube Url: <h6>
                                                        <p style="text-transform: none;">{{$product_property_features_data->youtube_url}}</p>
                                                    </li>
                                                @endif -->
                                                <!-- @if($product_property_features_data->location!='')
                                                    <li>
                                                        <h6>Location: <h6>
                                                        <p>{{$product_property_features_data->location}}</p>
                                                    </li
                                                    >
                                                @endif -->
                                                @if($product_property_features_data->existing_flatemate!='')
                                                    <li>
                                                        <h6>Existing Flatemates: <h6>
                                                        <p>{{$product_property_features_data->existing_flatemate}}</p>
                                                    </li
                                                    >
                                                @endif
                                                @if($product_property_features_data->available_date!='')
                                                    <li>
                                                        <h6>Available Date: <h6>
                                                        <p>{{$product_property_features_data->available_date}}</p>
                                                    </li>
                                                @endif

                                                @if($product_property_features_data->land_area_unit_number!='')
                                                    <li>
                                                        <h6>Land Area: <h6>
                                                        <p>{{$product_property_features_data->land_area_unit_number}}</p><p>{{$product_property_features_data->land_area}}</p>
                                                    </li>
                                                @endif

                                               <!--  @if($product_property_features_data->land_area!='')
                                                    <li>
                                                        <h6>Land Area Type: <h6>
                                                        <p>{{$product_property_features_data->land_area}}</p>
                                                    </li>
                                                @endif -->

                                                @foreach($product->productDataList as $productData)
                                                    
                                                    @if($productData->featureData)
                                                        <li><h6>
                                                            @if($productData->featureData->feature)
                                                                {{$productData->featureData->feature->name}}
                                                            </h6>
                                                                {{--@if($productData->feature_data_text !='')
                                                                    <p>  {{$productData->feature_data_text}} </p>
                                                                @else--}}
                                                                    <p>  {{$productData->featureData->data_name}} </p>
                                                                {{--@endif--}}
                                                            @endif
                                                        </li>
                                                    @endif
                                                @endforeach
                                        @endif
                                      </ul>
                                  </div>
                            {{-- detail end  --}}
                            <!-- <div align="right">
                                <a href="#!" class="clink"> <u>See More</u></a>
                            </div> -->
                        </div>
                        <div class="common-card dbox2">
                            <h4 class="fs20">Seller Information </h4>
                         <!--mobile view--->
                            <p class="visible-xs mb30">
                                @if($product->userList)
                                    @if(($product->userList->is_business == 1 || $product->userList->is_business == 2)  && $product->userList->is_approve_store == 1)
                                        <span class="rbox fs12xs">In Trade </span>
                                        <span class="gbox fs12xs">Address Verified</span> 
                                    @elseif($product->userList->is_contacted_person == '' && $product->userList->is_business == '' && $product->userList->is_store == '' && $product->userList->active == 1)
                                        <span class="gbox fs12xs">Address Verified</span> 
                                    @elseif($product->userList->is_contacted_person == '' && $product->userList->is_business == '2' && $product->userList->is_store == '' && $product->userList->active == 1)
                                        <span class="gbox fs12xs">Address Verified</span> 
                                    @else
                                    @endif
                                @endif
                                @if(Auth::check())
                                    @if($product->user_id == Auth::user()->id)

                                    @else
                                    <span class="rbox2 fs12xs"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                    @endif
                                @else
                                    <span class="rbox2 fs12xs"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                @endif
                            </p>
                         <!--mobile view--->

                            <div class="row">
                                <div class="col-md-12" align="right">
                                <p class="lalign hidden-x">
                                    @if($product->userList)
                                        @if(($product->userList->is_business == 1 || $product->userList->is_business == 2) && $product->userList->is_approve_store == 1)
                                            <span class="rbox">In Trade </span>
                                            <span class="gbox">Address Verified</span> 
                                        @elseif($product->userList->is_contacted_person == '' && $product->userList->is_business == '' && $product->userList->is_store == '' && $product->userList->active == 1)
                                            <span class="gbox">Address Verified</span>
                                        @elseif($product->userList->is_contacted_person == '' && $product->userList->is_business == '2' && $product->userList->is_store == '' && $product->userList->active == 1)
                                        <span class="gbox fs12xs">Address Verified</span> 
                                        @else
                                        @endif
                                    @endif
                                    {{--@if($product->userList)
                                        @if($product->userList->is_business == 1 && $product->userList->is_approve_store == 1)
                                        <span class="rbox">In Trade </span>
                                       
                                        @elseif($product->userList->is_business == 2 && $product->userList->is_approve_store == 1)
                                    <span class="gbox">Address Verified</span> 
                                    @elseif($product->userList->address != null)
                                    <span class="gbox">Address Verified</span> 
                                    @endif
                                    @endif--}}

                                    @if(Auth::check())
                                        @if($product->user_id == Auth::user()->id)

                                        @else
                                        <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                        @endif
                                    @else
                                        <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                    @endif
                                   
                                 <!-- <span
                                            class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span></p> -->
                                </div>
                                <div class="col-md-3 mtm30">
                                    <!-- <a @if ($product->userList) href="{{url('store-profile/'.$product->userList->id.'/'.$product->id)}}" @endif > -->
                                        <img class="iresponsive" @if ($product->seller_image) src="{{ url('public/media/seller-image/' . $product->seller_image) }}" @else src="{{ url('public/website/images/us.png') }}" @endif alt="">
                                   <!--  </a> -->
                                </div>
                                <div class="col-md-9 mtm45">
                                    <ul class="ad-details-specific dbb">
                                        <li>
                                            <h6>Name:</h6>
                                            <p>{{ ucwords($product->seller_first_name) }}
                                                {{ ucwords($product->seller_last_name) }}</p>
                                        </li>
                                        <li>
                                            <h6>Mobile No:</h6>
                                            <p>{{ ucwords($product->seller_phone) }}</p>
                                        </li>
                                        <li>
                                            <h6>Location:</h6>
                                            @if($product->pick_up == '1')
                                            <p>Pickup from seller</p>
                                            @endif
                                            @if($product->pick_up == '2')
                                            <p>Pickup from store</p>
                                            @endif
                                        </li>
                                        <li>
                                            <h6>Pick-up Location:</h6>
                                            <p>@if ($product->districtList){{ $product->districtList->district_name }} @endif @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif</p>

                                        </li>
                                         @if (count($product->productDeliveryLocation) > 0)

                                        <li>
                                            <h6> Shipping Area:</h6>
                                           
                                            @php
                                            $count = count($product->productDeliveryLocation);
                                            $countDegrees = $count - 1;
                  
                                             @endphp
                                                @foreach($product->productDeliveryLocation  as $key=> $location)
                                                @if($location->distrctList)
                                                
                                            {{ $location->distrctList->district_name }}@if($countDegrees != $key),@endif
                                            @endif
                                            @endforeach
                                             
                                        </li>
                                        @endif
                                        <li>
                                            <h6>Payment Method:</h6>
                                            <p>Bank transfer, Cash</p>
                                        </li>

                                        <li>
                                           @if((int)$avgRating > 1)
                                        <h6><span class="pfeedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                                 <a href="{{url('store-profile',$product->userList->id)}}" class="tblack"> Rating {{number_format($avgRating,1)}}
                                 <i class="fa fa-star rating"></i> 
                                  </a>({{$reviews->count()}})
                              </span></h6> @endif
                                        </li>
                                    </ul>
                                    <div align="right" class="text-center-mobile">
                                        @php
                                            $getsellerproductscount = DB::table('products')->where('user_id', $product->user_id)->where('id', '!=', $product->id)->count();
                                        @endphp
                                        @if($getsellerproductscount > 0)
                                            <a href="{{url('/seller-products-listing', $product->user_id)}}/{{$product->id}}" class="clink" id="btn2"> <u>View Seller's other Listing</u></a>
                                        @else
                                            <p>This seller do not have other listing.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>
    </section>

    <section class="recomend-part mt20 mb40">
        <div class="container-fluid">
            <div class="row">
                @if ($similerproducts->count() > 0)
                    <div class="col-8 products-mfs24">
                        <div class="">
                            <h3 class=" mfs24">Similar Products</h3>
                        </div>
                    </div>
                @endif
                @if ($similerproducts->count() > 4)
                    <div class="col-4">
                        <div class="section-center-heading">
                            <u>
                              <a href="{{url('search/market-place')}}"> <h5>View all <i class="fas fa-arrow-right"></i> </a></h5>
                            </u>

                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 mt20">
                    <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>
                    <div class="recomend-slider slider-arrow">
                        @if ($similerproducts->count() > 0)
                            @foreach ($similerproducts as $similerproduct)
                                <div class="product-card">

                                    <div class="product-media resimg">
                                        <a href="{{ url('product/detail/' . $similerproduct->slug) }}">
                                            <div class="product-img">
                                                @if ($similerproduct->image)
                                                    <img src="{{ url('public/media/product-image/' . $similerproduct->image) }}"
                                                        alt="product">
                                                @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                        alt="product">
                                                @endif
                                            </div>
                                        </a>
                                        <div class="product-type">
                                                <div class="product-btn">
                                                    @if (Auth::check())
                                                        @if($similerproduct->user_id != Auth::user()->id)
                                                            @if($similerproduct->is_buynow == 1)
                                                                <button type="button" title="Wishlist"
                                                                    data-id="{{ $similerproduct->id }}"
                                                                    class="@if ($similerproduct->wishlist) 
                                                                    @if ($similerproduct->wishlist->user_id == Auth::user()->id) 
                                                                fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>
                                        </div>
                                    </div>

                                    @php
                                        $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                        $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();
                                    @endphp
                                    <div class="product-content">
                                        <ol class="breadcrumb product-category">
                                           @if($header_category_data->name != 'Services') 
                                            <li>
                                                <p class="product-price tblak"> रू</p>
                                            </li>
                                             @else
                                              <li>
                                                    <p class="product-price tblak">
 @php
                                                      $produstReviews = App\Models\ServiceFeedback::where('product_id',$product->id);
                                                        $reviews = $produstReviews->get();
                                                        $userCount = $reviews->count();
                                                            $avgRating = $produstReviews->avg('rating');
                                                 @endphp

                                                 <h5><span class="pfeedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                                          <a href="{{url('services-detail/'.$product->slug)}}" class="tblack"> Feedback {{number_format($avgRating,1)}}
                                          <i class="fa fa-star rating"></i> 
                                           </a>({{$reviews->count()}})
                                       </span></h5>


                                                    </p>
                                                </li>
                                             @endif
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('product/detail/' . $similerproduct->slug) }}">

                                                    @if (is_numeric($similerproduct->price)) {{ number_format($similerproduct->price) }} @endif</a></li>
                                        </ol>
                                        <div class="product-meta"><span>{{ ucwords($similerproduct->title) }}</span><br>
                                            @if($similerproduct->type == 1)
                                            <span class="s-used">Used</span>
                                            @else
                                            <span class="s-success">New</span>
                                            @endif

                                        </div>
                                        <div class="product-info">
                                            <span><i class="fas fa-map-marker-alt"></i>
                                                @if ($similerproduct->districtList)
                                                    {{ $similerproduct->districtList->district_name }} @endif
                                                {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                            </span>
                                            <div> <span>
                                                    Closes: {{ $similerproduct->created_at->addDays(30)->format('D d M') }}
                                                </span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- <div class="product-card">
                            <a href="listing-detail.html">
                                <div class="product-media">
                                    <div class="product-img"><img
                                            src="{{ url('public/website/images/product/03.jpg') }}" alt="product"></div>

                                    <div class="product-type">
                                        <div class="product-btn">
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li>
                                        <p class="product-price tblak"> रू</p>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> 10,000</a></li>
                                </ol>
                                <div class="product-meta"><span>Royal Enfield (Blue Color)</span><br>
                                    <span class="s-used">Used</span>
                                </div>
                                <div class="product-info">
                                    <span><i class="fas fa-map-marker-alt"></i> Austin, Texas</span>
                                    <div> <span> Closes: Mon, 19 July</span></div>
                                </div>
                            </div>
                        </div> --}}


                        {{-- <div class="product-card">
                            <a href="listing-detail.html">
                                <div class="product-media">
                                    <div class="product-img"><img
                                            src="{{ url('public/website/images/product/04.jpg') }}" alt="product"></div>

                                    <div class="product-type">
                                        <div class="product-btn">
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li>
                                        <p class="product-price tblak"> रू</p>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> 10,000</a></li>

                                </ol>

                                <div class="product-meta"><span>Royal Enfield (Blue Color)</span><br>
                                    <span class="s-success">Brand new</span>
                                </div>
                                <div class="product-info">
                                    <span><i class="fas fa-map-marker-alt"></i> Austin, Texas</span>
                                    <div> <span> Closes: Mon, 19 July</span></div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="product-card">
                            <a href="listing-detail.html">
                                <div class="product-media">
                                    <div class="product-img"><img
                                            src="{{ url('public/website/images/product/05.jpg') }}" alt="product"></div>
                                    <div class="product-type">
                                        <div class="product-btn">
                                            <button type="button" title="Wishlist" class="far fa-heart"></button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="product-content">
                                <ol class="breadcrumb product-category">
                                    <li>
                                        <p class="product-price tblak"> रू</p>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"> 10,000</a></li>

                                </ol>

                                <div class="product-meta"><span>Royal Enfield (Blue Color)</span><br>
                                    <span class="s-success">Brand new</span>
                                </div>
                                <div class="product-info">
                                    <span><i class="fas fa-map-marker-alt"></i> Austin, Texas</span>
                                    <div> <span> Closes: Mon, 19 July</span></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- bid popup --}}
    <div class="modal fade" id="number">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p15">
                <div class="modal-header noh">
                    <h4 class="mfs24">Place a bid</h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body sdfsdf">
                    <div class="row row-sm">
                        <div class="col-lg-4">
                            <div class="_product-images" align="center">
                                <div align="center">
                                    @if ($product->image)
                                        <img class="iresponsive bshadow"
                                            src="{{ url('public/media/product-image/' . $product->image) }}" alt="">
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="common-card p0">
                                <div>
                                    <h3 class="ad-details-title">{{ ucwords($product->title) }}  
                                        @if($product->type==1) <span
                                            class="s-used">Used</span>
                                            @else 
                                            <span class="s-success">New</span>
                                            @endif
                                    </h3>
                                </div>
                                <ol class="breadcrumb ad-details-breadcrumb">
                                    <li class="breadcrumb-item fs18">@if ($product->category) {{ $product->category->category_name }} @endif</li>
                                     <li class="breadcrumb-item active fs18" aria-current="page">@if ($product->subCategory) {{ $product->subCategory->category_name }} @endif
                                    </li> 
                                </ol>
                                @if($product->price) <h5 class="fs16">Buy Now Price <span class="actualp"> रू
                                        {{ number_format($product->price) }}</span></h5> @endif

                                <h5 class="fs16 mt15">Current Bid <span class="aucp ml35"> रू
                                        @if (isset($product->productBidPrice)) {{ number_format($product->productBidPrice->price) }} @else {{ $product->auction_price }} @endif</span></h5>

                                <div class="dbox mt0">
                                    <h4 class="mfs14">Current bid made by people for this product is<span
                                            class="fwbl"> रू

                                            @if ($product->productBidPrice) {{ $product->productBidPrice->price }} @endif</span> </h4>
                                    <form>
                                        <fieldset>
                                            <legend>Your Bid</legend>
                                            {{-- <p class="mfs14b">रू 50,000</p> --}}
                                            <input type="text" value="{{ $product->id }}" class="product_id" hidden>

                                            <input type="text" class="mfs14b bid_price">
                                            <div align="right"> <span class="error"
                                                    style="color: red;font-size:12px;"></span> </div>
                                        </fieldset>
                                    </form>

                                    <div align="right">
                                        <a href="#!" data-toggle="modal" data-target="#bidhistory"
                                            class="fs14blu">View Bid history</a>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="row ml20">
                        <div class="col-md-6">
                            <p class="mfs20">Choose a shipping option</p>
                            @if ($product->pick_up == 2)
                                <div class="product-info text-cont pl0">
                                    <ol class="breadcrumb product-category">
                                        <h5 class="product-title"><input type="radio" checked=""> <a href="#"
                                                class="ffs16 ml10">
                                                Free Shipping all over Nepal</a></h5>
                                    </ol>
                                </div>
                            @endif
                            @if ($product->pick_up == 1)
                                <div class="product-info text-cont pl0">
                                    <ol class="breadcrumb product-category">
                                        <h5 class="product-title"><input type="radio" checked=""> <a href="#"
                                                class="ffs16 ml10"> I
                                                intend to pickup</a></h5>
                                    </ol>
                                </div>

                                @if ($product->userDetails)

                                    @if ($product->userDetails->userMuncipality)

                                        <p class="mfs14l pl25">Seller is located in
                                            {{ $product->userDetails->userMuncipality->municipality_name }}, Nepal</p>
                                    @endif
                                @endif
                            @endif


                            <div>
                            <p class="mfs20">Reminders</p>
                            <div class="product-info text-cont pl0">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title"><input type="checkbox"> <a href="#" class="ffs16 pl0">
                                            Email me if I’m Outbid</a></h5>
                                </ol>
                            </div>
                        </div>


                        </div>
                        <div class="col-md-6">
                            <p class="mfs20">Seller accepts payment by</p>
                            <div class="product-info text-cont pl0">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title"> <a href="#" class="ffs16 pl0">
                                            Bank Transfer , Cash</a></h5>
                                </ol>
                            </div>
                            <p class="mfs14l pl0">If you win, you are legally obligated to complete your purchase</p>
                        </div>
                        <!-- <div class="col-md-12 mt30">
                            <p class="mfs20">Reminders</p>
                            <div class="product-info text-cont pl0">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title"><input type="checkbox"> <a href="#" class="ffs16 pl0">
                                            Email me if I’m Outbid</a></h5>
                                </ol>
                            </div>
                        </div> -->
                        </div>
                        <div class="w95 pl25">
                            <div class="row">
                                <div class="col-md-4"><a href="#!"
                                        class="btn btn-inline post-btn2 fs18w place-bid"><span>Place Bid</span></a></div>
                                <div class="col-md-4"> <a href="{{ url('/') }}"
                                        class="btn btn-inline2 post-btn2"><span>Go back to Listing</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="currency">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Choose a Currency</h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body 2"><button class="modal-link active">United States Doller (USD) -
                        $</button><button class="modal-link">Euro (EUR) - €</button><button
                        class="modal-link">British Pound (GBP) -
                        £</button><button class="modal-link">Australian Dollar (AUD) - A$</button><button
                        class="modal-link">Canadian Dollar (CAD) - C$</button></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bidhistory">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body 4" align="center">
                    <h4 class="mfs24">Bid history<br>@if ($product->productBid) ({{ $product->productBid->count() }} @endif bids , showing latest 10 )</h4>
                    <table class="table mt20">
                        <tbody>
                            @if ($product->productBidLatest)
                                @foreach ($product->productBidLatest as $productBid)
                                    <tr>
                                        <td>@if ($productBid->bidUser) {{ $productBid->bidUser->email[0] }} *****@*** @endif</td>
                                        <td><strong>$ {{ number_format($productBid->price) }}</strong></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="language">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body 5" align="center">
                    <h4 class="mfs24">Bid Successfully Placed</h4>
                    <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10">
                    <div class="col-md-10"> <a href="{{ url('/') }}" class="btn btn-inline2 post-btn2"><span>Go
                                back to Listing</span></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="price_error">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body 6" align="center">
                    <h4 class="" style="color:#FF0000;padding-top:20px;padding-bottom:40px;">The amount you bid is lesser than actual amount!</h4>
                    {{-- <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10"> --}}
                        {{-- <div class="col-md-10"> <a href="{{ url('/') }}" class="btn btn-inline2 post-btn2"><span>Go
                                    back to Listing</span></a></div> --}}
                </div>
            </div>
        </div>
    </div>
    @php
        function getUserIP()
        {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }
            return $ip;
        }
        //$user_ip = getUserIP();
    @endphp
    <div class="modal fade" id="help">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div align="center">
                        <h4 class="nfs22">Choose Checkout</h4>
                    </div>
                    <div class="mtb30 ml15">
                        @if($product->delivery_service == 'yes')
                            <div class="mb20">
                                <input type="radio" id="age1" name="age" value="checkout_delivery" checked>
                                <input type="hidden" id="product_slug" value="{{$product->slug}}" checked>
                                <label for="age1">
                                    <p class="fs18l3"> Checkout for Delivery</p>
                                </label>
                            </div>
                        @else
                        <div class="mb20">
                            <input type="radio" id="age2" name="age" value="pickup_store_seller" checked>
                             <input type="hidden" id="product_slug" value="{{$product->slug}}" checked>
                            <label for="age2">
                                <p class="fs18l3"> Pickup from store /Seller</p>
                            </label>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-12"><a href="#" class="btn btn-inline post-btn2 fs18w w100 mb20 order_btn"><span>Submit</span></a></div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="user_name" class="user_name" value="@if(Auth::check()) {{Auth::user()->id}}@endif" id="">
    <input type="hidden" name="user_id" class="user_id" value="@if(Auth::check()) {{Auth::user()->id}}@endif" id="hd_user_id">
    <input type="hidden" name="product_id" class="product_id" value="{{$product->id}}" id="hd_product_id">
    <input type="hidden" name="product_owner_id" class="product_owner_id" value="{{$product->user_id}}" id="hd_product_owner_id">
    <input type="hidden" name="user_ip_address" class="user_ip_address" value="{{getUserIP()}}" id="hd_user_ip_address">
@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script> -->
    <script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".order_btn").click(function(){
                var radioValue = $("input[name='age']:checked").val();
                var product_slug = $("#product_slug").val();
                if(radioValue == 'checkout_delivery'){

                    $(".order_btn").attr("href", base_url+'order-address/delivery/'+product_slug);

                } else {

                    $(".order_btn").attr("href", base_url+'order-summary/delivery/'+product_slug);
                }
            });
            var user_id = $('#hd_user_id').val();
            var hd_product_id = $('#hd_product_id').val();
            var hd_product_owner_id = $('#hd_product_owner_id').val();
            var hd_user_ip_address = $('#hd_user_ip_address').val();
            $.ajax({
                type: "post",
                url: base_url + "save-product-visitor-history",
                data: {
                    user_id: user_id,
                    product_id: hd_product_id,
                    product_owner_id: hd_product_owner_id,
                    user_ip_address: hd_user_ip_address
                },
                success: function(res) {
                   
                }
            })
        });
    </script>
    <script type="text/javascript">
    
        $(function() { 
        // Card's slider
          var $carousel = $('.slider-for');

          $carousel
            .slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              fade: true,
                 autoplay:true,
                autoplaySpeed:1500,
              // adaptiveHeight: true,
              asNavFor: '.slider-nav'
            })
            .magnificPopup({
              type: 'image',
              delegate: 'a:not(.slick-cloned)',
              closeOnContentClick: false,
              tLoading: 'Загрузка...',
              mainClass: 'mfp-zoom-in mfp-img-mobile',
              image: {
                verticalFit: true,
                tError: '<a href="%url%">Фото #%curr%</a> не загрузилось.'
              },
              gallery: {
                enabled: true,
                navigateByImgClick: true,
                tCounter: '<span class="mfp-counter">%curr% из %total%</span>', // markup of counte
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
              },
              zoom: {
                enabled: true,
                duration: 300
              },
              removalDelay: 300, //delay removal by X to allow out-animation
              callbacks: {
                open: function() {
                  //overwrite default prev + next function. Add timeout for css3 crossfade animation
                  $.magnificPopup.instance.next = function() {
                    var self = this;
                    self.wrap.removeClass('mfp-image-loaded');
                    setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
                  };
                  $.magnificPopup.instance.prev = function() {
                    var self = this;
                    self.wrap.removeClass('mfp-image-loaded');
                    setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
                  };
                  var current = $carousel.slick('slickCurrentSlide');
                  $carousel.magnificPopup('goTo', current);
                },
                imageLoadComplete: function() {
                  var self = this;
                  setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
                },
                beforeClose: function() {
                  $carousel.slick('slickGoTo', parseInt(this.index));
                }
              }
            });
          $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
             arrows: false,
           
          });
          
          
        });

</script>
    

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
                   $('.wishlist_btn').html(res[1]);
                   $('.alert-msg').addClass("alert-success");
                   $('.alert-msg').addClass("wishlist-add");

                },
                error: function() {

                }
            })
        })

new Clipboard('.copy_link', {
text: function() {
   return window.location.href;

  }

});

$(".copy_link").click(function(){
$('.alert-link-copied').html("Link copied");
$('.alert-link-copied').addClass("link-copied-success");
})

// cart 

   $('.cart').on('click', function () {
  var product = $(this).data('id');

  // alert(product)

  $.ajax({
    type: "post",
    url: base_url + "cart/cartadd",
    data: {
      product: product
    },
    success: function (data) {
      if(data.status == true)
        {
          window.location.href=base_url+"cart";
        }
    },
    error: function (data) {

    }
  })
})

</script>
{{-- read more description  --}}
<script>
       $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show').on('click', function(e) {
            
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });
            // show bid model 
         $('.bid-modal').on('click', function()
         {
             var user = $('.user_name').val();
            // alert(user);
            if(user)
            {
                $('#number').modal('show');
            }
            else
         {
             window.location.href = base_url + 'login';
         }
         });
</script>


@endsection
