@extends('website.layout.app')
@section('css')
<style>
    /*.dropdown-submenu {
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
}*/
/*.product-meta span {
    white-space: unset !important;
    height: 100%;
    min-height: 100px;
}*/
    </style>
  
@endsection
@section('content')

<!-- popup css -->
<!-- <style type="text/css">
    body {
            background-color: #f4f4f4;
        }

        #modalOverlay {
            position: fixed;
            top: 5%;
            left: 21%;
            z-index: 99999;
            height: 100%;
            width: 100%;
        }

        .facebook {
            background-color: #4267b2;
            border: 1px solid #4267b2;
            padding: 0px 0px;
            color: #fff;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .Google {
            background-color: #4285f4;
            border: 1px solid #4285f4;
            padding: 0px 0px;
            color: #fff;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .container.container-1 {
            max-width: 800px;
            background-color: #fff;           
            padding: 0px 0px 50px 0px;
/*            background: rgba(255, 255, 255, 0.8);
*/            margin: 0 auto;
            width: 100%;
            position: relative;
            height: 600px !important;
        }
        .icon {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        .width-btn {
            width: 100%;
            background: #4267b2;
            border: 0;
            font-size: 1em;
            color: #fff !important;
            padding: 15px;
            cursor: pointer;
            -webkit-transition: background .2s ease-in;
            transition: background .2s ease-in
        }

        .form-control.inputbox {
            display: block;
            width: 100%;
            padding: 13px 0px 13px 10px;
            font-size: 14px;
            line-height: 20px;
            border: 2px solid #d6d6d6;
            border-radius: 4px;
            background-color: #fff;
            color: #353535;
            box-sizing: border-box;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            resize: none;
        }

        ::placeholder {
            display: block;
            width: 100%;

            font-size: 14px;
            color: #9c9c9c !important;

        }

        .line {
            position: relative;
            margin-top: 42px;
        }

        .line::before {
            content: '';
            position: absolute;
            top: -45px;
            left: 50%;
            background-color: #dadbbc;
            width: 2px;
            height: 45px;
        }

        .line::after {
            content: '';
            position: absolute;
            top: 30px;
            left: 50%;
            background-color: #dadbbc;
            width: 2px;
            height: 50px;
        }

        #place p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .col-md-12.justify-content-center {
            max-width: 700px;
        }

        .facetext span {
            font-size: 14px;

        }

        #place a {
            color: #3baa33;
        }

        .pcolor {
            color: #3baa33;
        }

        .width-btn:hover {
            background: #4267b2 !important;
            cursor: pointer;
        }

        p.mb-3.test  {
            font-size: 13px;
        }

        a.test {form-group cheackbox
            font-size: 12px;
        }

        p.mt-3.test {
            font-size: 12px;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        span.size {
    font-size: 13px;
}

 .at-checkbox{
        display: flex;
    }
    a.test {
    font-size: 12px;
}
a.test {
    display: none;
}
span.help-block.ktm {
    font-size: 12px;
}
@media only screen and (max-width: 767px) {
#modalOverlay {
    left: 0px;
    padding: 0px 20px;
    height: 100vh !important;
    overflow-y: scroll;
    top: 0px;
}
    .container.container-1 {
        padding:  0px;

    }
    .at-checkbox{
        display: flex;
    }
    .form-group.cheackbox label{
        line-height: 15px;
        font-size: 12px;
    }
}
</style> -->

