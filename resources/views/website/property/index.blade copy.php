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
    </style>

<style>
    .bgwhite2 .fa-minus:before {
     content: "\f106";
     color: #fc7c55 !important;
     font-size: 21px !important;
 }
 
 .bgwhite2 .fa-plus:before {
     content: "\f107";
     color: #fc7c55 !important;
     font-size: 21px !important;
 }
     </style>
@endsection
@section('content')
    <div>
        <section class="banner-part5">
            <div class="container-fluid">
                <div class="banner-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="yl"><span class="bghead">Shop our unique range of new & used</span>
                            </h1>
                        </div>
                    </div>
                    @php
                        $typeCategory = "";
                    @endphp
                   
                    <form method="get" action="{{ url('search/property') }}">
                    <div class="row newsletter">

                        <div class="col-lg-2 col-md-12">
                            <div class="product-widget psr">
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
                                           <li>dsds</li> 
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
                                <button class="btn btn-inline22 bbtnmotor"><span>Search Property</span></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>


        <!--tab-->
        <section class="mar30 niche-part pb60 sbox">
            <div class="container bgwhite">
                <form action="{{url('search/property')}}" method="get">
                    @csrf
                    <input hidden type="text" name="typeCategory"  class="typeCategory"  id="">

                <div class="row">
                    <div class="col-lg-12 pl0">
                        <div class="niche-nav">
                            <ul class="nav nav-tabs tableft navwp">
                                @if($categories)
                                    @foreach($categories as $key=> $category)
                                <li><a href="#ratings" class="nav-link @if($key+1 == 1) active @endif main-category" 
                                    data-id="{{$category->id}}" data-toggle="tab">
                                    @if ($category->slug =='residential-house-rent' )
                                        Residential
                                        @elseif($category->slug == 'commercial-shop-office')
                                        Commercial
                                        @elseif($category->slug == 'business-for-sale')
                                        Business For Sale
                                    @endif</a></li>
                                    @endforeach
                                @endif
                                {{-- <li><a href="#advertiser" class="nav-link" data-toggle="tab">Commercial</a></li> --}}
                                {{-- <li><a href="#engaged" class="nav-link" data-toggle="tab">Spare parts</a></li>
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
                                        <li><a href="#all" class="nav-link active" data-toggle="tab">For Sale</a></li>

                                        <li><a href="#new" class="nav-link" data-toggle="tab">For Rent</a></li>
                                        <li><a href="#used" class="nav-link" data-toggle="tab">Flatmates</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    <div class="row ml0">
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">Location</legend>
                                    <select class="form-control b0 district" name="district">
                                        <option value="">Select District</option>
                                        @if ($districts)
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->district_id }}">
                                                            {{ ucwords($district->district_name) }}</option>
                                                    @endforeach
                                                @endif
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">&nbsp;</legend>
                                    <select class="form-control b0 municipality" name="municipality">
                                        <option value="">Municipality/Nagarpalika</option>
                                       
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">&nbsp;</legend>
                                    <select class="form-control b0 village" name="village">
                                        <option value="">Village</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row ml0">
                                <div class="col-lg-6 pl0">
                                    <div class="form-group">
                                        <p class="ffs14">Price</p>
                                        <select class="form-control h52" name="price">
                                            <option value="">Minimum</option>
                                            <option value="10000">10k</option>
                                            <option value="20000">20k</option>
                                            <option value="30000">30k+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="fo12">&nbsp;</p>
                                        <select class="form-control h52" name="maxprice">
                                            <option value="">Maximum</option>
                                            <option value="100000">100k</option>
                                            <option value="200000">200k</option>
                                            <option value="300000">300k+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="row ml0">
                                <div class="col-lg-6 pl0">
                                    <div class="form-group">
                                        <p class="ffs14">Bedrooms</p>
                                        <select class="form-control h52" name="bedroom">
                                            <option value="">Minimum</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5+</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="ffs14">Bathrooms</p>
                                        <select class="form-control h52" name="bathroom">
                                            <option value="">Minimum</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <p class="ffs14">Property Type</p>
                               
                                    <select class="form-control h52 property_type" name="property_type">
                                        <option value="">Type</option>
                                        <option value="1">Builder Floor</option>
                                        <option value="2">Farm House</option> 
                                        <option value="3">Houses &amp; Villas</option>
                                        <option value="4">Appartments</option>
                                        <option value="5">Hostel</option>
                                        <option value="6">PG &amp; Guest house</option>
                                    </select>
                               
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                {{-- <input type="checkbox">&nbsp; <label for="fix-check" class="form-check-text fs14o"> Search
                                    nearby Suburbs &nbsp;&nbsp;&nbsp;</label> --}}
                                <input type="checkbox" name="used" value="2">&nbsp; <label for="nego-check" class="form-check-text fs14o"> Used
                                    Homes only &nbsp;&nbsp;&nbsp;</label>
                                <input type="checkbox" name="brand_new" value="1">&nbsp; <label for="day-check" class="form-check-text fs14o"> New
                                    Homes only </label>
                            </div>
                        </div>
                        <div align="right" class="col-lg-12">
                            <button class="btn btn-inline fil"> Search Property</button>
                           
                        </div>
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

        @if ($products->count() > 0)
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
                                  <a href="{{url('search/property')}}">  <h5>View all <i class="fas fa-arrow-right"></i></h5> </a>
                                </u>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="recomend-slider slider-arrow">
                                @foreach ($products as $product)
                                    <div class="product-card">
                                        <div class="product-media resimg">
                                            <a href="{{ url('property-detail/' . $product->slug) }}">
                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif
                                                </div>
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
                                        </a>
                                        <div class="product-content">
                                            <ol class="breadcrumb product-category">
                                                <li>
                                                    <p class="product-price tblak"> रू</p>
                                                </li>
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}">
                                                        {{ number_format($product->price) }}</a></li>
                                            </ol>
                                            <div class="product-meta"><span>{{ ucwords($product->title) }}</span><br>
                                                <span class="s-used">Used</span>
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif</span>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            @include('website.no-data')
        @endif
        {{-- <section class="p30 niche-part pb60">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb20">
                        <div class="account-title manageads1 bord0">
                            <h6 class="mfs24 mb20">Popular Searches</h6>
                            <div>
                                <a href="{{url('search/property')}}" class="vall2 fs18l2"><span>View all <i
                                            class="fa fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p class="fs18l3 mb20"> Pets and animals </p>
                        <ul>
                            <li> <a href="#!" class="lblu">Dogs for sale</a></li>
                            <li><a href="#!" class="lpink">Puppies for sale</a></li>
                            <li> <a href="#!" class="lorg">Livestock</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
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
                    </div>
                </div>
            </div>
        </section> --}}
    </div>


