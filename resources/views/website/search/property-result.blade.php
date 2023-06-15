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
    .bs {
    box-shadow: unset !important;
}

</style>
@if ($products->count())
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
                                    <img src="{{ url('public/media/product-multi-image/' . $media->file) }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;"> 
                                @endforeach
                            @else
                                <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;">
                                <br>
                                <br>
                                <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;">
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
                                         <p class="property-result sss"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}123</span>
                                        <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
                                            <small>Per month</small>
                                            @endif
                                        @else                   
                                            @php
                                                $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                                $sub_category_data = DB::table('categories')->where('id', $product->sub_category)->first();
                                            @endphp
                                                <p class="property-result"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                                    <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
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
                                    <img src="{{ url('public/media/product-multi-image/' . $media->file) }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;"> 
                                @endforeach
                            @else
                                <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;">
                                <br>
                                <br>
                                <img src="{{ url('public/media/product-image/NoImageFound.png') }}" style="width: 100%;height: 168px;border-radius: 5px;margin-bottom: 15px;">
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
                                         <p class="property-result"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                        <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
                                            <small>Per month</small>
                                            @endif
                                        @else                   
                                            @php
                                                $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                                $sub_category_data = DB::table('categories')->where('id', $product->sub_category)->first();
                                            @endphp
                                                <p class="property-result"><span style="font-size: 9px;background: #567df4;color: #fff;padding: 5px 10px 5px 10px;border-radius: 15px;">{{$category_data->category_name}}</span>
                                                    <span style="font-size: 9px;background: #fff;border: 1px solid #567df4;padding: 5px 10px 5px 10px;border-radius: 15px;color: #567df4;">{{$sub_category_data->category_name}}</span><span class="price" style="padding-left: 20px;font-weight: 700;">रू {{$product->price}}</span>
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
                                                    $municipality_data = DB::table('municipalities')->where('municipality_id', $product->municipality)->first();
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
 
@else
    @include('website.no-data')
@endif
