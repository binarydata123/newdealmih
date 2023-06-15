@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <div>
        <section class="banner-part3"  @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/auction.jpg);"  @endif>
            <div class="container-fluid">
                <div class="banner-content xsbg">
                     <div class="row">
                   <div class="col-md-12">
                      <h1 class="yl"><span class="bghead">
                        @if($cms) {{ucwords($cms->title)}} @else Shop our unique range of new & used @endif</span></h1>
                   </div>
                </div>
                <form method="get" action="{{ url('search/market-place') }}">
                    <div class="row newsletter">
                        <div class="col-lg-3 col-md-12">
                            <input type="text" hidden name="is_auction" value="1" id="">
                            <div class="form-group">
                                <select class="form-control newfm bgwt">
                                    <option value="">All Categories</option>
                                    @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-8 mlm30 padr0">
                            <div class="form-group form-control bordr0 bdxs82">
                                <i class="fa fa-search hidden-x"></i>
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}}" name="search[]">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor bdxs8">
                                    <span class="hidden-x">{{trans('global.search_auction')}}</span>
                                    <span class="visible-xs">  <i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>

        <section class="mt20 recomend-part">
        <div class="container">
            <div class="row">
                <div class="webads-image ">
                     <input type="hidden" name="ne_title" value="{{$webads->ne_title}}" id="ne_title">
                    @if($webads ) 
                    <a target="_blank" href="{{$webads->ne_title}}">
                     <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image"></a>
                @else 
                 <img src="{{ url('public/website/images/dea/ad.png') }}" class="iresponsive">
                @endif
                </div>
            </div>

        </div>
    </section>

        <section class="recomend-part mt20 mb40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 mt20 col-xs-8">
                        <div class="">
               <h3 class=" mfs24">Checkout the latest cool auctions..</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 mt20 col-xs-4">
                        <div class="section-center-heading">
                            <u>
                                <a href="{{url('search/market-place')}}">  <h5>View all <i class="fas fa-arrow-right"></i></h5> </a>
                            </u>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($auctions)
                                @foreach ($auctions as $auction)
                                    <div class="product-card">
                                        <div>
                                            <div class="the-container2">
                                                <div class="box2">
                                                    <p class="fs14b">Auction</p>
                                                </div>
                                            </div>
                                        </div> 
                                            <div class="product-media resimg">
                                            <a href="{{ url('product/detail/' . $auction->slug) }}">
                                                <div class="product-img">
                                                    @if ($auction->image)
                                                        <img src="{{ url('public/media/product-image/' . $auction->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif
                                                </div>
                                                </a>
                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            @if($auction->user_id != Auth::user()->id)
                                                                @if($auction->is_buynow == 1)
                                                                    <button type="button" title="Wishlist"
                                                                        data-id="{{ $auction->id }}"
                                                                        class="@if($auction->wishlist) @if ($auction->wishlist->user_id == Auth::user()->id) 
                                                                        fa fa-heart wishlist fas @else fa fa-heart wishlist @endif @endif"> 
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        <div class="product-content">
                                          
                                            <ol class="breadcrumb product-category">
                                            
                                                <li>
                                                    <p class="product-price tblak"> @if(is_numeric($auction->price)) रू @endif</p>
                                                </li>
                                                <li class="breadcrumb-item">
                                               
                                                    <a
                                                        href="{{ url('product/detail/' . $auction->slug) }}">
                                                        @if(is_numeric($auction->price))
                                                       {{ number_format($auction->price) }} @endif </a>

                                                    </li>

                                            </ol>
                                            <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $auction->title }}">{{ ucwords(Str::limit($auction->title,35)) }}</span><br>
                                                {{-- <span class="s-used">Used</span>  --}}
                                                @if($auction->type == 1)
                                        <span class="s-used">Used</span>
                                        @else
                                        <span class="s-success">Brand New</span>
                                        @endif
                                        @if($auction->productBid->count() > '1')
                                        @if($auction->productBid)<span class="mfs12">{{$auction->productBid->count()}} Bids</span> @endif
                                        @else
                                        @if($auction->productBid)<span class="mfs12">{{$auction->productBid->count()}} Bid</span> @endif
                                        
                         <br>           @endif
                                      <small> @if($auction->productBidPrice)<span class="mfs12">Bid rate &nbsp; रू {{ number_format($auction->productBidPrice->price) }} </span> @endif
                                      </small> 
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i>  @if ($auction->districtList){{ $auction->districtList->district_name }} @endif</span>
                                                <div> <span> Closes:
                                                    @if($auction->auction_end_date != null) {{ Carbon\Carbon::parse($auction->auction_end_date)->format('d/m/Y')}} @else {{ $auction->created_at->addDays(30)->format('d/m/Y') }} @endif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                           
                        </div>
                    </div>
                </div>

            </div>
        </section>
      
      
        @if(isset($marketPlaces ) && count($marketPlaces) > 0)
         <section class="recomend-part mt20 mb40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 mt20 col-xs-8">
                        <div class="">
               <h3 class=" mfs24">Cool Auctions</h3>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 mt20 col-xs-4">
                        <div class="section-center-heading">
                            <u>
                                <a href="{{url('search/auction')}}">  <h5>View all <i class="fas fa-arrow-right"></i></h5> </a>
                            </u>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($marketPlaces)
                                 @foreach($marketPlaces as $marketPlace)
                                    <div class="product-card">
                                        <div>
                                            <div class="the-container2">
                                                <div class="box2">
                                                    <p class="fs14b">Auction</p>
                                                </div>
                                            </div>
                                        </div> 
                                            <div class="product-media resimg">
                                            <a href="{{ url('product/detail/' . $marketPlace->slug) }}">
                                                <div class="product-img">
                                                    @if ($marketPlace->image)
                                                        <img src="{{ url('public/media/product-image/' . $marketPlace->image) }}"
                                                            alt="product" width="258px" height="183.31px">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" width="258px" height="183.31px">
                                                    @endif
                                                </div>
                                                </a>
                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            @if($marketPlace->user_id != Auth::user()->id)
                                                                @if($marketPlace->is_buynow == 1)
                                                                    <button type="button" title="Wishlist"
                                                                        data-id="{{ $marketPlace->id }}"
                                                                        class="@if ($marketPlace->wishlist) @if ($marketPlace->wishlist->user_id == Auth::user()->id) 
                                                                        fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"> 
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        <div class="product-content">
                                          
                                            <ol class="breadcrumb product-category">
                                            
                                                <li>
                                                    <p class="product-price tblak"> @if(is_numeric($marketPlace->price)) रू @endif</p>
                                                </li>
                                                <li class="breadcrumb-item">
                                               
                                                    <a
                                                        href="{{ url('product/detail/' . $auction->slug) }}">
                                                        @if(is_numeric($marketPlace->price))
                                                       {{ number_format($marketPlace->price) }} @endif </a>

                                                    </li>

                                            </ol>
                                            <div class="product-meta"><span>{{ ucwords($marketPlace->title) }}</span><br>
                                                {{-- <span class="s-used">Used</span>  --}}
                                                @if($marketPlace->type == 1)
                                        <span class="s-used">Used</span>
                                        @else
                                        <span class="s-success">Brand New</span>
                                        @endif
                                        @if($marketPlace->productBid)<span class="mfs12">{{$marketPlace->productBid->count()}} Bids</span> @endif
                         <br>
                                      <small> @if($marketPlace->productBidPrice)<span class="mfs12">Bid rate &nbsp; रू {{ number_format($marketPlace->productBidPrice->price) }} </span> @endif
                                      </small> 
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i>  @if ($marketPlace->districtList){{ $marketPlace->districtList->district_name }} @endif</span>
                                                <div> <span> Closes:
                                                    @if($marketPlace->auction_end_date != null) {{ Carbon\Carbon::parse($marketPlace->auction_end_date)->format('d/m/Y')}} @else {{ $marketPlace->created_at->addDays(30)->format('d/m/Y') }} @endif</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                           
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- <section class="recomend-part mt20 mb0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-card alert fade show mb0">
                            <div>
                                <h3 class="mfs24">Cool Auctions</h3>
                            </div>
                            <div class="row ad-standard">
                            
                                @foreach($marketPlaces as $marketPlace)
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bshadow mb20">
                                    <div class="product-info wrapinfo mt1">
                                        <p class="product-title tcolor1 fs16">Category: Marketplace</p>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <p class="product-title mfs20">रू {{$marketPlace->price}}</p>
                                    </div>
                                    <div class="product-card standard image-heg ml0">
                                        <div class="product-media">
                                            <div class="product-img">
                                                @if ($marketPlace->image)
                                                        <img src="{{ url('public/media/product-image/' . $marketPlace->image) }}"
                                                            alt="product" width="258px" height="183.31px">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" width="258px" height="183.31px">
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-info text-cont">
                                                <ol class="breadcrumb product-category">
                                                    <h5 class="product-title"><a href="{{ url('product/detail/' . $marketPlace->slug) }}">{{ucwords($marketPlace->title)}}</a></h5>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <li class="breadcrumb-item active s-success" aria-current="page">Brand
                                                        New</li>
                                                </ol>
                                            </div>
                                            <div class="product-meta"><span>Closes:  @if($marketPlace->auction_end_date != null) {{ Carbon\Carbon::parse($marketPlace->auction_end_date)->format('d/m/Y')}} @else  {{ $marketPlace->created_at->addDays(30)->format('d/m/Y') }} @endif </span>&nbsp;
                                            </div>
                                            <div class="product-meta"><span class="fs14o tcolor1 fw500"> <a
                                                href="{{ url('product/detail/' . $marketPlace->slug) }}"><span class="vall2">View
                                                            Details</span></a> </span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>

    </section> -->
    @endif
   

    @if(isset($product) && count($products) > 0)
    <section class="recomend-part mb40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card alert fade show">
                        <div class="account-title manageads1">
                            <h6>Manage Auctions</h6>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="niche-nav">
                                    <ul class="nav nav-tabs tableauc">
                                        <li><a href="#all" class="nav-link active" data-toggle="tab">Current</a></li>
                                        <li><a href="#new" class="nav-link" data-toggle="tab">Sold</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row ad-standard">
                            @if($products)
                            @foreach ($products as $product)
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bshadow mt20">
                                <div class="product-info wrapinfo mt1">
                                    <p class="product-title"><a href="#" class="tcolor1 fs16">Category : Marketplace</a>
                                    </p>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div><button type="button" title="Wishlist" data-content="product" data-id="{{$product->id}}"
                                            class="far fa-trash-alt tred fs18w delete"></button></div>
                                </div>
                              
                                <div class="product-card standard image-heg ml0">
                                    <div class="product-media">
                                        <div class="product-img">
                                            @if ($product->image)
                                            <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                alt="product" width="258px" height="183.31px">
                                        @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                alt="product" width="258px" height="183.31px">
                                        @endif
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><a href="#">{{ ucwords($product->title) }}</a></h5>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <li class="breadcrumb-item active s-success" aria-current="page">Brand New
                                                </li>
                                            </ol>
                                            <h5 class="product-price"> @if(is_numeric($product->price))
                                                रू
                                                {{ number_format($product->price) }} @endif</h5>
                                        </div>
                                        <div class="product-meta"><span>Closes :  {{ $product->created_at->addDays(30)->format('D d M') }} </span></div>
                               
                                        @if($product->productBidPrice) 
                                      <div class="product-meta mfs14l">Highest Bid Made <span class="fs14r"> By
                                                @if($product->productBidPrice->bidUser) {{$product->productBidPrice->bidUser->username}}  
                                                @endif</span><span class="fs15">
                                                    @if(is_numeric($product->productBidPrice->price))
                                                    रू 
                                                    {{number_format($product->productBidPrice->price)}} @endif</span></div>
                                                 @endif
                                        <div class="product-info text-cont">
                                            <a href="#" class="btn post-btn btn-light"><span>Add Note</span></a>
                                            <a href="{{ url('product/detail/' . $product->slug) }}" class="vall2"><span>View Details</span></a>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div> 
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                            <div>&nbsp;&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
   
@endsection
@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script src="{{url('public/website/js/classified/wishlish.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var category = "";
        var subCategory = "";
        var path = "{{ url('product-title') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query,
                    slug: "market-place",
                    category: category
                }, function(data) {
                    return process(data);
                });
            }
        });

        $('.category').on('change', function() {
            category = $(this).val();
        })
        $('.keyword').on('change', function()
        {
            subCategory = $(this).val();
            // alert(subCategory);
        })
    </script>

@endsection