<!-- endpopupcss -->


    <section class="banner-part" @if($cms) 
    style="background: url(../../media/cms-image/{{$cms->image}});background-repeat: no-repeat;"
    @else 
    style="background: url(../../website/images/bannerhome.jpg);"  @endif>
        <div class="container-fluid">
            <div class="banner-content xsbg mb40">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="yl"><span class="bghead">@if($cms)
                            {{ucwords($cms->title)}}
                            @else You Buy & You Sell @endif</span></h1>
                    </div>
                </div>

                <div class="row newsletter">
                    {{-- <div class="col-lg-2 col-md-12">

                    <div class="product-widget psr">
                        <h4 class="product-widget-title fils2 fscat" data-toggle="collapse" data-target="#demo33"><i class="fa fa-tasks tblu mr5" aria-hidden="true"></i> All Categories
                        </h4>
                        <div id="demo33" class="collapse" style="position:absolute">
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
                </div> --}}
                    <div class="col-lg-2 col-md-12 hidden-x">
                        <div class="form-group">

                            <select class="form-control newfm slug bgwt" name="slug" >
                                
                                @if ($headerCategories)
                                    @foreach ($headerCategories as $headerCategory)
                                        <option value="{{$headerCategory->slug}}">
                                            @if(request('change_language') == 'ne') 
                                            {{ucwords($headerCategory->ne_name)}}
                                            @else {{ucwords($headerCategory->name)}} @endif </option>
                                    @endforeach
                                    
                                @endif
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="form-box">

                            <select class="form-control lastStudy" id="lastStudy" name="lastStudy">
                                <option value="">All Category</option>
                                 
             <optgroup label="Motor">
       <option value="33">Private Vehicle</option>
   </optgroup>


<optgroup label="Property">
<option value="35">Commerce</option>
                <option value="36">Residancial</option>
               <option value="37">Commercial</option>
               <option value="38">Sale</option>
                                                                                                                                                                        </optgro
                                                                                                

                            </select>
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-12 mlm30 col-xs-8 padr0">
                        <div class="form-group form-control bordr0 bdxs82">
                        <i class="fa fa-search hidden-x"></i>
                            <input class="frmtxt search" type="text" id="search-sections1"
                                placeholder="Search Cars, Mobile Phones, Property and many more... " >
                               <!--   <input class="frmtxt search" type="text" id="search-sections1"
                                placeholder="{{trans('global.search')}}  name="search[]"> -->
                            
 
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 col-xs-4 padl0">
                        <div class="form-group">
                        
                        <!-- btn btn-inline22 bbtn search-button h50 -->
                            <button class="btn btn-inline22 bbtnmotor search-button bdxs8" id="myBtn">
                                <span class="hidden-x">{{trans('global.search')}}</span>
                                <span class="visible-xs"><i class="fa fa-search"></i></span>
                            </button>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>

    <!------------------------------>
    <section class="recomend-part xs35 p30 visible-xs">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xs-6">
                            <div class="catlistxs">
                                <a href="{{url('motor')}}"><i class="fa fa-motorcycle mr10"></i>{{trans('global.motor')}}</a>
                        </div>
                         </div>

                    <div class="col-xs-6">
                    <div class="catlistxsp">
                    <a href="{{url('property')}}"><i class="fa fa-building-o mr10"></i> {{trans('global.property')}}</a>
                        </div>
                    </div>

                    <div class="col-xs-6">
                            <div class="catlistxsy">
                            <a href="{{url('marketplace')}}"><i class="fa fa-shopping-cart mr10"></i> {{trans('global.marketplace')}}</a>
                        </div>
                         </div>

                    <div class="col-xs-6">
                    <div class="catlistxsg">
                    <a href="{{url('jobs')}}"><i class="fa fa-search mr10"></i> {{trans('global.jobs')}}</a>
                        </div>
                    </div>


                    <div class="col-xs-6">
                            <div class="catlistxsr">
                            <a href="{{url('services')}}"><i class="fa fa-cogs mr10"></i> {{trans('global.services')}}</a>
                        </div>
                         </div>

                    <div class="col-xs-6">
                    <div class="catlistxso">
                    <a href="{{url('stores')}}"><i class="fa fa-university mr10"></i> {{trans('global.store')}}</a>
                        </div>
                    </div>

                    <div class="col-xs-6">
                    <div class="catlistxsm">
                    <a href="{{url('auction')}}"><i class="fa fa-gavel mr10"></i> {{trans('global.auction')}}</a>
                        </div>
                    </div>


                    <div class="col-xs-6">
                    <div class="catlistxsv">
                    <a href="{{url('nodata')}}"><i class="fa fa-tags mr10"></i> Business</a>
                        </div>
                    </div>




