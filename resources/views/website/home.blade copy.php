@extends('website.layout.app')
@section('css')
<style>
    .dropdown-submenu {
      position: relative;
    }
    
    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
   

    .fa-minus:before {
    content: "\f106";
    color: #fc7c55 !important;
    font-size: 21px !important;
}

.fa-plus:before {
    content: "\f107";
    color: #fc7c55 !important;
    font-size: 21px !important;
}
    </style>
@endsection
@section('content')
    <section class="banner-part">
        <div class="container-fluid">
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="yl"><span class="bghead">You Buy & You sell</span></h1>
                    </div>
                </div>

                <div class="row newsletter">
                    <div class="col-lg-2 col-md-12">

                    <div class="product-widget psr">
                        <h4 class="product-widget-title fils2 fscat" data-toggle="collapse" data-target="#demo"><i class="fa fa-tasks tblu mr5" aria-hidden="true"></i> All Categories
                        </h4>
                        <div id="demo" class="collapse" style="position:absolute">
                        <form id="demo" class="product-widget-form formpad2 collapse">
                            <!--------->
                           
                            <input type="text" hidden class="subcategories"  name="category[]">
        
                            <div class="container bgwhite2">
                                <div class="tab-wrap">
                                    <div class="tab-item-wrap active">
                                        <div class="title">
                                            <h5 class="all-category"><span></span> All Categories  </h5>
                                        </div>
                                      
                                        <hr>
                                    </div>
                                   
                                    @if($headerCategories)
                                        @foreach($headerCategories as $headerCategory)
                                    <div class="tab-item-wrap">
                                        <div class="title mb20">
                                            <h6><span><img src="{{url('public/website/images/tag.png')}}" width="15px"></span> {{ucwords($headerCategory->name)}} <span class="floatr"> <i class="fa fa-angle-down frr" aria-hidden="true"></i></span> </h6>
                                        </div>
                                        <div class="content">
                                            <ul class="product-widget-list product-widget-scroll newfil">
                                            @if($headerCategory->category)
                                                @foreach ($headerCategory->category as $mainCategory)  
                                            <li><a href="#" class="sub-category" data-content="{{$mainCategory->category_name}}" data-id="{{$mainCategory->id}}"> {{$mainCategory->category_name}} </a></li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        </div>
                                        <hr>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <!--------->
                        </form>
        </div>
                    </div>
                </div>
                    {{-- <div class="col-lg-2 col-md-12 ww2">
                        <div class="form-group">

                            <select class="form-control newfm slug" name="slug">
                                @if ($headerCategories)
                                    @foreach ($headerCategories as $headerCategory)
                                        <option value="{{$headerCategory->slug}}">{{ucwords($headerCategory->name)}}</option>
                                    @endforeach
                                    
                                @endif
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-lg-4 col-md-12 mlm30">
                        <div class="form-group form-control bordr0">
                            <i class="fa fa-search"></i>
                            <input class="frmtxt search" type="text" 
                                placeholder="Search Cars, Mobile Phones, Property and many more... ">

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12">
                        <div class="form-group">

                            <button class="btn btn-inline22 bbtn search-button"><span>Search</span></button>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>



    <section class="mt20 recomend-part">
        <div class="container">
            <div class="row">
                <div>
                    <img src="{{ url('public/website/images/dea/ad.png') }}" class="iresponsive">
                </div>
            </div>

        </div>
    </section>



    <section class="recomend-part mt20 mb40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="">
               <h3>Fresh Recommendations</h3>
              
            </div>
         </div>
         @if($products->count() > 5)
         <div class="col-lg-2">
                        <div class="section-center-heading">
                            <u>
                                <h5>View all <i class="fas fa-arrow-right"></i></h5>
                            </u>

                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($products)
                                @foreach ($products as $product)
                                    <!---->
                                    <!-- <div>
                                                <div class="the-container2">
                                                    <div class="box2">
                                                        <p class="fs14b">Premium</p>
                                                    </div>
                                                </div>
                                            </div> -->
                                    <!---->
                                    <div class="product-card">
                                        
                                            <div class="product-media resimg">
                                            <a href="{{url('product/detail/'.$product->slug)}}">
                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif
                                                </div>
                                                </a>
                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            <button type="button" title="Wishlist"
                                                                data-id="{{ $product->id }}"
                                                                class="@if ($product->wishlist) @if ($product->wishlist->user_id == Auth::user()->id) 
                                                            fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        <div class="product-content">
                                            <ol class="breadcrumb product-category">
                                                <li>
                                                    <p class="product-price tblak"> रू</p>
                                                </li>
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}">
                                                       @if(is_numeric($product->price)) {{ number_format($product->price) }} @endif</a></li>
                                            </ol>
                                            <div class="product-meta"><span>{{ ucwords($product->title) }}</span><br>
                                                @if($product->type == 1)
                                                <span class="s-used">Used</span>
                                                @else
                                                <span class="s-success">Brand New</span>
                                                @endif
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                                                    {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                                </span>
                                                <div> <span> 
                                                    Closes: {{ $product->created_at->addDays(30)->format('D d M') }}  </span></div>
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


    <section class="recomend-part mt20 mb40">
        <div class="container-fluid">
            <div class="row">
            @if(Auth::check() && $recommendedProducts->count() > 0)
                <div class="col-lg-10">
                    <div class="">
               <h3>Recommended Deals</h3>
              
            </div>
         </div>
         @endif
         @if (Auth::check() && $recommendedProducts->count() >5)
         <div class="col-lg-2">
                        <div class="section-center-heading">
                            <u>
                                <h5>View all <i class="fas fa-arrow-right"></i></h5>
                            </u>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($recommendedProducts)
                            @foreach ($recommendedProducts as $recommendedProduct)
                                <div class="product-card">
                                    <a>
                                        <div class="product-media resimg">
                                            <a href="{{url('product/detail/'.$recommendedProduct->slug)}}">
                                            <div class="product-img">
                                                @if ($recommendedProduct->image)
                                                    <img src="{{ url('public/media/product-image/' . $recommendedProduct->image) }}"
                                                        alt="product">
                                                @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                        alt="product">
                                                @endif
                                            </div>
                                            </a>
                                            <div class="product-type">
                                                <div class="product-btn">
                                                    @if (Auth::check())
                                                        <button type="button" title="Wishlist"
                                                            data-id="{{ $recommendedProduct->id }}"
                                                            class="@if ($recommendedProduct->wishlist) @if ($recommendedProduct->wishlist->user_id == Auth::user()->id) 
                                                        fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-content">
                                        <ol class="breadcrumb product-category">
                                            <li>
                                                <p class="product-price tblak"> रू</p>
                                            </li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('product/detail/' . $recommendedProduct->slug) }}">
                                                   @if(is_numeric($recommendedProduct->price)) {{number_format( $recommendedProduct->price)}} @endif</a></li>
                                        </ol>
                                        <div class="product-meta"><span>{{ ucwords($recommendedProduct->title) }}</span><br>
                                            @if($recommendedProduct->type == 1)
                                                <span class="s-used">Used</span>
                                                @else
                                                <span class="s-success">Brand New</span>
                                                @endif
                                        </div>
                                        <div class="product-info">
                                            <span><i class="fas fa-map-marker-alt"></i> @if ($recommendedProduct->districtList){{ $recommendedProduct->districtList->district_name }} @endif
                                                {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                            </span>
                                            <div> <span> 
                                                Closes: {{ $recommendedProduct->created_at->addDays(30)->format('D d M') }}  </span></div>
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

    <section class="recomend-part mt20 mb40">
        <div class="container-fluid">
            <div class="row">
            @if($auctionProducts->count() > 0)
                <div class="col-lg-10">
                    <div class="mb20">
               <h3>Checkout the latest cool auctions </h3>
              
            </div>
         </div>
         @endif
         @if ($auctionProducts->count() >5)
         <div class="col-lg-2">
                        <div class="section-center-heading">
                            <u>
                                <h5>View all <i class="fas fa-arrow-right"></i></h5>
                            </u>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($auctionProducts)
                            @foreach ($auctionProducts as $auctionProduct)
                                <div class="product-card">
                                    <a>
                                        <div class="product-media resimg">
                                            <a href="{{url('product/detail/'.$auctionProduct->slug)}}">
                                            <div class="product-img">
                                                @if ($auctionProduct->image)
                                                    <img src="{{ url('public/media/product-image/' . $auctionProduct->image) }}"
                                                        alt="product">
                                                @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                        alt="product">
                                                @endif
                                            </div>
                                            </a>
                                            <div class="product-type">
                                                <div class="product-btn">
                                                    @if (Auth::check())
                                                        <button type="button" title="Wishlist"
                                                            data-id="{{ $auctionProduct->id }}"
                                                            class="@if ($auctionProduct->wishlist) @if ($auctionProduct->wishlist->user_id == Auth::user()->id) 
                                                        fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-content">
                                        <ol class="breadcrumb product-category">    
                                            <li>
                                                <p class="product-price tblak"> रू</p>
                                            </li>
                                            <li class="breadcrumb-item"><a
                                                    href="{{ url('product/detail/' . $auctionProduct->slug) }}">
                                                    @if(is_numeric($auctionProduct->price)){{ number_format($auctionProduct->price) }} @endif</a></li>
                                        </ol>
                                        <div class="product-meta"><span>{{ ucwords($auctionProduct->title) }}</span><br>
                                            @if($auctionProduct->type == 1)
                                            <span class="s-used">Used</span>
                                            @else
                                            <span class="s-success">Brand New</span>
                                            @endif
                                           
                                         @if($auctionProduct->productBid)<span class="mfs12">{{$auctionProduct->productBid->count()}} Bids</span> @endif
                                        </div>
                                        <div class="product-info">
                                            <span><i class="fas fa-map-marker-alt"></i> @if ($auctionProduct->districtList){{ $auctionProduct->districtList->district_name }} @endif
                                                {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                            </span>
                                            
                                            <div> <span> 
                                                 Closes: {{ $auctionProduct->created_at->addDays(30)->format('D d M') }}  </span></div>
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
  {{-- Premium product  --}}

@if($premiumProducts->count() > 0)
  <section class="recomend-part mt20 mb40">
    <div class="container-fluid">
        <div class="row">
     
            <div class="col-lg-10">
                <div class="mb20">
           <h3>Premium Products </h3>
          
        </div>
     </div>
   
    
     <div class="col-lg-2">
                    <div class="section-center-heading">
                        <u>
                            <h5>View all <i class="fas fa-arrow-right"></i></h5>
                        </u>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="recomend-slider slider-arrow">
                        @if ($premiumProducts)
                        @foreach ($premiumProducts as $premiumProduct)
                            <div class="product-card">
                                <a>
                                    <div class="product-media resimg">
                                        <a href="{{url('product/detail/'.$premiumProduct->slug)}}">
                                        <div class="product-img">
                                            @if ($premiumProduct->image)
                                                <img src="{{ url('public/media/product-image/' . $premiumProduct->image) }}"
                                                    alt="product">
                                            @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                    alt="product">
                                            @endif
                                        </div>
                                        </a>
                                        <div class="product-type">
                                            <div class="product-btn">
                                                @if (Auth::check())
                                                    <button type="button" title="Wishlist"
                                                        data-id="{{ $premiumProduct->id }}"
                                                        class="@if ($premiumProduct->wishlist) @if ($premiumProduct->wishlist->user_id == Auth::user()->id) 
                                                    fa fa-heart wishlist fas  @endif  @else  fa fa-heart wishlist @endif    "></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="product-content">
                                    <ol class="breadcrumb product-category">    
                                        <li>
                                            <p class="product-price tblak"> रू</p>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ url('product/detail/' . $premiumProduct->slug) }}">
                                                @if(is_numeric($premiumProduct->price)){{ number_format($premiumProduct->price) }} @endif</a></li>
                                    </ol>
                                    <div class="product-meta"><span>{{ ucwords($premiumProduct->title) }}</span><br>
                                        @if($premiumProduct->type == 1)
                                        <span class="s-used">Used</span>
                                        @else
                                        <span class="s-success">Brand New</span>
                                        @endif
                                       
                                     @if($premiumProduct->productBid)<span class="mfs12">{{$premiumProduct->productBid->count()}} Bids</span> @endif
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> @if ($premiumProduct->districtList){{ $premiumProduct->districtList->district_name }} @endif
                                            {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                        </span>
                                        
                                        <div> <span> 
                                             Closes: {{ $premiumProduct->created_at->addDays(30)->format('D d M') }}  </span></div>
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
@endif
@endsection
@section('js')
    <script>
        $('.wishlist').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: base_url + "wishlist",
                data: {
                    id: id
                },
                success: function() {

                },
                error: function() {

                }
            })
        })
        var slug = "";
        var search = "";
        $('.search-button').on('click', function()
        {
            slug = $('.slug').val();
            search = $('.search').val();
            
            window.location.href = "search/"+slug+"?search%5B%5D="+search;

        })
        
//         $(document).ready(function(){
//   $('.dropdown-submenu a.test').on("click", function(e){
   


//     var id = $(this).attr("data-id");
   
//     e.stopPropagation();
//     $('.category'+id).toggle();
//     e.preventDefault();
//     //
//   });
// });

// $(function () {
//     var sf_menu_sub = $('.sf-menu-sub');
//     $('.clickable').on('click', function (e) {
//         e.stopPropagation();
//         sf_menu_sub.toggle();
//     });
//     $('.header-category').on('click',function(e))
// });
</script>
    
@endsection
