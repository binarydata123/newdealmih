@extends('website.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">

@endsection
@section('content')

    <!-------new------------>
    
    <section id="services" class="services section-bg mt10">
        <div class="container-fluid mt60">
            <p class="fs12">Home/Marketing Strategies/Mobiles/<span class="cblue">Iphone11</span> </p>

            <div class="row row-sm">
                <div class="col-lg-6 _boxzoom">
                    <div class="zoom-thumb">
                        <ul class="piclist">
                            @if($product->media)
                                @foreach($product->media as $media)
                            <li><img src="{{ url('public/media/product-multi-image/'.$media->file) }}" alt=""></li>
                                @endforeach
                            @endif
                            

                        </ul>
                    </div>
                    <div class="_product-images" align="center">
                        <div class="picZoomer" align="center">
                            @if($product->image)
                            <img class="my_img" src="{{ url('public/media/product-image/'.$product->image) }}" alt="">
                            @endif
                        </div>

                        <div class="w95">
                            <div class="row">
                                <div class="col-md-6"> <a href="#!"
                                        class="btn btn-inline2 post-btn2"><span>Place Bid</span></a></div>
                                <div class="col-md-6"><a href="#!"
                                        class="btn btn-inline post-btn2 fs18w"><span>Buy Now</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="common-card p0">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="ad-details-title">{{ ucwords($product->title) }} <span
                                        class="sts">Used</span></h3>
                            </div>

                            <div class="col-md-3">
                                <a href="#!" class="clink"><i class="fa fa-clone" aria-hidden="true"></i>
                                    <u>Copy Link</u></a>
                            </div>
                        </div>

                        <ol class="breadcrumb ad-details-breadcrumb">

                            <li class="breadcrumb-item fs18">@if ($product->category) {{ $product->category->category_name }} @endif</li>
                            <li class="breadcrumb-item active fs18" aria-current="page">@if ($product->subCategory) {{ $product->subCategory->category_name }} @endif</li>
                        </ol>
                        <h5 class="fs16">Actual Price <span class="actualp"> रू
                                {{ $product->price }}</span></h5>

                        <h5 class="fs16 mt15">Auction Price <span class="aucp"> रू
                                {{ $product->auction_price }}</span></h5>

                        <div class="dbox">
                            <h4 class="fs20">Description </h4>

                            <ul class="ldisc">
                                {{ $product->description }}
                            </ul>
                            {{-- <div align="right">
             <a href="#!" class="clink"> <u>See More</u></a>
            </div> --}}
                        </div>
                        <div class="common-card dbox2">
                            <h4 class="fs20">Seller Information </h4>

                            <div class="row">
                                <div class="col-md-12" align="right">
                                    <p class="lalign"><span class="gbox">Address Verified</span> <span
                                            class="rbox">In Trade</span></p>
                                </div>
                                <div class="col-md-3 mtm30">
                                    <img class="iresponsive" @if ($product->seller_image) src="{{ url('public/media/seller-image/' . $product->seller_image) }}"  height="124" width="124" @else src="{{ url('public/website/images/dea/p1.png') }}" @endif alt="">
                                </div>
                                <div class="col-md-9 mtm45">
                                    <ul class="ad-details-specific dbb">
                                        <li>
                                            <h6>Name:</h6>
                                            <p>{{ ucwords($product->seller_first_name) }}
                                                {{ ucwords($product->seller_last_name) }}</p>
                                        </li>
                                        <li>
                                            <h6>Location:</h6>
                                            <p>@if ($product->districtList){{ $product->districtList->district_name }} @endif @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif</p>
                                        </li>
                                        <li>
                                            <h6>Pick-up Location:</h6>
                                            <p>@if ($product->districtList){{ $product->districtList->district_name }} @endif @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif</p>

                                        </li>
                                        <li>
                                            <h6> Shipping Area:</h6>
                                            <p>
                                                @if (isset($product->km_delivery))
                                                {{ $product->km_delivery }}Km @else
                                                    All Over Nepal @endif
                                            </p>
                                        </li>
                                        <li>
                                            <h6>Payment Method:</h6>
                                            <p>Bank transfer, Cash</p>
                                        </li>
                                        <li>
                                            <h6><span class="pfeedback">99% positive</span> <span> feedback (21 <i
                                                        class="fa fa-star yl12"></i> )</span></h6>
                                            <p></p>
                                        </li>
                                    </ul>
                                    <div align="right">
                                        <a href="#!" class="clink mt20"> <u>View Seller's other location</u></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
    <script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>
@endsection