@endsection
@section('js')
    <script src="{{ url('public/website/js/classified/wishlist.js') }}"></script>

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var category = "";
        var subCategory = "";
        var path = "{{ url('product-title') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query,
                    slug: "property",
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
            sel.html('<option value="">Municipality/Nagarpalika</option>');
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
    var navValue = 1 ;
    $('.property-nav').on('click',function()
    {
        var dataId = $(this).data('id');
        $('.nav-value').val(dataId);
    })

    //category sub category search tab
    var  mainCategory ="";
    
    $(document).ready(function() {
        
            mainCategory = $('.main-category').data('id');
            $('.category-value').val(mainCategory);
            subCategory()
        });

        $(document).on('click','.main-category', function()
        {
            
            mainCategory =$(this).data('id');
            // alert(mainCategory);
            subCategory();
        })
    function subCategory()
    {
        $.ajax({
                url:base_url +"property/subcategory",
                type:"get",
                data:{mainCategory:mainCategory},
                success:function(data)
                {
                    $('.sub-category-result').html(data.html);
                },error:function(data)
                {

                }
            })
    }

    $(document).on('click','.category-sub',function()
    {
        var dataContent = $(this).data('content');
        $('.typeCategory').val('');
        if(dataContent == 'flat-or-room-mates')
        {
            $('.typeCategory').val('flat-or-room-mates');
        }
        var cateSub = $(this).data('id');
        $('.sub-cate-first-val').val(cateSub);
    })

</script>
@endsection