</div>
</div>
</section>
        <!----------------------------->



    <section class="mt20 recomend-part">
        <div class="container">
            <div class="row">
                <input type="hidden" name="ne_title" value="{{$webads->ne_title}}" id="ne_title">
                <div class="webads-image ">
                    @if($webads ) 
                    @if($webads->ne_title != '')
                    <a target="_blank" href="{{$webads->ne_title}}">
                    <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image"></a>
                    @else
                     <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image">
                     @endif
                @else 
                 <img src="{{ url('public/website/images/dea/ad.png') }}" class="iresponsive">
                @endif
                </div>
            </div>

        </div>
    </section>


 {{-- Premium product  --}}

 @if($premiumProducts->count() > 0)
 <section class="recomend-part mt20 mb40">
   <div class="container-fluid">
       <div class="row">
    
           <div class="col-lg-10 col-xs-8">
               <div class="mb20">
          <h3>{{trans('global.premium_products')}} </h3>
         
       </div>
    </div>
  
   
    <div class="col-lg-2 col-xs-4">
                   <div class="section-center-heading">
                       <u>
                           <h5><a href="{{url('search/market-place')}}">{{trans('global.view_all')}}<i class="fas fa-arrow-right"></i> </a></h5>

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
                               <div>
                                   <div class="the-container2">
                                       <div class="box2">
                                           <p class="fs14b">Premium</p>
                                       </div>
                                   </div>
                               </div> 
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
                                                    @if($premiumProduct->user_id != Auth::user()->id)
                                                        @if($premiumProduct->is_buynow == 1)
                                                            <button type="button" title="Wishlist"
                                                               data-id="{{ $premiumProduct->id }}"
                                                               class="@if($premiumProduct->wishlist) @if ($premiumProduct->wishlist->user_id == Auth::user()->id) 
                                                                fa fa-heart wishlist fas    @else  fa fa-heart wishlist @endif @endif">
                                                            </button>
                                                        @endif
                                                    @endif
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
                                   <div class="product-meta 1"><span data-toggle="tooltip" data-placement="top" title="{{ $premiumProduct->title }}">{{ ucwords(Str::limit($premiumProduct->title,30)) }}</span><br>
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
                                            Closes:@if($premiumProduct->auction_end_date != null) {{ Carbon\Carbon::parse($premiumProduct->auction_end_date)->format('d/m/Y')}}
                                            @else {{ $premiumProduct->created_at->addDays(30)->format('D d M') }} @endif </span></div>
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

