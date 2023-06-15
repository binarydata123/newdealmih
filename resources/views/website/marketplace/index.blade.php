@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <div>
        <section class="banner-part7" @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/market.jpg);"  @endif >
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="yl"><span class="bghead">
                            @if($cms) {{ucwords($cms->title)}} @else
                            Shop our unique range of new & used @endif</span></h1>
                        </div>
                    </div>
                    <form method="get" action="{{ url('search/market-place') }}">
                        <div class="row newsletter">
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <select class="form-control newfm category bgwt" name="category[]">
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
                                    <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}}  " name="search[]">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                                <div class="form-group">
                                    <button class="btn btn-inline22 bbtnmotor bdxs8">
                                        <span class="hidden-x">{{trans('global.search_marketplace')}}</span>
                                        <span class="visible-xs">  <i class="fa fa-search"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="mt60 recomend-part">
            <div class="container">
                <div class="row">
                    <div class="webads-image ">
                        @if($webads) 
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
                    @if ($products->count() > 0)
                        <div class="col-lg-10 col-xs-8 mt20">
                            <div class="">
                                <h3 class=" mfs24">Recommended Deals</h3>

                                <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>

                                
                            </div>
                        </div>
                    @endif
                    @if ($products->count() > 4)
                        <div class="col-lg-2 col-xs-4">
                            <div class="section-center-heading">
                                <u>
                                  <a href="{{url('search/market-place')}}">  <h5>View all <i class="fas fa-arrow-right"></i> </a></h5>
                                </u>

                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12 mt20">
                        <div class="recomend-slider slider-arrow">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="product-card">

                                        <div class="product-media resimg">
                                            <a href="{{ url('product/detail/' . $product->slug) }}">
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
                                                        @if($product->user_id != Auth::user()->id)
                                                            @if($product->is_buynow == 1)
                                                                <button type="button" title="Wishlist"
                                                                    data-id="{{ $product->id }}" 
                                                                    class="@if($product->wishlist) @if ($product->wishlist->user_id == Auth::user()->id) 
                                                                    fa fa-heart wishlist fas    @else  fa fa-heart wishlist @endif @endif"></button>
                                                            @endif
                                                        @endif
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

                                                        @if (is_numeric($product->price)) {{ number_format($product->price) }} @endif</a></li>
                                            </ol>
                                            <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}" class="product-title-color">{{ ucwords(Str::limit($product->title,35)) }}</a></span><br>
                                                @if($product->type == 1)
                                                <span class="s-used">Used</span>
                                                @else
                                                <span class="s-success">New</span>
                                                @endif

                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i>
                                                    @if ($product->districtList)
                                                        {{ $product->districtList->district_name }} @endif
                                                    {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                                </span>
                                                <div> <span>
                                                     Closes: {{ $product->created_at->addDays(30)->format('D d M') }}  
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



        <section class="p30 niche-part pb60">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-xs-8 mb20">
                       <!--  <div class="account-title manageads1 bord0"> -->
                        <div class="">
                            <h3 class="mfs24 mb20">Popular Searches</h3>
                           
                        </div>
                    </div>

                    <div class="col-xs-4 col-lg-2 text-right">
                                <a href="{{url('search/market-place')}}" class="vall2 fs18l2"><span><h5>View all <i
                                            class="fa fa-arrow-right"></i></h5></span></a>
                            </div>
                    @if($popularCategories)
                        @foreach ($popularCategories as $popularCategory)
                            
                    <div class="col-lg-3">
                        <p class="fs18l3 mb20"> {{ucwords($popularCategory->category_name)}} </p>
                        <ul>

                            @if($popularCategory->subCategory)
                           
                                @foreach ( collect($popularCategory->subCategory)->forPage(1,3) as $key => $subCategory)
                                    
                            <li> <a href="{{url('search/market-place?subCategory%5B%5D='.$subCategory->id)}}"
                                 class="@if($key+1 == 1) lblu @elseif($key+1 ==2 ) lpink @else  lorg @endif"
                                >{{ucwords($subCategory->category_name)}}</a>
                            </li>
                            @endforeach

                        @endif
                           
                        </ul>
                    </div>
                    @endforeach
                @endif
                    {{-- <div class="col-lg-3">
                        <p class="fs18l3 mb20"> Home and outdoors </p>
                        <ul>
                            <li> <a href="#!" class="lblu">Furniture</a></li>
                            <li><a href="#!" class="lpink">Outdoor furniture</a></li>
                            <li> <a href="#!" class="lorg">Fence posts & timber</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <p class="fs18l3 mb20">Tech and leisure </p>
                        <ul>
                            <li> <a href="#!" class="lblu">iPhone</a></li>
                            <li><a href="#!" class="lpink">Mountain bike</a></li>
                            <li> <a href="#!" class="lorg">Nintendo switch</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <p class="fs18l3 mb20"> Others </p>
                        <ul>
                            <li> <a href="#!" class="lblu">Flatmates wanted</a></li>
                            <li><a href="#!" class="lpink">Car parts & accessories</a></li>

                        </ul>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>


@endsection
@section('js')
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
                   $('.alert-msg').addClass("alert-success");

                },
                error: function() {

                }
            })
        })
    </script>
@endsection
