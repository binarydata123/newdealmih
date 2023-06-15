@extends('website.layout.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <div>
        <section class="banner-part5" @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/property.jpg);"  @endif>
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="yl"><span class="bghead">
                                @if($cms) Buy/Sale & Rent Property in Nepal Online @else
                                Shop Our Unique Range Of New & Used @endif</span>
                            </h1>
                        </div>
                    </div>
                    @php
                        $typeCategory = "";
                    @endphp
                   
                    <form method="get" action="{{ url('search/property') }}">
                    <div class="row newsletter">

                        <div class="col-lg-3 col-md-12">
                            <div class="form-group">
                                <select class="form-control newfm category bgwt" name="category[]">
                                    <option value="">All Categories</option>
                                   @if($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                   @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-8 mlm30 padr0">
                            <div class="form-group form-control bordr0 bdxs82">
                                <i class="fa fa-search hidden-x"></i>
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}} " name="search[]">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor bdxs8">
                                    <span class="hidden-x">{{trans('global.search_property')}}</span>
                                    <span class="visible-xs"><i class="fa fa-search"></i></span>
                            </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>


        
 

        <!--tab-->
        <section class="mar30 niche-part pb60 sbox">
            <div class="container bgwhite formwht">
                <form action="{{url('search/property')}}" method="get">
                    @csrf
                    <input hidden type="text" name="typeCategory"  class="typeCategory"  id="sad">

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
                                
                                    <p class="ffs14 sp-top0">Location</p>
                                <fieldset>
                                    <!-- <legend class="mbm12">Location</legend> -->
                                    <select class="form-control b0 district" name="district"  >
                                        <option value="">All Location</option>
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
                        {{-- <div class="col-lg-4 land-hide property-hide">
                            <div class="form-group">
                            <p class="ffs14">Property Type</p>
                              <div class="dropdown">
                          <label class="dropdown-label">Property Type</label>

                            <div class=" dropdown-list">
                                <div class="checkbox">
                                    <input type="checkbox" name="property_type[]" class="check-all checkbox-custom property_type" id="checkbox-main1" />
                                    <label for="checkbox-main1" class="checkbox-custom-label">All</label>
                                  </div>
                            </div>
                          
                        </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-4">
                            <div class="form-group mt25">
                                <fieldset>
                                    {{-- <legend class="mbm12">  </legend> --}}
                                    <select class="form-control b0 municipality" name="municipality" multiple="multiple">
                                        <option value="">All Municipality/Nagarpalika</option>
                                       
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mt25">
                                <fieldset>
                                    {{-- <legend class="mbm12">Villages</legend> --}}
                                    <select class="form-control b0 village" name="village" multiple="multiple">
                                        <option value="">All Villages</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-4" style="display: none;">
                        <!-- <div class="col-lg-4 keyword_search-hide" style="display: block;"> -->
                            <div class="form-group mt25">
                                <div class="form-group">
                                    
                                <div class="form-control h52">
                                <input type="text" placeholder="keyword" name="keyword_search" id="keyword_search" class="keyword_search">
                                </div>    
                            </div>
                            </div>
                        </div>


                        <div class="col-lg-4 ">
                            <div class="row ml0">
                                <div class="col-lg-6 pl0">
                                    <div class="form-group">
                                        <p class="ffs14 rent-price">Price</p>
                                        <select class="form-control h52" name="price">
                                            <option value="">Minimum</option>
                                            <option value="10000">10k</option>
                                            <option value="20000">20k</option>
                                            <option value="30000">30k+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 pl0">
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
                        
                        {{-- land area  --}}
                        <div class="col-lg-4 land-area">
                            <div class="row ml0">
                                <div class="col-lg-6 pl0">
                                    <div class="form-group">
                                        <p class="ffs14">Land Area</p>
                                        <!-- <select class="form-control h52" name="land_area_start">
                                            <option value="">Enter Unit</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select> -->
                                     <input type="text" class="form-control h52" placeholder="Enter Unit" name="land_area_unit_number" id="keyword_search" class="keyword_search">

                                    </div>
                                </div>

                                <div class="col-lg-6 pl0">
                                    <div class="form-group">
                                        <p class="fo12">&nbsp;</p>
                                        <select class="form-control h52" name="land_area">
                                            <option value="">Select Land Area Type</option>
                                            <option value="1">Aana</option>
                                            <option value="2">Dhur</option>
                                            <option value="3">Kattha</option>
                                            <option value="4">Bigha</option>
                                            <option value="5">Ropani</option>
                                            <option value="6">Paisa</option>
                                            <option value="7">Dam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 land-type" style="display: none;">
                            <div class="form-group mt15" >
                                <fieldset>
                                    <legend class="mbm12">Type</legend>
                                    <select class="form-control b0 land_type" name="land_type"  >
                                        <option value="">Select Type</option>
                                        <option value="1">For sale</option>
                                        <option value="2">For rent</option>

                                        
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4 land-hide bed_room_bath_room-hide commercial-hide">

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
                                <div class="col-lg-6 pl0">
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
                        <div class="col-lg-4 property-use commercial-hide" >
                            <div class="form-group">
                                <p class="ffs14">Property Use</p>
                                <select class="form-control h52" name="bathroom">
                                    <option value="">All</option>
                                    {{-- <option value="">Property Use</option> --}}
               <option value="1">Development Site</option>
               <option value="2">Hotel/Leisure</option>
               <option value="3">Industrial</option>
               <option value="3">Office</option>
               <option value="4">Retail</option>
               <option value="5">Tourism</option>
               <option value="6">Other</option>
                                   
                                </select>
                        </div>
                        </div>
                        {{-- <div class="col-lg-4 > --}}
                            <div class="col-lg-4 existing_flatmate" style="display: none">
                                <div class="form-group">
                                    <p class="ffs14">Existing Flatemates</p>
                                    @php
                                        $i = 1;
                                    @endphp
                                        <select class="form-control h52 district" name="district">
                                            <option value="">All Districts</option>
                                         @for($j=1;$i <= 20 ; $i++)
                                         <option value="">{{$i}}</option>

                                         @endfor
                                        </select>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 existing_flatmate" style="display: none">
                                <div class="form-group">
                                    <p class="ffs14">BedRooms</p>
                                    <select class="form-control h52" name="bedroom">
                                        <option value="">Minimum</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 existing_flatmate" style="display: none">
                                <div class="form-group">
                                    <p class="ffs14">Bathrooms</p>
                                    <select class="form-control h52 " name="bathroom">
                                        <option value="">Minimum</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3+</option>
                                    </select>
                                </div>
                            </div>
                        <!--     <div class="col-lg-4 existing_flatmate" style="display: none">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <p class="ffs14">Smokers Ok</p>
                                    <select class="form-control h52" name="restrict">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>                                       
                                    </select>
                                    </div>
                                    </div>
                                       <div class="col-lg-6">
                                    <div class="form-group">
                                    <p class="ffs14">Pets Ok</p>
                                    <select class="form-control h52" name="restrict">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>                                       
                                    </select>
                                    </div>
                                    </div>
                                </div>
                            </div> -->
                        {{-- </div> --}}
                      <!--   <div class="col-lg-4 business-type" style="display: none">
                        <div class="form-group">
                            <p class="ffs14">Business Type</p>
                            <select class="form-control property_type" name="property_type">
                                <option value="">Select business type</option>
                                <option value="1">Internet & technology</option>
                                <option value="2"> Manufacturing </option>
                                <option value="3"> Retail </option> 
                                <option value="4"> Services </option>
                                <option value="5"> Tourism & hospitality </option>
                                <option value="6">Other</option>
                                
                            </select>
                            <span class="error" style="color: red;"></span>
                        </div>
                        </div> -->
 <!----new------>
                     <div class="col-lg-4 land-hide property-hide" style="text-align:left">
                     <div class="form-group">
                     <p class="ffs14">Property Type</p>
<div class="dropdown">
  <label class="dropdown-label">Property Type</label>

  <div class="dropdown-list">
    <div class="checkbox">
      <input type="checkbox" name="property_type[]" class="check-all checkbox-custom property_type" id="checkbox-main1" />
      <label for="checkbox-main1" class="checkbox-custom-label">All</label>
    </div>

    <div class="checkbox">
      <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="1" id="checkbox-custom_21" />
      <label for="checkbox-custom_21" class="checkbox-custom-label">Builder Floor</label>
    </div>

    <div class="checkbox">
      <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="2" id="checkbox-custom_22" />
      <label for="checkbox-custom_22" class="checkbox-custom-label">Farm House</label>
    </div>

    <div class="checkbox">
      <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="3" id="checkbox-custom_23" />
      <label for="checkbox-custom_23" class="checkbox-custom-label">Houses &amp; Villas</label>
    </div>

    <div class="checkbox">
      <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="4" id="checkbox-custom_24" />
      <label for="checkbox-custom_24" class="checkbox-custom-label">Appartments</label>
    </div>

    <div class="checkbox">
        <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="5" id="checkbox-custom_25" />
        <label for="checkbox-custom_25" class="checkbox-custom-label">Hostel</label>
      </div>


      <div class="checkbox">
        <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="6" id="checkbox-custom_26" />
        <label for="checkbox-custom_26" class="checkbox-custom-label">PG &amp; Guest house</label>
      </div>

      <div class="checkbox">
        <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="7" id="checkbox-custom_27" />
        <label for="checkbox-custom_27" class="checkbox-custom-label">Room</label>
      </div>

      <div class="checkbox">
        <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="8" id="checkbox-custom_28" />
        <label for="checkbox-custom_28" class="checkbox-custom-label">Flat</label>
      </div>

      <div class="checkbox">
        <input type="checkbox" name="property_type[]" class="check checkbox-custom property_type" value="9" id="checkbox-custom_29" />
        <label for="checkbox-custom_29" class="checkbox-custom-label">Car Park</label>
      </div>

      




  </div>
</div>
                            </div>
                            </div>
                    <!----new----->
                        <div class="col-lg-8 check-status mt-4" id="vmore" style="text-align:left">
                            <div class="form-group">
                                {{-- <input type="checkbox">&nbsp; <label for="fix-check" class="form-check-text fs14o"> Search
                                    nearby Suburbs &nbsp;&nbsp;&nbsp;</label> --}}
                                <input type="checkbox" name="used" value="1">&nbsp; <label for="nego-check" class="form-check-text fs14o"> Used
                                    Homes only &nbsp;&nbsp;&nbsp;</label>
                                <input type="checkbox" name="brand_new" value="2">&nbsp; <label for="day-check" class="form-check-text fs14o"> New
                                    Homes only </label>
                            </div>
                        </div>
                        <div align="right" class="col-lg-12 text-mobile-center">
                        <!-- <button type="button" class="btn btn-info fil mb20xs" data-toggle="collapse" data-target="#vmore">More Options <i class="fa fa-sort" aria-hidden="true"></i></button> -->
                            <button class="btn btn-inline fil"> Search Property</button>
                           
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="subCategoryName" class="sub-category-name" id="">
            </form>

            </div>
        </section>
        <!--tab-->
		
		
		 
		 <section class="mt20 recomend-part">
            <div class="container">
                <div class="row">
                    <div class="webads-image">
                        <input type="hidden" name="ne_title" value="{{$webads->ne_title}}" id="ne_title">
                        @if($webads) 
                        <a target="_blank" href="{{$webads->ne_title}}">
                           <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image"></a>
                            @else 
                        <img src="{{ url('public/website/images/dea/job.jpg') }}" class="img-responsive">
                        @endif
                    </div>
                </div>

            </div>
        </section>
        
        @if ($products->count() > 0)
            <section class="recomend-part mt20 p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10 col-xs-8">
                            <div class="">
                                <h3>Recommended Deals</h3>
                                <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>

                            </div>
                        </div>
                        <div class="
                            col-lg-2 col-xs-4">
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

                                
                                @if ($product->is_sold == 0)
                                    
                                
                                    <div class="product-card">
                                        <div class="product-media resimg">
                                            <a href="{{ url('property-detail/' . $product->slug) }}">
                                                @if($product->is_sold == '1')<span style="position: absolute;background: #ff0000;margin-left: 5px;margin-top: 5px;padding: 0 15px 0 15px;color: #fff;font-size: 14px;border-radius: 3px;z-index: 9999 !important;">Sold</span>@endif
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
                                                                    class="@if($product->Wishlist) @if ($product->Wishlist->user_id == Auth::user()->id) fa fa-heart wishlist fas @endif @else fa fa-heart wishlist  @endif"></button>
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
                                                <li class="breadcrumb-item">
                                                    <a href="{{ url('product/detail/' . $product->slug) }}">
                                                        {{ number_format($product->price) }} 
                                                        @if($product->subcategory) 
                                                            @if($product->subcategory->slug == 'land')
                                                                @php
                                                                    $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                                                                @endphp
                                                                @if($product_data)
                                                                    @php
                                                                        $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $feature_data = array();
                                                                    @endphp
                                                                @endif
                                                                @if($feature_data)
                                                                    @if($feature_data->data_name == 'for rent')
                                                                        <small>Per month</small> 
                                                                    @endif
                                                                @endif
                                                            @else
                                                                @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' ||  $product->subcategory->slug =='flat-or-room-mates') 
                                                                    <small>Per month</small>
                                                                @endif 
                                                            @endif
                                                        @endif
                                                    </a>
                                                </li>       
                                            </ol>
                                            <div class="product-meta" style="height: 30px"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}"class="product-title-color">{{ ucwords(Str::limit($product->title,35)) }}</a></span> 
                                                {{-- <span class="s-used">Used</span> --}}
                                            </div>
                                            &nbsp;  &nbsp;   &nbsp;<i class="fa fa-shower"></i> 
                                            @if(isset($product->propertyFeature->bathrooms)){{$product->propertyFeature->bathrooms}}@endif 
                                            &nbsp; <i class="fa fa-bed"></i> @if(isset($product->propertyFeature->bedrooms)){{$product->propertyFeature->bedrooms}}@endif 
                                            &nbsp;  &nbsp;   &nbsp;
                                            @if ($product->districtList) <span><i class="fas fa-map-marker-alt"></i> 
                                            {{ $product->districtList->district_name }} </span> @endif
                                            <div class="product-info">
                                            
                                                @if($product->is_auction)  <span> @if ($product->auction_end_date)
                                                    Closes: {{Carbon\Carbon::parse($product->auction_end_date)->format('D d M')}}  @endif
                                                </span> @endif
                                                    &nbsp;  &nbsp;   &nbsp;<small style="color: #00a773">
                                                     Listed Date : {{$product->created_at->format('Y M d')}} </small>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            @include('website.no-data')
        @endif
     
    </div>
	
	<section class="mar30 niche-part pb60 sbox">
            <div class="container">
                <div class="row">
				<center><h2 style="font-size:26px;">Affordable Real Estate Property for Rent and Sale in Nepal</h2></center><br>
		<center><h4 style="text-align: center;">Assisting People to Live a Relaxing Lifestyle in Nepal</h4>	</center>
		<p style="text-align:justify;"> Dealmih is a pioneering estate platform that offers affordable real estate for rent in Kathmandu and is committed to easing the transitions of selling, renting, and managing the properties of property owners or developers. You can easily list your property for rent in Bhaktapur and get the best valuation of your properties like houses, lands, and apartments with us. The luxurious residences at Dealmih are also located for very affordable prices to enjoy your retired life in the lap of luxury. Property growth in Nepal, especially in Kathmandu, Bhaktapur, and Lalitpur, is accelerating daily. You can also rent residential property in Lalitpur to benefit from your dream home.</p>
		<br/><p style="text-align:justify;">Dealmih is for home owners, property dealers & real estate companies. Anyone can advertise their property listing here either agent, owner, or company. We provide our valued customers with the greatest and most reasonably priced Kathmandu homes for sale in the center of the capital city of Nepal. Due to this, you may take advantage of the town's retail opportunities and live a lavish and comfortable life with your family. People who invest in buying homes in Nepal enjoy a tranquil and quiet lifestyle because of its scenic beauty surrounded by the Himalayas. A well-known real estate and rental marketplace called Dealmih was created to assist customers with real estate services. We provide secure Buy & Sale platforms for the people of Nepal.</p>
         </div>

            </div>
        </section>


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
            $('.rent-price').html('Price');

            // $('.check-status').hide();
           $('.land-type').hide();
        $('.land-hide').hide();
        $('.existing_flatmate').hide();
        $('.land-area').hide();
        $('.business-type').hide();
          

            mainCategory =$(this).data('id');
      
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
                    $('.check-status').hide();
                    if(data.subCategorySlug == 'for-sale-houses-apartments' || data.subCategorySlug == 'residential-house-rent')
                    {
                       $('.check-status').show();
                     
            $('.property-hide').show();

                    }
                 
        $('.land-area').hide();
        $('.commercial-hide').show();
        $('.property-use').hide();
        $('.keyword_search-hide').hide();
        if(data.subCategorySlug == 'business-for-sale')
        {
           
            $('.property-hide').hide();
            $('.business-type').show();
          
            $('.bed_room_bath_room-hide').hide();
            $('.keyword_search-hide').show();
        }
        if(data.subCategorySlug == 'commercial-shop-office')
        {
            
            $('.property-hide').hide();
            // $('.property-hide').show();
            $('.commercial-hide').hide();
           // $('.property-use').show();
        }
                    // if(data.subCategorySlug == '')
                    // {
                    //     $('.')
                    // }

                },error:function(data)
                {

                }
            })
    }

    $(document).on('click','.category-sub',function()
    {
        var dataContent = $(this).data('content');
       
        $('.sub-category-name').val(dataContent);
        
        $('.rent-price').html('Price');
        if(dataContent == 'for-rent-houses-apartments' || dataContent == 'flat-or-room-mates' || dataContent == 'for-rent-shop-office-land')
        {
           
            $('.rent-price').html('Rent Per Month');
        }

        
       if(dataContent == 'for-rent-shop-office-land' || dataContent =='for-sale-shop-office-land')
       {
          
        $('.land-hide').hide();
        $('.bed-bath-hide').hide();
          
       }
       else
       {
        $('.land-hide').show();
       }
        $('.typeCategory').val('');
      
        $('.check-status').hide()
        $('.bed_room_bath_room-hide').show();
        $('.existing_flatmate').hide();
        $('.land-area').hide();
        $('.land-type').hide();
        $('.commercial-hide').hide();
        $('.keyword_search-hide').hide();
        if(dataContent == 'flat-or-room-mates')
        {
            $('.typeCategory').val('');
        }
        if(dataContent == 'land')
        {
            $('.land-hide').hide();
            $('.land-area').show();
            $('.land-type').show();
        }
        if(dataContent == 'for-sale-houses-apartments' || dataContent == 'for-rent-houses-apartments')
        {
            
            $('.check-status').show()
            $('.bed_room_bath_room-hide').show();
        }
        if(dataContent == 'flat-or-room-mates')
        {
            $('.existing_flatmate').show();
            $('.bed_room_bath_room-hide').hide();
        }
        if(dataContent == 'business-for-sale')
        {
          
            $('.bed_room_bath_room-hide').hide();
        }
        
        var cateSub = $(this).data('id');
        $('.sub-cate-first-val').val(cateSub);
    })


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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    function checkboxDropdown(el) {
  var $el = $(el);

  function updateStatus(label, result) {
      console.log(result);
    if (!result.length) {
      label.html("Select Options");
    }
  }

  $el.each(function (i, element) {
    var $list = $(this).find(".dropdown-list"),
      $label = $(this).find(".dropdown-label"),
      $checkAll = $(this).find(".check-all"),
      $inputs = $(this).find(".check"),
      defaultChecked = $(this).find("input[type=checkbox]:checked"),
      result = [];

    updateStatus($label, result);
    if (defaultChecked.length) {
      defaultChecked.each(function () {
        result.push($(this).next().text());
        $label.html(result.join(", "));
      });
    }

    $label.on("click", () => {
        
      $(this).toggleClass("open");
    });

    $checkAll.on("change", function () {
       
      var checked = $(this).is(":checked");
      var checkedText = $(this).next().text();
    //   var checkedText = $inputs.next().text();
      
    //   console.log(propertyText);
      result = [];
      if (checked) {
        result.push(checkedText);
        $label.html(result.join(", "));
        $inputs.prop("checked", true);
      } else {
        // $label.html(result);
        $inputs.prop("checked", false);
        let index = result.indexOf(checkedText);
        if (index >= 0) {
          result.splice(index, 1);
        }
        $label.html(result.join(", "));

      }
      updateStatus($label, result);
    });

    $inputs.on("change", function () {
      
      var checked = $(this).is(":checked");
      var checkedText = $(this).next().text();
      if ($checkAll.is(":checked")) {
        result = [];
      }
      if (checked) {
        result.push(checkedText);
        $label.html(result.join(", "));
        $checkAll.prop("checked", false);
      } else {
        let index = result.indexOf(checkedText);
        if (index >= 0) {
          result.splice(index, 1);
        }
        $label.html(result.join(", "));
      }
      updateStatus($label, result);
    });

    $(document).on("click touchstart", (e) => {
      if (!$(e.target).closest($(this)).length) {
        $(this).removeClass("open");
      }
    });
  });
}

checkboxDropdown(".dropdown");


$('.municipality').select2({
            selectOnClose: true,
            placeholder:'All Municipality/Nagarpalika'
        });
$('.village').select2({
            selectOnClose: true,
            placeholder:'All Villages'
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
                   $('.alert-msg').addClass("alert-success");

                },
                error: function() {

                }
            })
        })


    </script>

@endsection
