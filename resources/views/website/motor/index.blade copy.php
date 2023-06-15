@extends('website.layout.app')
@section('css')
{{-- <style>
    .dropdown-submenu {
      position: relative;
    }
    
    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
    </style> --}}

    
    
{{-- <style>
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
    </style> --}}
@endsection
@section('content')


    <div>
        <section class="banner-part2">
            <div class="container-fluid">
                <div class="banner-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="yl"><span class="bghead">Shop our unique range of new & used</span>
                            </h1>
                        </div>
                    </div>
                    <form method="get" action="{{ url('search/car-motor-bike-or-boat') }}">
                    <div class="row newsletter">
                        <div class="col-lg-2 col-md-12">
                        <!-- ww2 -->
                           

                       

                        <div class="product-widget mb20 psr">
                <h4 class="product-widget-title fils2 fscat" data-toggle="collapse" data-target="#demot"><i class="fa fa-tasks tblu mr5" aria-hidden="true"></i> All Categories
                </h4>
                <div id="demot" class="collapse w100xs" style="position:absolute">
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
                        <!------------>


                           



                               {{----- <select class="form-control newfm category" name="category[]">
                                    <option value="">All Categories</option>
                                    @if ($categories)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                @endif
                                </select>
                                -----}}
                           
                        </div>
                        <div class="col-lg-4 col-md-12 mlm30">
                            <div class="form-group form-control bordr0">
                                <i class="fa fa-search"></i>
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="Search by keyword " name="search[]">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor"><span>Search Motor</span></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <!--tab-->
        <section class="mar30 niche-part sbox">
            <div class="container bgwhite">
                <form action="{{url('search/car-motor-bike-or-boat')}}" method="get">
                    @csrf
                <div class="row">
                    <div class="col-lg-12 pl0">
                        <div class="niche-nav">
                            <ul class="nav nav-tabs tableft navwp">
                                @if($categories)
                                    @foreach ($categories as $key => $category)
                                        
                                <li><a href="#ratings" class="nav-link @if($key+1 == 1) active @endif main-category" 
                                    data-id="{{$category->id}}" 
                                    data-toggle="tab">
                                    {{ucwords($category->category_name)}}</a></li>
                                   @endforeach
                                @endif
                                {{-- <li><a href="#advertiser" class="nav-link" data-toggle="tab">Two-wheelers</a></li>
                                <li><a href="#engaged" class="nav-link" data-toggle="tab">Spare parts</a></li>
                                <li><a href="#engaged" class="nav-link" data-toggle="tab">Commercial</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
<input type="text"  hidden class="category-value" id="">

                <div class="tab-pane active" id="ratings">
                    <div class="container-fluid w100">
                        <div class="row sub-category-result">
                            {{-- <div class="col-lg-12">
                                <div class="niche-nav">
                                    <ul class="nav nav-tabs tableftsq">
                                        <li><a href="#all" class="nav-link active" data-toggle="tab">All</a></li>
                                        <li><a href="#new" class="nav-link" data-toggle="tab">New</a></li>
                                        <li><a href="#used" class="nav-link" data-toggle="tab">Used</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        <div class="tab-pane active" id="all">
                            
                            <div class="row ml0 feature-data">
                            </div>
                            
                            <div class="row ml0 feature-data-model-result">
                            </div>
                                {{-- <div class=""> --}}
                                    {{-- <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Brand</legend>
                                            <select class="form-control b0">
                                                <option value="">Mahindra</option>
                                                <option value="1">Maruthi</option>
                                                <option value="2">Hyundai</option>
                                                <option value="3">Nissan</option>
                                            </select>
                                        </fieldset>
                                    </div> --}}
                                {{-- </div> --}}

                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Model</legend>
                                            <select class="form-control b0">
                                                <option value="">XUV700</option>
                                                <option value="1">XUV300</option>
                                                <option value="2">Bolero</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Seats</legend>
                                            <select class="form-control b0">
                                                <option value="">7</option>
                                                <option value="1">6</option>
                                                <option value="2">5</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                <div class="row ml0">
                                <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">District</legend>
                                            <select class="form-control b0 district" name="district">
                                               @if ($districts)
                                                    @foreach ($districts as $district)
                                                        <option value="{{$district->district_id}}">{{$district->district_name}}</option>
                                                    @endforeach
                                                   
                                               @endif

                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Municipality</legend>
                                            <select class="form-control b0 municipality" name="municipality">
                                                <option value="">Municipality/Nagarpalika</option>
                                              

                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Village</legend>
                                            <select class="form-control b0 village" name="village">
                                                <option value="">Select Village</option>
                                              

                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">Price</p>
                                                <select class="form-control h52 price" name="price">
                                                    <option value="">Any</option>
                                                    <option value="10000">10k</option>
                                                    <option value="20000">20k</option>
                                                    <option value="30000">30k+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">&nbsp;</p>
                                                <select class="form-control h52">
                                                    <option value="">Any</option>
                                                    <option value="10000">10k</option>
                                                    <option value="20000">20k</option>
                                                    <option value="30000">30k+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                </div>


                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">Year</p>
                                                <select class="form-control h52 year" name="year">
                                                    <option value="">Any</option>
                                                    <option value="1">2021</option>
                                                    <option value="2">2020</option>
                                                    <option value="3">2019</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">&nbsp;</p>
                                                <select class="form-control h52">
                                                    <option value="">Any</option>
                                                    <option value="1">2021</option>
                                                    <option value="2">2020</option>
                                                    <option value="3">2019</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Fuel Type</legend>
                                            <select class="form-control b0">
                                                <option value="">Any fuel type</option>
                                                <option value="1">Maruthi</option>
                                                <option value="2">Hyundai</option>
                                                <option value="3">Nissan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">Transmission</legend>
                                            <select class="form-control b0">
                                                <option value="">Any Transmission</option>
                                                <option value="1">Maruthi</option>
                                                <option value="2">Hyundai</option>
                                                <option value="3">Nissan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">KM Driven</legend>
                                            <select class="form-control b0">
                                                <option value="">17000</option>
                                                <option value="1">Maruthi</option>
                                                <option value="2">Hyundai</option>
                                                <option value="3">Nissan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div> --}}
                              
                                    {{-- <div class="col-lg-4">
                                        <div class="form-group mt15">
                                            <fieldset>
                                                <legend class="mbm12">No of Owners * </legend>
                                                <select class="form-control b0">
                                                    <option value="">1</option>
                                                    <option value="1">Maruthi</option>
                                                    <option value="2">Hyundai</option>
                                                    <option value="3">Nissan</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div> --}}
                            
                                <div align="right" class="col-lg-12">
                                    <button class="btn btn-inline fil">View listing</button>
                                    {{-- <a href="#!" class="btn btn-inline fil"><span>View listing</span></a> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane " id="new">
                            <div class="row">
                                <h3 class="mb20">No Data</h3>
                            </div>
                        </div>
                        <div class="tab-pane" id="used">
                            <div class="row">
                                <h3 class="mb20">No Data</h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
                </form>
                {{-- <div class="tab-pane " id="advertiser">
                    <div class="row">
                        <h3 class="mb20">No Data</h3>
                    </div>
                </div>
                <div class="tab-pane" id="engaged">
                    <div class="row">
                        <h3 class="mb20">No Data</h3>
                    </div>
                </div> --}}
            </div>
        </section>
        <!--tab-->


    </div>


    <section class="recomend-part mt20 p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="">
                     <h3>Recommended Deals</h3>
                    
                  </div>
               </div>
               <div class="
                        col-lg-2">
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
                            @if($products)
                                @foreach ($products as $product)
                                    
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
                                        <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif</span>
                                        @if($product->is_auction) <div> <span> @if ($product->auction_end_date)
                                            Closes: {{Carbon\Carbon::parse($product->auction_end_date)->format('D d M')}}  @endif</span></div> @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    
                            {{-- <div class="product-card">
                                <div class="product-media resimg">
                                    <a href="#!">
                                        <div class="product-img"><img
                                                src="{{ url('public/website/images/dea/motor/c2.jpg') }}" alt="product"></div>

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
                                        <li class="breadcrumb-item"><a href="#!" tabindex="-1">
                                                20,000</a></li>
                                    </ol>
                                    <div class="product-meta"><span>Nissan Magnite</span><br>
                                        <span class="s-used">Used</span>
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Kathmandu </span>
                                    </div>
                                </div>
                            </div> --}}


                            {{-- <div class="product-card">
                                <div class="product-media resimg">
                                    <a href="#!">
                                        <div class="product-img"><img
                                                src="{{ url('public/website/images/dea/motor/c3.jpg') }}" alt="product"></div>

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
                                        <li class="breadcrumb-item"><a href="#!" tabindex="-1">
                                                20,000</a></li>
                                    </ol>
                                    <div class="product-meta"><span>Hyundai i20</span><br>
                                        <span class="s-used">Used</span>
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Kathmandu </span>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="product-card">
                                <div class="product-media resimg">
                                    <a href="#!">
                                        <div class="product-img"><img
                                                src="{{ url('public/website/images/dea/motor/c4.jpg') }}" alt="product"></div>

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
                                        <li class="breadcrumb-item"><a href="#!" tabindex="-1">
                                                20,000</a></li>
                                    </ol>
                                    <div class="product-meta"><span>Honda Jazz</span><br>
                                        <span class="s-used">Used</span>
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Kathmandu </span>
                                    </div>
                                </div>
                            </div> --}}



                        </div>
                    </div>
                </div>

            </div>
    </section>


    <!-----3rd section
      <section class="p30 niche-part">
          <div class="container-fluid">
             <div class="row">
                <div class="col-lg-12">
                   <h5 class="mfs24 mb20">Need help with anything?</h5>
                </div>
                <div class="col-lg-3">
                    <div class="bshadow p10">
                   <img src="{{ url('public/website/images/dea/1.jpg') }}" class="iresponsive">
                   <h6 class="fs18l mt20 mb20">Car buying advice</h6>
                   <p class="fs14l mb20">If you win, you are legally obligated to complete your purchase</p>
                   <a href="#!" class="btn btn-inline post-btn"><span>Discover</span></a>
    </div>
                </div>
                <div class="col-lg-6">
                <div class="">
            <div class="row pr30">

                <div class="col-lg-3 bshadow p10">
                <img src="{{ url('public/website/images/dea/2.jpg') }}" class="iresponsive">
                  
                </div>

                <div class="col-lg-9 bshadow p10">
                <h6 class="fs18l">Car selling advice</h6>
                   <p class="fs14l">From how to best show off your car to getting paid, our car selling advice is here to help.
    </p>
    <a href="#!" class="btn btn-inline post-btn"><span>Discover</span></a>
                     </div>


                <div class="col-lg-12 bshadow mt10">
                <img src="{{ url('public/website/images/dea/3.jpg') }}" class="iresponsive mt20">
                   <h6 class="fs18l mt10">Car Reviews</h6>
                </div>
    </div>
                 </div>


                   
                </div>
                <div class="col-lg-3">

                <div>

                <div class="row">

                <div class="col-lg-12 bshadow p10">
                <img src="{{ url('public/website/images/dea/4.jpg') }}" class="iresponsive">
                   <h6 class="fs18l mt10">Eyes on EVs</h6>
                   <p class="fs14l">If you win, you are legally obligated to complete your purchase</p>
                   
                  
                </div>

               


                <div class="col-lg-12 bshadow p10">
                <img src="{{ url('public/website/images/dea/5.jpg') }}" class="iresponsive mt20">
                   <h6 class="fs18l mt10">Feature Articles</h6>
                </div>
                 </div>

    </div>



                   
                </div>
             </div>
          </div>
       </section>
       3rd section-------->	

    <section class="p30 niche-part pb60">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-12 mb20">


                    <div class="account-title manageads1 bord0">
                        <h6 class="mfs24 mb20">Popular Searches</h6>

                        <div>
                            <a href="login.html" class="vall2 fs18l2"><span>View all <i
                                        class="fa fa-arrow-right"></i></span></a>
                        </div>

                    </div>


                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Cars </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Toyoto Sales</a></li>
                        <li><a href="#!" class="lpink">Toyoto Sales</a></li>
                        <li> <a href="#!" class="lorg">Toyoto Sales</a></li>
                    </ul>





                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Caravans & Motorhomes </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Toyoto Sales</a></li>
                        <li><a href="#!" class="lpink">Toyoto Sales</a></li>
                        <li> <a href="#!" class="lorg">Toyoto Sales</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Marine </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Toyoto Sales</a></li>
                        <li><a href="#!" class="lpink">Toyoto Sales</a></li>
                        <li> <a href="#!" class="lorg">Toyoto Sales</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Car Parts </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Toyoto Sales</a></li>
                        <li><a href="#!" class="lpink">Toyoto Sales</a></li>
                        <li> <a href="#!" class="lorg">Toyoto Sales</a></li>
                    </ul>
                </div>



            </div>
        </div>
    </section>
	
	<section class="recomend-part mt20 p30">
        <div class="container-fluid">
            <div class="row">


		<p>Dealmih is the leading one-stop platform for our valued customers who are planning to buy residential and commercial new and used vehicles in Nepal. When you buy four-wheeler vehicle in Lalitpur, you need to examine for important features such as fuel efficiency, safety, and comfort. With us, anyone can buy or sell their vehicle in Nepal.</p>
		<p>Dealmih also facilitates you to list your vehicle for sale in Kathmandu, as this is our mission to provide the best possible price for your vehicles. To make online dealing convenient, we provide a platform that displays new and used vehicles for our customers for residential and commercial use. If you are planning to buy vehicle in affordable price Kathmandu, then Dealmih is the best choice for you to search for vehicles from a variety of choices. Our variety of vehicles ranges from new and used two-wheeler to four-wheeler vehicles, from which you can directly sell your vehicles to other consumers through our online platform. We always strive to make online shopping for our customers convenient by offering vehicles at affordable prices.</p>

		</div>

		</div>
		</div>


@endsection

@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}
    <script>
        // var category = "";
        // var subCategory = "";
        // var path = "{{ url('product-title') }}";
        // $('input.typeahead').typeahead({
        //     source: function(query, process) {
        //         return $.get(path, {
        //             query: query,
        //             slug: "car-motor-bike-or-boat",
        //             category: category
        //         }, function(data) {
        //             return process(data);
        //         });
        //     }
        // });

        $('.category').on('change', function() {
            category = $(this).val();
        })
        $('.keyword').on('change', function()
        {
            subCategory = $(this).val();
            // alert(subCategory);
        })

        


        

          //category sub category search tab
    var  mainCategory ="";
    var subCategoryId = "";
    $(document).ready(function() {
        
            mainCategory = $('.main-category').data('id');
            $('.category-value').val(mainCategory);
        //     subCategoryId = $('.sub-cate-first-val').val();
        // console.log(subCategoryId);
            subCategoryValue()
           
        });

        $(document).on('click','.main-category', function()
        {
            
            mainCategory =$(this).data('id');
           
            // alert(mainCategory);
            subCategoryValue();
        })
  

    $(document).on('click','.category-sub',function()
    {
        $('.feature-data-model-result').hide();
         subCategoryId = $(this).data('id');
        
        $('.sub-cate-first-val').val(subCategoryId);
        featureDataes();
    })


    function subCategoryValue()
    {
        $.ajax({
                url:base_url +"property/subcategory",
                type:"get",
                data:{mainCategory:mainCategory},
                success:function(data)
                {
                
                    $('.sub-category-result').html(data.html);
                    subCategoryId = data.subCategoryFirstId;
                    featureDataes();
                   
                },error:function(data)
                {

                }
            })
    }


    function featureDataes()
    {
        $.ajax({
                url:base_url +"motor/feature-data",
                type:"get",
                data:{subCategoryId:subCategoryId},
                success:function(data)
                {
                        $('.feature-data').html(data.featuerData);
                },error:function(data)
                {

                }
            })
    }

    
    $(document).on('change', '.district', function(e) {
        var id = $(this).val();
        var sel = $('.municipality');
        var village = $('.village');
        var url = base_url + 'municipality';
        $.post(url, {
            id: id
        }, function(data) {
            var dataList = data.data;
            var villageList = data.village;
            console.log(villageList);
            sel.html('<option value="">Muncipality/Nagarpalika</option>');
            village.html('<option value="">Village</option>');

            $.each(dataList, function(key, value) {
                sel.append('<option value=' + value.municipality_id + '>' + value
                    .municipality_name + '</option>');
            });

            $.each(villageList, function(villageKey, villagevalue) {
                village.append('<option value=' + villagevalue.id + '>' + villagevalue.name +
                    '</option>');
            });
        });
    });

    $(document).on('change','.feature-data-value', function()
    {
        var dataId = $(this).val();
        $.ajax({
            type:"post",
            url:base_url+"motor/feature-data-model",
            data:{dataId:dataId},
            success:function(data)
            {
                $('.feature-data-model-result').show();
                console.log(data.html);
                $('.feature-data-model-result').html(data.html);
            },error:function(data)
            {

            }
        })
       
    })
    </script>


{{-- <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script> --}}




    <script src="{{ url('public/website/js/classified/search.js') }}"></script>
    <script>
        $(document).on('change', '.district', function(e) {
            var id = $(this).val();
            var sel = $('.municipality');
            var village = $('.village');
            var url = base_url + 'municipality';
            $.post(url, {
                id: id
            }, function(data) {
                var dataList = data.data;
                var villageList = data.village;
                console.log(villageList);
                sel.html('<option value="">Muncipality/Nagarpalika</option>');
                village.html('<option value="">Village</option>');

                $.each(dataList, function(key, value) {
                    sel.append('<option value=' + value.municipality_id + '>' + value
                        .municipality_name + '</option>');
                });

                $.each(villageList, function(villageKey, villagevalue) {
                    village.append('<option value=' + villagevalue.id + '>' + villagevalue.name +
                        '</option>');
                });
            });
        });
    </script>


<script>
    $('.sub-category').on('click', function()
    {
        var ids = $(this).data('id');
        var content = $(this).data('content');
        $('.subcategories').val(ids);
        $('.all-category').html(content);
    })
</script>


@endsection



