@extends('website.layout.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
<link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

<style>
    a[disabled="disabled"] {
        pointer-events: none;
    }

    .link-copied-success {
        padding: 20px 0;
        margin-bottom: 10px;
        color: #008000;
    }

    .read-more-show {
        cursor: pointer;
        color: #ed8323;
    }

    .read-more-hide {
        cursor: pointer;
        color: #ed8323;
    }

    .hide_content {
        display: none;
    }

    img.nav_gakllery.w-100.h-50 {
        height: 100px !important;
    }

    .item-slick.slick-slide.slick-current.slick-active outline: none !important .slider-for margin-bottom: 15px img width: 100% min-height: 100% .slider-nav margin: auto .slider-nav .item-slick max-width: 240px margin-right: 15px outline: none !important cursor: pointer img max-width: 100% background-size: cover background-position: center .slick-arrow position: absolute top: 50% z-index: 50 margin-top: -12px .slick-prev left: 0 .slick-next right: 0 // Magnific
    .mfp-zoom-out-cur,
    .mfp-zoom-out-cur .mfp-image-holder .mfp-close:hover cursor: pointer .mfp-container:hover cursor: default // Magnific gallery
    .image-source-link color: #98C3D1 .mfp-with-zoom .mfp-container .mfp-with-zoom.mfp-bg opacity: 0 transition: all 0.3s ease-out .mfp-with-zoom.mfp-ready .mfp-container opacity: 1 .mfp-with-zoom.mfp-ready.mfp-bg opacity: 0.8 .mfp-with-zoom.mfp-removing .mfp-container .mfp-with-zoom.mfp-removing.mfp-bg opacity: 0
    /*BLUR background*/
    * transition: filter .25s ease .mfp-wrap~* filter: blur(5px) .mfp-ready .mfp-figure opacity: 0 .mfp-zoom-in
    /* start state */
    /* animate in */
    /* animate out */

    .mfp-zoom-in .mfp-figure,
    .mfp-zoom-in .mfp-iframe-holder .mfp-iframe-scaler opacity: 0 transition: all 0.3s ease-out transform: scale(0.95) .mfp-zoom-in.mfp-bg .mfp-zoom-in .mfp-preloader opacity: 0 transition: all 0.3s ease-out .mfp-zoom-in.mfp-image-loaded .mfp-figure,
    .mfp-zoom-in.mfp-ready .mfp-iframe-holder .mfp-iframe-scaler opacity: 1 transform: scale(1) .mfp-zoom-in.mfp-ready.mfp-bg .mfp-zoom-in.mfp-ready .mfp-preloader opacity: 0.8 .mfp-zoom-in.mfp-removing .mfp-figure,
    .mfp-zoom-in.mfp-removing .mfp-iframe-holder .mfp-iframe-scaler transform: scale(0.95) opacity: 0 .mfp-zoom-in.mfp-removing.mfp-bg .mfp-zoom-in.mfp-removing .mfp-preloader opacity: 0 .mfp-iframe-scaler overflow: visible .mfp-zoom-out-cur cursor: auto .mfp-zoom-out-cur .mfp-image-holder .mfp-close cursor: pointer
</style>
@endsection
@section('content')


<!-------new------------>
<section id="services" class="services section-bg mt10">
    <div class="container-fluid mt60">
        <p class="fs12 mb20 ml15"><a href="{{ url('/') }}">Home</a><span class="cblue">{{ \Request::getRequestUri() }}</span> </p>

        <div class="row row-sm">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>
            </div>
        </div>

        <div class="row row-sm">

            <div class="col-lg-6">

                <div class="container">
                    @if(isset($property->image))
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">

                            <div class="slider-for">
                                @if ($property->image)

                                <a href="{{ url('public/media/product-image/' . $property->image) }}" class="item-slick"><img class="w-100 nav-single_image" src="{{ url('public/media/product-image/' . $property->image) }}" alt="Alt"></a>

                                @endif
                                @foreach ($property->media as $media)
                                <a href="{{ url('public/media/product-multi-image/' . $media->file) }}" class="item-slick nav-single_image"><img class="w-100" src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt="Alt"></a>
                                @endforeach
                            </div>
                            <div class="slider-nav mt-2 mb-2">
                                @if ($property->image)

                                <div class="item-slick mr-2"><img class="nav_gakllery w-100 h-50" src="{{ url('public/media/product-image/' . $property->image) }}" alt="Alt"></div>

                                @endif
                                @foreach ($property->media as $media)
                                <div class="item-slick mr-2"><img class="nav_gakllery w-100 h-50" src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt="Alt"></div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    @else

                    <img class="w-100 mb-4" src="{{ url('public/website/images/no-image.png') }}" alt="product">

                    @endif

                    <div class="w95">
                        <div class="row">
                        @if (Auth::check())
                          @if($property->user_id != Auth::user()->id)
                            @if($property->is_auction)
                            <div class="col-md-6"> <a class="btn btn-inline2 post-btn2 bid-modal" data-toggle="modal"><span>Place Bid</span></a></div>
                            @else
                            <div class="col-md-6">
                               
                                    @if($property->user_id != Auth::user()->id)
                                        @if($property->wishlist)
                                            @if($property->wishlist->user_id == Auth::user()->id)
                                                <button type="button" title="Wishlist" data-id="{{ $property->id }}" class="wishlist btn btn-inline2 post-btn2">Wishlist</button>
                                            @endif
                                        @else
                                            <button type="button" title="Wishlist" data-id="{{ $property->id }}" class="wishlist btn btn-inline2 post-btn2">Wishlist</button>
                                        @endif
                                    @endif
                                
                            </div>
                            @endif
                            <div class="col-md-6"><a href="{{ url('messages?type='.$slug) }}" class="btn btn-inline post-btn2 fs18w"><span>
                                        Contact Owner</span></a></div>
                                    @endif
                             @endif
                        </div>
                    </div>

                    <div class="dbox">
                        <h4 class="fs20">Description </h4>
                        <ul class="ldisc  more">
                            @if(strlen($property->description) > 500)
                            {{substr($property->description,0,500)}}
                            <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                            <span class="read-more-content"> {{substr($property->description,500,strlen($property->description))}}
                                <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                            @else
                            {{$property->description}}
                            @endif


                        </ul>
                        {{-- <div align="right">
                <button class="clink" data-toggle="collapse" data-target="#smore"><u>See More</u></button>

   </div> --}}
                    </div>

                    @if($features->youtube_url)
                    <div class="mb20 mt-5" id="youtubevideo">
                        <h4 class="fs20">Videos </h4>
                        <?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"100%\" height=\"400px\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>", $features->youtube_url); ?>
                    </div>

                    @endif


                </div>

            </div>



            <div class="col-lg-6 sdfsd">
                <div class="common-card p0">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="ad-details-title">{{ucwords($property->title)}}</h3>
                        </div>

                        <div class="col-md-3">
                            <div class="alert alert-link-copied text-center" style=""></div>

                            <button class="clink copy_link"><i class="fa fa-clone" aria-hidden="true"></i> <u>Copy Link</u></button>
                        </div>
                    </div>
                    <span class="fs16">
                        @php
                        use Carbon\Carbon;
                        $today = Carbon::now()->format('Y-m-d');
                        $date = $property->created_at->format('Y-m-d');
                        @endphp
                        Listing Id : #{{$property->id}} </span><br>
                    <span class="fs16" style="color: #567df4;">
                        @if($date == $today) Listed Today @else
                        Listed date : {{$property->created_at->format('Y M d')}} @endif <br>
                        {{-- Closes: {{Carbon::parse($product->auction_end_date)->format('D d M')}} --}}
                    </span>

                    <h5 class="fs16">Location <span class="actualp">

                            @if ($property->address_one){{ $property->address_one }} @endif @if ($property->districtList) , {{ $property->districtList->district_name }} @endif @if ($property->municipalityList) , {{ $property->municipalityList->municipality_name }} @endif @if ($property->villageList) , {{ $property->villageList->name }} @endif
                        </span></h5>


                    @if($property->subcategory)
                      @if($property->subcategory->slug == 'land')
                         @php
                            $product_data = DB::table('product_datas')->where('product_id', $property->id)->first();
                            $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                        @endphp
                        @if($feature_data->data_name == 'for rent')
                            @if($property->price)<h5 class="fs16">Rent Per Month <span class="actualp"> रू {{ number_format($property->price) }}</span></h5>@endif
                        @else
                        @if($property->price)<h5 class="fs16">Buy Now Price <span class="actualp"> रू {{ number_format($property->price) }}</span></h5>@endif
                        @endif
                    @else
                       @if($property->sub_category == 67 || $property->sub_category == 71 || $property->sub_category == 68)
                          @if($property->price)<h5 class="fs16">Rent Per Month <span class="actualp"> रू {{ number_format($property->price) }}</span></h5>@endif
                    @else
                       @if($property->price)<h5 class="fs16">Buy Now Price <span class="actualp"> रू {{ number_format($property->price) }}</span></h5>@endif
                    @endif
                       @if ($property->is_auction) <h5 class="fs16 mt15">Auction Start Price <span class="aucp">
                         @if (isset($property->productBidPrice)) रू {{ number_format($property->productBidPrice->price) }}
                           @else {{ $property->auction_price }} @endif</span></h5>
                    @endif
                 @endif
            @endif

                    <div class="dbox">
                        <input type="hidden" name="url" value="{{ url()->previous() }}">

                        <h4 class="fs20 mb10">Details </h4>

                        <ul class="ad-details-specific plisting">

                            <!-- <li><h6>Type</h6><p>@if(isset($features->property_type))
                              @if($features->property_type ==1){{"Appartments"}}@endif
                              @if($features->property_type ==2){{"Builder Floor"}}@endif
                              @if($features->property_type ==3){{"Farm House"}}@endif
                              @if($features->property_type ==4){{"Houses & Villas"}}@endif
                              @if($features->property_type ==5){{"Hostel"}}@endif
                              @if($features->property_type ==6){{"PG & Guest house"}}@endif
                              @if($features->property_type ==6){{"PG & Guest house"}}@endif
                              @endif</p></li> -->
                            @if($property->category_id != 326)    
                            @if($property->category_id != 69 && $property->subCategory->category_name != 'Flat or room mates')
                            <li>
                                <h6>Land Area</h6>
                                <p> @if(isset($features->land_area_unit_number)){{$features->land_area_unit_number}}@endif</p>
                                <p>@if(isset($features->land_area)){{$features->land_area }}@endif</p>
                            </li>
                            @endif
                            @if($property->subCategory->category_name != 'Land ')
                            <li>
                                <h6>Bathrooms</h6>
                                <p>@if(isset($features->bathrooms)){{$features->bathrooms}}@endif</p>
                            </li>
                            <li>
                                <h6>Listed by</h6>
                                <p>@if(isset($features->listed_by))
                                     @if($features->listed_by ==1) Owner @endif
                                     @if($features->listed_by ==2) Agent @endif
                                     @if($features->listed_by ==3) Individual @endif
                                  @endif</p>
                            </li>
                             <li>
                                <h6>Carpet Area </h6>
                                <p>@if(isset($features->carpet_area)){{$features->carpet_area}}@endif</p>
                            </li>
                             @if($property->category_id != 69)
                            <li>
                                <h6>Bedrooms</h6>
                                <p>@if(isset($features->bedrooms)){{$features->bedrooms}}@endif</p>
                            </li>
                            @endif
                            <li>
                                <h6>Furnished</h6>
                                <p>@if(isset($features->furnished))
                                     @if($features->furnished ==1)Yes @endif
                                     @if($features->furnished ==2)No @endif
                                  @endif</p>
                            </li>
                            <li>
                                <h6>Floor No </h6>
                                <p>@if(isset($features->floor_no)){{$features->floor_no}}@endif</p>
                            </li>
                            <li>
                                <h6>Parking </h6>
                                <p>@if(isset($features->car_parking)){{$features->car_parking}}@endif</p>
                            </li>
                            @endif
                            <li>
                                <h6>Project Name </h6>
                                <p> @if(isset($features->project_name)){{$features->project_name}}@endif</p>
                            </li>
                            <li>
                                <h6>Facilities </h6>
                                <p> @if(isset($features->facilities)){{$features->facilities}}@endif</p>
                            </li>
                            <li>
                                <h6>Facing </h6>
                                <p> @if(isset($features->facing))
                                    @if($features->facing ==1)North @endif
                                    @if($features->facing ==2)East @endif
                                    @if($features->facing ==3)West @endif
                                    @if($features->facing ==4) South @endif
                                    @endif</p>
                            </li>

                            <!-- @if($features->land_area_unit_number !='')
                                                    <li>
                                                        <h6>Land Area Unit No: <h6>
                                                        <p>{{$features->land_area_unit_number}}</p>
                                                    </li>
                                                @endif -->

                            <!-- <li><h6>Listed by</h6><p>@if(isset($features->listed_by))
                                  @if($features->listed_by ==1) Owner @endif
                                  @if($features->listed_by ==2) Agent @endif
                                  @endif</p></li> -->

                            <!--  @if(isset($features->youtube_url)) 
                              <li><h6 style="margin-right: 5px ;">Youtube </h6><a href="@if(isset($features->youtube_url)) #youtubevideo @endif">Click Here</a></li>
                        
                          
                          @endif -->
                            <!--   @if($features->location!='')
                                                <li>
                                                    <h6>Location: <h6>
                                                    <p>{{$features->location}}</p>
                                                </li>
                                            @endif
                                              -->

                            @if($features->available_date!='')
                            <li>
                                <h6>Available Date: <h6>
                                        <p>{{$features->available_date}}</p>
                            </li>
                            @endif

                            @if($features->existing_flatemate!='')
                            <li>
                                <h6>Existing Flatemates: <h6>
                                        <p>{{$features->existing_flatemate}}</p>
                            </li>
                            @endif

                            <!-- @foreach($property->productDataList as $productData)
                            
                            @if($productData->featureData)
                            <li>
                                <h6>
                                    @if($productData->featureData->feature)
                                    {{$productData->featureData->feature->name}}
                                </h6>
                                @if($productData->feature_data_text !='')
                                <p> {{$productData->feature_data_text}} </p>
                                @else
                                <p> {{$productData->featureData->data_name}} </p>
                                @endif
                                @endif
                            </li>
                            @endif
                            @endforeach
 -->
                        @endif
                        </ul>
                    </div>
                    <div class="common-card dbox2">
                        <h4 class="fs20">Seller Information </h4>

                        <!--mobile view--->
                        <p class="visible-xs mb30">
                            @if($property->userList)
                            @if($property->userList->is_business == 1 && $property->userList->is_approve_store == 1)
                            <span class="gbox fs12xs">Address Verified</span>
                            <span class="rbox fs12xs">In Trade</span>
                            @elseif($property->userList->is_contacted_person == '' && $property->userList->is_business == '' && $property->userList->is_store == '' && $property->userList->active == 1)
                            <span class="gbox fs12xs">Address Verified</span>
                            @elseif($property->userList->is_contacted_person == '' && $property->userList->is_business == '2' && $property->userList->is_store == '' && $property->userList->active == 1)
                            <span class="gbox fs12xs">Address Verified</span>
                            @else
                            @endif
                            @endif
                            @if(Auth::check())
                            @if($property->user_id == Auth::user()->id)

                            @else
                            <span class="rbox2 fs12xs"><a href="#!" class="twhite"> Message Seller</a></span>
                            @endif
                            @else
                            <span class="rbox2 fs12xs"><a href="#!" class="twhite"> Message Seller</a></span>
                            @endif
                            <!-- <span class="rbox2 fs12xs"><a href="#!" class="twhite">Message Seller</a></span> -->
                            <!-- <span class="gbox fs12xs">Address Verified</span> 
                        <span class="rbox fs12xs">In Trade</span>
                        <span class="rbox2 fs12xs"><a href="#!" class="twhite">Message Seller</a></span> -->
                        </p>
                        <!--mobile view--->

                        <div class="row">
                            <div class="col-md-12" align="right">
                                <p class="lalign hidden-x">
                                    @if($property->userList)
                                    @if($property->userList->is_business == 1 && $property->userList->is_approve_store == 1)
                                    <span class="gbox">Address Verified</span>
                                    <span class="rbox">In Trade</span>
                                    @elseif($property->userList->is_contacted_person == '' && $property->userList->is_business == '' && $property->userList->is_store == '' && $property->userList->active == 1)
                                    <span class="gbox fs12xs">Address Verified</span>
                                    @elseif($property->userList->is_contacted_person == '' && $property->userList->is_business == '2' && $property->userList->is_store == '' && $property->userList->active == 1)
                                    <span class="gbox fs12xs">Address Verified</span>
                                    @else

                                    @endif
                                    @endif
                                    @if(Auth::check())
                                    @if($property->user_id == Auth::user()->id)

                                    @else
                                    <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                    @endif
                                    @else
                                    <span class="rbox2"><a href="{{ url('messages?type='.$slug) }}" class="twhite"> Message Seller</a></span>
                                    @endif
                                    <!-- <span class="rbox2"><a href="#!" class="twhite">Message Seller</a></span> -->
                                    <!-- <span class="gbox">Address Verified</span> 
                                <span class="rbox">In Trade</span>
                                <span class="rbox2"><a href="#!" class="twhite">Message Seller</a></span> -->
                                </p>



                            </div>
                            <div class="col-md-3 mtm30">
                                <img class="iresponsive" src="{{url('public/website/images/us.png')}}" alt="">
                            </div>
                            <div class="col-md-9 mtm45">
                                <ul class="ad-details-specific dbb">
                                    <li>
                                        <h6>Name:</h6>
                                        <p>@if($property->seller_first_name){{$property->seller_first_name}}@endif @if($property->seller_last_name){{$property->seller_last_name}}@endif</p>
                                    </li>
                                    <li>
                                        <h6>Mobile No:</h6>
                                        <p>@if($property->seller_phone){{$property->seller_phone}}@endif</p>
                                    </li>
                                    <li>
                                        <h6>Location:</h6>
                                        <p>@if ($property->districtList){{ $property->districtList->district_name }} @endif @if ($property->municipalityList) , {{ $property->municipalityList->municipality_name }} @endif</p>
                                    </li>
                                    {{-- <li>
                                 <h6>Pick-up Location:</h6>
                                 <p>Pickup from seller location</p>
                              </li>
                              <li>
                                 <h6> Shipping Area:</h6>
                                 <p>All Over Nepal</p>
                              </li> --}}
                                    <li>
                                        <h6>Payment Method:</h6>
                                        <p>Bank transfer, Cash</p>
                                    </li>

                                    <li>
                                        @if((int)$avgRating > 1)
                                        <h6><span class="pfeedback">@if((int)$avgRating >= 3) positive @endif</span> <span>
                                                <a href="{{url('store-profile',$product->userList->id)}}" class="tblack"> Rating {{number_format($avgRating,1)}}
                                                    <i class="fa fa-star rating"></i>
                                                </a>({{$reviews->count()}})
                                            </span></h6> @endif
                                    </li>


                                </ul>
                                <div align="right">
                                    <a href="{{url('store-profile',$property->userList->id)}}" class="clink mt20"> <u>View Seller's other Listing</u></a>
                                </div>
                            </div>
                        </div>


                    </div>

                    @if($property->location)
                    <div class="mb20">
                        <h4 class="fs20">Map View </h4>
                        @php
                        $lat = $property->longitude;
                        $lat = $property->latitude;

                        @endphp
                        <iframe src="https://maps.google.com/maps?q={{$features->latitude}},{{$features->longitude}}&hl=es;z=14&amp;output=embed" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="number">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p15">
            <div class="modal-header noh">
                <h4 class="mfs24">Place a bid</h4>
                <button class="fas fa-times" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row row-sm">
                    <div class="col-lg-4">
                        <div class="_product-images" align="center">
                            <div align="center">
                                @if ($property->image)
                                <img class="iresponsive bshadow" src="{{ url('public/media/product-image/' . $property->image) }}" alt="">
                                @else
                                 <img class="w-100 mb-4" src="{{ url('public/website/images/no-image.png') }}" alt="product">
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="common-card p0">
                            <div>
                                <h3 class="ad-details-title">{{ ucwords($property->title) }}
                                    @if($property->type==1) <span class="s-used">Used</span>
                                    @else
                                    <span class="s-success">New</span>
                                    @endif
                                </h3>
                            </div>
                            <ol class="breadcrumb ad-details-breadcrumb">
                                <li class="breadcrumb-item fs18">@if ($property->category) {{ $property->category->category_name }} @endif</li>
                                <li class="breadcrumb-item active fs18" aria-current="page">@if ($property->subCategory) {{ $property->subCategory->category_name }} @endif
                                </li>
                            </ol>
                            <h5 class="fs16">Buy Now Price <span class="actualp"> रू
                                    {{ number_format($property->price) }}</span></h5>

                            <h5 class="fs16 mt15">Current Bid <span class="aucp ml35"> रू
                                    @if (isset($property->productBidPrice)) {{ number_format($property->productBidPrice->price) }} @else {{ $property->auction_price }} @endif</span></h5>

                            <div class="dbox mt0">
                                <h4 class="mfs14">Current bid made by people for this product is<span class="fwbl"> रू

                                        @if ($property->productBidPrice) {{ $property->productBidPrice->price }} @endif</span> </h4>
                                <form>
                                    <fieldset>
                                        <legend>Your Bid</legend>
                                        {{-- <p class="mfs14b">रू 50,000</p> --}}
                                        <input type="text" value="{{ $property->id }}" class="product_id" hidden>

                                        <input type="text" class="mfs14b bid_price">
                                        <div align="right"> <span class="error" style="color: red;font-size:12px;"></span> </div>
                                    </fieldset>
                                </form>

                                <div align="right">
                                    <a href="#!" data-toggle="modal" data-target="#bidhistory" class="fs14blu">View Bid history</a>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="row ml20">
                        <div class="col-md-6">
                            <p class="mfs20">Choose a shipping option</p>
                            @if ($property->pick_up == 2)
                            <div class="product-info text-cont pl0">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title"><input type="radio" checked=""> <a href="#" class="ffs16 ml10">
                                            Free Shipping all over Nepal</a></h5>
                                </ol>
                            </div>
                            @endif
                            @if ($property->pick_up == 1)
                            <div class="product-info text-cont pl0">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title"><input type="radio" checked=""> <a href="#" class="ffs16 ml10"> I
                                            intend to pickup</a></h5>
                                </ol>
                            </div>

                            @if ($property->userDetails)

                            @if ($property->userDetails->userMuncipality)

                            <p class="mfs14l pl25">Seller is located in
                                {{ $property->userDetails->userMuncipality->municipality_name }}, Nepal
                            </p>
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
                            <div class="col-md-4"><a href="#!" class="btn btn-inline post-btn2 fs18w place-bid"><span>Place Bid</span></a></div>
                            <div class="col-md-4"> <a href="{{ url('/') }}" class="btn btn-inline2 post-btn2"><span>Go back to Listing</span></a></div>
                        </div>
                    </div>
                </div>
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
            <div class="modal-body" align="center">
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
            <div class="modal-body" align="center">
                <h4 class="" style="color:#FF0000;padding-top:20px;padding-bottom:40px;">The amount you bid is lesser than actual amount!</h4>
                {{-- <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10"> --}}
                {{-- <div class="col-md-10"> <a href="{{ url('/') }}" class="btn btn-inline2 post-btn2"><span>Go
                    back to Listing</span></a>
            </div> --}}
        </div>
    </div>
</div>
</div>


<!-------new------------>

 <input type="hidden" name="user_name" class="user_name" value="@if(Auth::check()) {{Auth::user()->id}}@endif" id="">

@endsection
@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

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
                autoplay: true,
                autoplaySpeed: 1500,
                adaptiveHeight: true,
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
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
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
                            setTimeout(function() {
                                $.magnificPopup.proto.next.call(self);
                            }, 120);
                        };
                        $.magnificPopup.instance.prev = function() {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function() {
                                $.magnificPopup.proto.prev.call(self);
                            }, 120);
                        };
                        var current = $carousel.slick('slickCurrentSlide');
                        $carousel.magnificPopup('goTo', current);
                    },
                    imageLoadComplete: function() {
                        var self = this;
                        setTimeout(function() {
                            self.wrap.addClass('mfp-image-loaded');
                        }, 16);
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

    $(".copy_link").click(function() {
        $('.alert-link-copied').html("Link copied");
        $('.alert-link-copied').addClass("link-copied-success");
    })


    $('.bid-modal').on('click', function() {
        var user = $('.user_name').val();
        if (user) {
            $('#number').modal('show')
        } else {
            window.location.href = base_url + 'login';
        }
    })
</script>




@endsection