<section class="recomend-part mt20 mb40">
    <div class="container-fluid">
        <div class="row">
        @if($auctionProducts->count() > 0)
            <div class="col-lg-10 col-xs-8">
                <div class="mb20">
           <h3>{{trans('global.checkout_the_latest_cool_auction')}} </h3>
          
        </div>
     </div>
     @endif
     @if ($auctionProducts->count() >5)
     <div class="col-lg-2 col-xs-4">
                    <div class="section-center-heading">
                        <u>
                            <h5><a href="{{url('search/market-place')}}">{{trans('global.view_all')}} <i class="fas fa-arrow-right"></i> </a></h5>

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
                                                    @if($auctionProduct->user_id != Auth::user()->id)
                                                        @if($auctionProduct->is_buynow == 1)
                                                            <button type="button" title="Wishlist"
                                                                data-id="{{ $auctionProduct->id }}"
                                                                class="@if($auctionProduct->wishlist) @if($auctionProduct->wishlist->user_id == Auth::user()->id) 
                                                                fa fa-heart wishlist fas    @else  fa fa-heart wishlist @endif @endif">
                                                            </button>
                                                        @endif
                                                    @endif
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
                                    <div class="product-meta 2"><a href="{{url('product/detail/'.$auctionProduct->slug)}}">
                                        <span data-toggle="tooltip" data-placement="top" title="{{ $auctionProduct->title }}">{{ ucwords(Str::limit($auctionProduct->title,30)) }}</span></a><br>
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
                                             Closes: @if($auctionProduct->auction_end_date != null) {{ Carbon\Carbon::parse($auctionProduct->auction_end_date)->format('d/m/Y')}}
                                             @else {{ $auctionProduct->created_at->addDays(30)->format('d/m/Y') }}  @endif </span></div>
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
                <div class="col-lg-10 col-xs-8">
                    <div class="">
               <h3 class="font-mobile">{{trans('global.fresh_recommendations')}}</h3>
              
            </div>
         </div>

         @if($products->count() > 5)
         <div class="col-lg-2 col-xs-4">
                        <div class="section-center-heading">
                            <u>
                                <h5>
                                    <a href="{{url('search/market-place')}}">{{trans('global.view_all')}}
                                    <i class="fas fa-arrow-right"></i> </a>
                                </h5>
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
                                @php
                                        $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                        $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();
                                    @endphp
                                @if($header_category_data->name != 'Jobs')
                                    
                                    <div class="product-card">
                                       
                                            <div class="product-media resimg">
                                                @if($header_category_data->name == 'Jobs')
                                                    <a href="{{url('jobs-detail/'.$product->slug)}}">
                                                        <div class="product-img">
                                                            @if ($product->image)
                                                                <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                                    alt="product">
                                                            @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                                    alt="product">
                                                            @endif
                                                        </div>
                                                    </a>
                                                @elseif($header_category_data->name == 'Services')
                                                    <a href="{{url('services-detail/'.$product->slug)}}">
                                                        <div class="product-img">
                                                            @if ($product->image)
                                                                <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                                    alt="product">
                                                            @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                                    alt="product">
                                                            @endif
                                                        </div>
                                                    </a>
                                                @else
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
                                                @endif
                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            @if($product->user_id != Auth::user()->id)
                                                                @if($product->is_buynow == 1)
                                                                    <button type="button" title="Wishlist"
                                                                        data-id="{{ $product->id }}"
                                                                        class="@if($product->wishlist) @if($product->wishlist->user_id == Auth::user()->id) 
                                                                        fa fa-heart wishlist fas    @else  fa fa-heart wishlist @endif @endif">   
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                       
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
                                                @if($header_category_data->name == 'Jobs')
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ url('jobs-detail/' . $product->slug) }}">
                                                            @if(is_numeric($product->salary_scal)) 
                                                            {{ number_format($product->salary_scal) }} 
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
                                                                        @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' || $product->subcategory->slug =='flat-or-room-mates') 
                                                                            <small>Per month</small>
                                                                        @endif 
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </a>
                                                    </li>
                                                @elseif($header_category_data->name == 'Services')
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ url('services-detail/' . $product->slug) }}">
                                                            @if(is_numeric($product->price)) 
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
                                                                        @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' || $product->subcategory->slug =='flat-or-room-mates') 
                                                                            <small>Per month</small>
                                                                        @endif 
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="breadcrumb-item">
                                                        <a href="{{ url('product/detail/' . $product->slug) }}">
                                                            @if(is_numeric($product->price)) 
                                                                {{ number_format($product->price) }} 
                                                                @if($product->subcategory) 
                                                                    @if($product->subcategory->slug == 'land')
                                                                        @php
                                                                            $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                                                                            $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                                                                        @endphp
                                                                        @if($feature_data->data_name == 'for rent')
                                                                            <small>Per month</small> 
                                                                        @endif
                                                                    @else
                                                                        @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' || $product->subcategory->slug =='flat-or-room-mates') 
                                                                            <small>Per month</small>
                                                                        @endif 
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endif
                                            </ol>
                                            <div class="product-meta 3">
                                                @if($header_category_data->name == 'Jobs')
                                                    <span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a href="{{url('jobs-detail/'.$product->slug)}}" class="product-title-color">{{ ucwords(Str::limit($product->title,30)) }}</a></span><br>
                                                @elseif($header_category_data->name == 'Services')
                                                   

                                                   
                                        <span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a href="{{url('services-detail/'.$product->slug)}}" class="product-title-color">{{ ucwords(Str::limit($product->title,30)) }}</a></span><br>

                                                @else
                                                    <span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a href="{{url('product/detail/'.$product->slug)}}" class="product-title-color">{{ ucwords(Str::limit($product->title,30)) }}</a></span><br>
                                                @endif

                                        @if($header_category_data->name != 'Services'  &&  $header_category_data->name != 'Property' &&  $header_category_data->name != 'Jobs' )        
                                                @if($product->type == 1)
                                                <span class="s-used">Used</span>
                                                @else
                                                <span class="s-success">Brand New</span>
                                                @endif
                                        @else

                                                @if($product->type == 1)
                                                <span></span>
                                                @else
                                                <span ></span>
                                                @endif
                                        
                                        @endif        
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                                                    {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                                </span>
                                                <div> <span> 
                                                    Closes:@if($product->auction_end_date != null) {{ Carbon\Carbon::parse($product->auction_end_date)->format('d/m/Y')}} @else {{ $product->created_at->addDays(30)->format('d/m/Y') }} @endif </span></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
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
                <div class="col-lg-10  col-xs-8">
                    <div class="">
               <h3>{{trans('global.recommendad_deal')}}</h3>
              
            </div>
         </div>
         @endif
         @if (Auth::check() && $recommendedProducts->count() >5)
         <div class="col-lg-2  col-xs-4">
                        <div class="section-center-heading">
                            <u>
                                <h5><a href="{{url('search/market-place')}}">{{trans('global.view_all')}}<i class="fas fa-arrow-right"></i> </a></h5>

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
                                                        @if($recommendedProduct->user_id != Auth::user()->id)
                                                            @if($recommendedProduct->is_buynow == 1)
                                                                <button type="button" title="Wishlist"
                                                                    data-id="{{ $recommendedProduct->id }}"
                                                                    class="@if($recommendedProduct->wishlist) @if($recommendedProduct->wishlist->user_id == Auth::user()->id) 
                                                                    fa fa-heart wishlist fas    @else  fa fa-heart wishlist @endif @endif"> 
                                                                </button>
                                                            @endif
                                                        @endif
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
                                        <div class="product-meta 4"><span data-toggle="tooltip" data-placement="top" title="{{ $recommendedProduct->title }}">{{ ucwords(Str::limit($recommendedProduct->title,30)) }}</span><br>
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
                                                Closes:@if($recommendedProduct->auction_end_date != null) {{ Carbon\Carbon::parse($recommendedProduct->auction_end_date)->format('d/m/Y')}} @else {{ $recommendedProduct->created_at->addDays(30)->format('d/m/Y') }} @endif </span></div>
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
    @if(Auth::check())
        <input type="hidden" id="hd_device_token" name="hd_device_token" value="{{Auth::user()->device_token}}">
    @endif
    {{--
    <!-- Modal -->
    <div class="modal fade" id="notificationAlertModalCenter" tabindex="-1" role="dialog" aria-labelledby="notificationAlertModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationAlertModalLongTitle">Notification Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please allow notification alert. if you have not allow notification alert. please follow these steps:</p>
                    <p><strong>Step 1 : </strong> open google chrome browser</p>
                    <p><strong>Step 2 : </strong> click on lock icon on before site url and showing popup window.</p>  
                    <p><strong>Step 3 : </strong> after showing popup window if notification tab not allow please allow permission from here.</p>  
                    <p><strong>Step 4 : </strong> after follow all steps logout your account and after it login again your account.
                    <!-- <p><strong>Step 2 : click on three dots icon and choose setting tab from dropdown.</strong> 
                    <p><strong>Step 3 : after click setting tab from dropdwon showing new page of browser setting page. and choose Privacy and security tab.</strong> 
                    <p><strong>Step 4 : after click Privacy and security tab showing new window and choose site setting tab </strong> 
                    <p><strong>Step 4 : after click Privacy and security tab showing new window and choose site setting tab </strong> -->
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>--}}
@endsection
@section('js')





    <script>
        $( document ).ready(function() {
            var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
            var device_token = $('#hd_device_token').val();
            if(loggedIn == true){
                if(device_token){
                    $('#notificationAlertModalCenter').modal('hide');
                } else {
                    $('#notificationAlertModalCenter').modal('show');
                }
            }
        });
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
        var slug = "market-place";
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
    <script>
var input = document.getElementById("search-sections1");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("myBtn").click();
  }
});

// $(function() {
//     $("#o_order_status").change(function() {
//         // var id = $(this).val();
//         // alert(id);
//           alert( this.value );// here I am getting the onchange value
//     });
// });
</script>
@endsection
