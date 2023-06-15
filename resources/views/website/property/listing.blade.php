@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<style type="text/css">
    
    a#propety_data {
    display: block;
}
.product-info.text-cont {
    display: flex;
    justify-content: initial;
}
.product-info.text-cont p.fs14500 {
    padding-right: 20px;
}

/*Start........17-aug-22*/

img {
    max-width: 100%;
}
ul.list-type li {
    display: inline-block;
    padding: 24px 23px 0 0;
    font-size: 22px;
}
a.view-property {
    background: #567df4;
    color: #fff;
    font-size: 20px;
    padding: 13px 34px;
    border-radius: 12px;
    position: relative;
    top: 16px;
}

</style>
<section class="inner-section ad-list-part mt40 list-property">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="mb20 fs14">Home/Property/ <a href="#!">List View </a></p>
            </div>
            @include('website.search.filter')
            <div class="col-lg-8 col-xl-9">
                <div class="row mb20">
                    <div class="col-lg-9">
                        <div class="header-filter">
                            <h3>Property</h3>
                        </div> 
                    </div>
                    @if($slug == 'property')
                        <div class="col-lg-3">
                            <div class="filter-short">
                                <!-- <label class="filter-label">Sort by :</label> -->
                                <form action="{{url('search', $slug)}}" method="get" id="filter_sort_form">
                                    <select class="custom-select filter-select typeStatus sdf" name="filter_status_type" id="search_type">
                                        <option value="">New & Used</option>
                                            <option value="1" <?php if($filter_status_type == '1'){ echo 'selected'; } ?>>Used only</option>
                                            <option value="2" <?php if($filter_status_type == '2'){ echo 'selected'; } ?>>New Only</option>
                                            <option value="lowest" <?php if($filter_status_type == 'lowest'){ echo 'selected'; } ?>>Lowest to Higest Price</option>
                                            <option value="heighst" <?php if($filter_status_type == 'heighst'){ echo 'selected'; } ?>>Highest to Lowest price</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <input type="text" value="{{ $slug }}" hidden class="slug">
                <div class="row product-result">
                    @if($products->count() > 0)
                     
                        @foreach ($products as $product) 


                            @if($loop->first) 
                                <div class="col-lg-12">
                                    <div class="row bshadow mb-3 p15">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @if($product->image)
                                                    <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            class="iresponsive rimg">
                                                    </a>
                                                @else
                                                    <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                        <img src="{{ url('public/media/product-image/NoImageFound.png') }}"
                                                            class="iresponsive rimg">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                @if (isset($product->media))
                                                    @foreach (collect($product->media)->forPage(1, 2) as $media)
                                                        <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                            <img src="{{ url('public/media/product-multi-image/' . $media->file) }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px; object-fit: cover;"> 
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px; object-fit: cover;">
                                                    <br>
                                                    <br>
                                                    <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px; object-fit: cover;">
                                                @endif
                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <a href="{{url('property-detail',$product->slug)}}"><h3 style="font-size: 18px;">{{ucwords($product->title)}}</h3></a>
                                                    </div>
                                                    <!-- <div class="col-lg-4 text-right">
                                                        <a href="{{url('property-detail',$product->slug)}}" class="btn btn-inline post-btn float-right" style="margin-top: 0px;">View Property</a>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                    
                                                        @if($product->subcategory->slug == 'land')
                                                            @php
                                                                $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                                                                $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                                                            @endphp
                                                             @if($feature_data->data_name == 'for rent')
                                                              @php
                                                                    $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                                                    $sub_category_data = DB::table('categories')->where('id', $product->sub_category)->first();
                                                                @endphp
                                                             <p class="property-results"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>

                                                            <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span>
                                                            <span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
                                                            <small>Per month</small>
                                                              </p>
                                                            @endif
                                                             @else
                                                                @php
                                                                    $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                                                    $sub_category_data = DB::table('categories')->where('id', $product->sub_category)->first();
                                                                @endphp
                                                                    <p class="property-results"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                                                        <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>

                                                                           @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' || $product->subcategory->slug == 'flat-or-room-mates') 
                                                                                <small>Per month</small>
                                                                    @endif
                                                                @endif
                                                                           
                                                                    </p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style="font-size: 11px;text-align: right;">Listed {{ date('j M Y ', strtotime($product->created_at)) }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @if($product->propertyFeature)
                                                            <ul class="list-type">
                                                                @if($product->propertyFeature->bedrooms)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-bed" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->bedrooms}} Bed</li>
                                                                @endif
                                                                @if($product->propertyFeature->bathrooms)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-bath" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->bathrooms}} Bath</li>
                                                                @endif
                                                                @if($product->propertyFeature->land_area || $product->propertyFeature->land_area_unit_number)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-building" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->land_area_unit_number}} {{$product->propertyFeature->land_area}} Land Area</li>
                                                                @endif
                                                                @if($product->district || $product->municipality)
                                                                    @php
                                                                        $district_data = DB::table('districts')->where('district_id', $product->district)->first();
                                                                        $municipality_data = DB::table('municipalities')->where('municipality_id', $product->municipality)->first();
                                                                    @endphp
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 30px;"><i class="fa fa-map-marker" aria-hidden="true" style="margin: 0px 8px 0 0;"></i> @if($district_data) {{$district_data->district_name}} @endif @if($municipality_data) {{$municipality_data->municipality_name}} @endif</li>
                                                                @endif
                                                            </ul>
                                                        @endif
                                                    </div>
                                                    <!-- <div class="col-lg-4 text-right">
                                                        <a href="{{url('property-detail',$product->slug)}}" class="btn btn-inline post-btn float-right">View Property</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-lg-8">
                            @foreach ($products as $product) 
                                @if($loop->first)
                                @else   
                                    <div class="row bshadow mb-3 p15">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @if (isset($product->media))
                                                    @foreach (collect($product->media)->forPage(1, 2) as $media)
                                                        <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                            <img src="{{ url('public/media/product-multi-image/' . $media->file) }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;object-fit: cover;"> 
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;object-fit: cover;">
                                                    <br>
                                                    <br>
                                                    <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;object-fit: cover;">
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                @if($product->image)
                                                    <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            class="iresponsive rimg">
                                                    </a>
                                                @else
                                                    <a id="propety_data" href="{{url('property-detail',$product->slug)}}">
                                                        <img src="{{ url('public/media/product-image/NoImageFound.png') }}"
                                                            class="iresponsive rimg">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 mt-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <a href="{{url('property-detail',$product->slug)}}"><h3 style="font-size: 18px;">{{ucwords($product->title)}}</h3></a>
                                                    </div>
                                                    <!-- <div class="col-lg-4 text-right">
                                                        <a href="{{url('property-detail',$product->slug)}}" class="btn btn-inline post-btn float-right" style="margin-top: 0px;">View Property</a>
                                                    </div> -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        @if($product->subcategory->slug == 'land')
                                                            @php
                                                                $product_data = DB::table('product_datas')->where('product_id', $product->id)->first();
                                                                $feature_data = DB::table('feature_dataes')->where('id', $product_data->feature_data_id)->first();
                                                            @endphp
                                                             @if($feature_data->data_name == 'for rent')
                                                             <p class="property-results"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                                            <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
                                                                    <small>Per month</small>
                                                              </p>
                                                            @endif
                                                             @else
                                                        @php
                                                            $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                                            $sub_category_data = DB::table('categories')->where('id', $product->sub_category)->first();

                                                            
                                                        @endphp
                                                        <p class="property-results"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                                            <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}
                                                            </span>
                                                            @if($product->subcategory->slug == 'for-rent-houses-apartments' ||  $product->subcategory->slug =='for-rent-shop-office-land' || $product->subcategory->slug == 'flat-or-room-mates') 
                                                                    <small>Per month</small>
                                                                @endif 
                                                                @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p style="font-size: 11px;text-align: right;">Listed {{ date('j M, Y', strtotime($product->created_at)) }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @if($product->propertyFeature)
                                                            <ul class="list-type">
                                                                @if($product->propertyFeature->bedrooms)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-bed" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->bedrooms}} Bed</li>
                                                                @endif
                                                                @if($product->propertyFeature->bathrooms)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-bath" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->bathrooms}} Bath</li>
                                                                @endif
                                                                @if($product->propertyFeature->land_area || $product->propertyFeature->land_area_unit_number)
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 47px;"><i class="fa fa-building" aria-hidden="true" style="margin: 0px 12.8px 0 0;"></i> {{$product->propertyFeature->land_area_unit_number}} {{$product->propertyFeature->land_area}} Land Area</li>
                                                                @endif
                                                                @if($product->district || $product->municipality)
                                                                    @php
                                                                        $district_data = DB::table('districts')->where('district_id', $product->district)->first();
                                                                        $municipality_data = DB::table('municipalities')->where('municipality_id', $product->zmunicipality)->first();
                                                                    @endphp
                                                                    <li style="font-family: Poppins;font-size: 14px;font-weight: 500;padding-top: 0px;line-height: 30px;"><i class="fa fa-map-marker" aria-hidden="true" style="margin: 0px 8px 0 0;"></i> @if($district_data) {{$district_data->district_name}} @endif @if($municipality_data) {{$municipality_data->municipality_name}} @endif</li>
                                                                @endif
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4">
                            <div class="bshadow p15 mb-5">

                                @php 

                                $webads = DB::table('web_ads')->where('page','property-top')->first();
                                $webad = DB::table('web_ads')->where('page','property-bottom')->first();

                                @endphp
                                <a target="_blank" href="{{$webads->ne_title}}">
                                <img src="{{url('public/media/webads-image',$webads->image)}}" class="mb-3">
                                <h3 style="margin: 0 0 14px;font-family: Poppins;font-size: 18px;font-weight: 600;">New Era Home Ltd</h3>
                                <p style="margin: 14px 0 0;font-family: Poppins;font-size: 14px;font-weight: 300;">{{$webads->title}}</p></a>
                                @if(Auth::check())
                                @else
                                    <a href="{{url('/register')}}" class="btn btn-inline" style="margin: 19px 0px 0 0px;border-radius: 40px;background-color: #1d1b5c;border-color: #1d1b5c;">Register</a>
                                @endif
                            </div>
                            <div class="bshadow p15">
                                <a target="_blank" href="{{$webad->ne_title}}">
                                <img src="{{url('public/media/webads-image',$webad->image)}}" class="mb-3">
                                <h3 style="margin: 0 0 14px;font-family: Hando;font-size: 18px;font-weight: 600;">Watch: Beginner’s guide to Buy Property</h3>
                                <p style="margin: 14px 0 0;font-family: Poppins;font-size: 14px;font-weight: 300;">{{$webad->title}}</p></a>
                            </div>
                           
                        </div>
                    @else
                        @include('website.no-data')
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{ url('public/website/js/classified/search.js') }}"></script>
<script>
    $(document).on('change', '#search_type', function(e) {
        $("#filter_sort_form").submit();
    });
</script>
@endsection
