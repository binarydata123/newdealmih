<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
<div class="col-lg-4 col-xl-3">
    <div class="row">
        <input type="text" value="{{ $slug }}" hidden class="slug">
        <div class="col-md-6 col-lg-12">

            <!-------filter mobile- dfg-------->
            <div class="product-widget vxs">
                <h4 class="product-widget-title fils" data-toggle="collapse" data-target="#demo">Filters
                </h4>
                <form id="demo" class="product-widget-form formpad2 collapse">
                    <!--------->
                    <div class="container">
                        <div class="tab-wrap">
                            <div class="tab-item-wrap active">
                                <div class="title">
                                    <h6>Categories <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>
                                </div>
                                <div class="content" style="display: block;">
                                    <ul class="product-widget-list product-widget-scroll">

                                    </ul>
                                </div>
                                <hr>
                            </div>


                            <div class="tab-item-wrap">
                                <div class="title mb20">
                                    <h6>Bedrooms <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>

                                </div>
                                <div class="content">

                                    <div class="form-group">

                                        <select class="form-control customfil">
                                            <option selected="">No of Bedrooms</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="tab-item-wrap">
                                <div class="title mb20">
                                    <h6>Location <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>

                                </div>
                                <div class="content">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">District</legend>
                                            <select class="form-control b0 customfil district">
                                                <option value="">Select District</option>
                                                @if ($districts)
                                                    @foreach ($districts as $district)
                                                        <option @if(isset($url['district'])) @if($url['district'] == $district->district_id) selected @endif @endif value="{{ $district->district_id }}">
                                                            {{ ucwords($district->district_name) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">

                                        <select class="form-control customfil">
                                            <option value="">Muncipality/Nagarpalika</option>

                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <select class="form-control customfil">
                                            <option value="">Village</option>

                                        </select>
                                    </div>

                                    <a href="#!" class="btn btn-inline post-btn w100 p10"><span>View
                                            Results</span></a>

                                </div>
                                <hr>
                            </div>
                            <div class="tab-item-wrap">
                                <div class="title">
                                    <h6>
                                        @if(isset($subCategoryName) && $subCategoryName != null )
                                            @if($subCategoryName == 'for-rent-houses-apartments')
                                                Rent Per Month
                                            @endif
                                        @else 
                                            Price Range 
                                        @endif
                                        <span class="floatr"> <i class="fa fa-minus"></i></span><span><a href="#!" class="floatr"> Clear </a></span> 
                                    </h6>

                                </div>
                                <div class="content">
                                    <div id="pricerange"></div>
                                </div>
                                <div class="content">
                                    <div class="flex jcsa aifs f-wrap w-100vw">
                                        <div class="main-card m-m rubber-ipt-ctn">

                                            <div class="main-card-ctt flex jcc aic">
                                                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                                                <div style="margin:30px auto">
                                                  <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                                                  <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
                                                </div>
                                            </div>
                                        </div>
                                      

                                    <a href="#!" class="btn btn-inline post-btn w100 p10 mt60 price-submit"><span>Refine Search</span></a>

                                    </div>
                                    <!-- <a href="#!" class="btn btn-inline post-btn w100 p10 mt60"><span>View Results</span></a> -->
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!--------->
                </form>
            </div>

            <div class="product-widget vxs2">
                <h4 class="product-widget-title fils">Filters</h4>
                <form class="product-widget-form formpad2">
                    <div class="container">
                        <div class="tab-wrap">
                            <div class="tab-item-wrap active">
                                <div class="title">
                                    <h6>Categories <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>
                                </div>
                                <div class="content" style="display: block;">
                                    <ul class="product-widget-list product-widget-scroll">
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                            @php
                                           
                                                $categoryId = isset($subCategoryUrlValue->categories_id) ? $subCategoryUrlValue->categories_id : 0;


                                                $mincategoryId = isset($minsubCategoryUrlValue->categories_id) ? $minsubCategoryUrlValue->categories_id : 0;



                                                $data = app('request')->input('subCategory');

                                            @endphp

                                          
                                            <!-- {{$categoryId}}
                                            {{ $category->id }} -->
                                                <li class="product-widget-item">
                                                    <div class="product-widget-checkbox">
                                                        <input type="checkbox" id="chcek{{ $category->id }}"
                                                        @if(isset($categoryId)) @if($categoryId == $category->id) checked @endif  @isset($data))@if($data[0] == $category->id) checked @endif @endif @endif
                                                            class="parent-category category{{ $category->id }} filter"
                                                            data-id="{{ $category->id }}">
                                                    </div>
                                                    <label class="product-widget-label "
                                                        for="chcek{{ $category->id }}">
                                                        <span class="product-widget-text">
                                                            {{ ucwords($category->category_name) }}</span></label>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <hr>
                              
                                @php
                                $subCategories = '';
                                $features = '';
                                $minsubCategories = '';
                                
                                    if(isset($categoryId) && $categoryId != null)
                                    {
                                        $category =App\Models\Category::where('id',$categoryId)->first();
                                        $subCategories = App\Models\Category::where('categories_id',$categoryId)->get();
                                        if(isset($url['subCategory'][0]))
                                        {
                                        $features = App\Models\Feature::where('categories_id',$url['subCategory'][0])->get();
                                        }

                                    }

                                    if(isset($mincategoryId) && $mincategoryId != null)
                                    {
                                        $subcategory =App\Models\Category::where('id',$mincategoryId)->first();
                                        $minsubCategories = App\Models\Category::where('categories_id',$mincategoryId)->get();
                                        

                                    }
                                  
                                @endphp
                                <div class="sub-category-hide ">
                                    @include('website.search.sub-category')
                                </div>

                                 <div class="min-sub-category-hide ">
                                    @include('website.search.min-sub-category')
                                </div>



                                {{-- category result  --}}
                                <div class="sub-category ">
                                   
                                </div>

                                <div class="min-sub-category " style="display:none;">
                                   
                                </div>
                                
                            </div>
                            {{-- feature result  --}}
                            <div class="tab-item-wrap  hide-feature">
                                @include('website.search.feature-data')
                            </div>

                            <div class="tab-item-wrap feature-data-html ">
                               
                            </div>
                            @if ($slug =='property' && $subCategoryName != 'land')
                            <div class="tab-item-wrap bed-bath-hide">
                                <div class="title mb20">
                                    <h6>Bedrooms <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>

                                </div>
                                <div class="content">

                                    <div class="form-group">

                                        <select class="form-control customfil filter bedroom" name='bedroom'>
                                            <option >No of Bedrooms</option>
                                            
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3+</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="tab-item-wrap bed-bath-hide" id="bathroom_ajx">
                                <div class="title mb20">
                                    <h6>BathRooms <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>

                                </div>
                                <div class="content">

                                    <div class="form-group">

                                        <select class="form-control customfil bathroom" name="bathroom">
                                            <option >No of BathRooms</option>
                                            
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3+</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endif
                            <div class="tab-item-wrap feature-data-model-result"></div>
                            @if ($slug == 'car-motor-bike-or-boat')
                                <!-- <div class="tab-item-wrap">
                                    <div class="title" >
                                        <h6>Year<span class="floatr"> <i class="fa fa-minus"></i></span><span><a href="#!" class="floatr"> Clear </a></span> </h6>
                                    </div>
                                    <div class="content"> -->
                                <!--        <br/> 
                                    <div id="slider-range2" class="price-filter-range" name="rangeYear"></div>
 -->
                                    <!-- <div style="margin:30px auto">
                                     From: <input type="number" min=1991 max="2022" oninput="validity.valid||(value='1991');" id="min_year" class="price-range-field" />
                                     To: <input type="number" min=1991 max="2022" oninput="validity.valid||(value='2022');" id="max_year" class="price-range-field" />
                                    </div>
                                    </div>
                                    <hr>
                                </div> -->
                            @endif

                            <div class="tab-item-wrap">
                                <div class="title mb20">
                                    <h6>Location <span class="floatr"> <i
                                                class="fa fa-minus"></i></span><span><a href="#!"
                                                class="floatr"> Clear </a></span> </h6>
                                </div>
                                <div class="content">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">District</legend>
                                            <select class="form-control b0 customfil district">
                                                <option value="">Select District</option>
                                                @if ($districts)
                                                    @foreach ($districts as $district)
                                                        <option @if(isset($url['district'])) @if($url['district'] == $district->district_id) selected @endif @endif value="{{ $district->district_id }}">
                                                            {{ ucwords($district->district_name) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control customfil municipality">
                                            <option value="">Muncipality/Nagarpalikadd</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control customfil village">
                                            <option value="">Village</option>
                                        </select>
                                    </div>
                                    <a href="#!" class="btn btn-inline post-btn w100 p10"><span>View
                                            Results</span></a>
                                </div>
                                <hr>
                            </div>
                              {{-- new and used  --}}
                              

                              @if($slug != 'services' && $slug != 'jobs')  
                              <div class="content type_hide bed-bath-hide" style="display: block;">
                                <h6>Type</h6>

                                <ul class="product-widget-list product-widget-scroll">
                                    <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" id="chcek49" class="parent-category stauscategory1 filter typeStatus" data-id="1">
                                                </div>
                                                <label class="product-widget-label " for="chcek49">
                                                    <span class="product-widget-text">
                                                        Used  Only </span></label>
                                            </li>
                                                                                        <li class="product-widget-item">
                                                <div class="product-widget-checkbox">
                                                    <input type="checkbox" id="chcek60" class="parent-category stauscategory2 filter typeStatus" data-id="2">
                                                </div>
                                                <label class="product-widget-label " for="chcek60">
                                                    <span class="product-widget-text">
                                                        New  Only</span></label>
                                            </li>
                                                                                                                    </ul>
                            </div>
@endif



                            @if ($slug == 'market-place' || $slug == 'car-motor-bike-or-boat' || $slug == 'property')
                                <div class="tab-item-wrap">
                                    <div class="title" >
                                        <h6> 
                                            <div id="rentpermonth" style="display: none">Rent Per Month</div>
                                            <div id="pricetag">
                                                @if(isset($subCategoryName) && $subCategoryName != null )
                                                    @if($subCategoryName == 'for-rent-houses-apartments')
                                                        Rent Per Month
                                                    @else 
                                                        Price Range 
                                                    @endif
                                                @else   
                                                    Price Range
                                                @endif
                                            </div>
                                            <span class="floatr"> <i class="fa fa-minus"></i></span><span><a href="#!" class="floatr"> Clear </a></span> 
                                        </h6>
                                    </div>
                                    <div class="content">
                                        <div class="flex jcsa aifs f-wrap w-100vw">
                                            <!-- <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false"/>
                                            <input type="hidden" maxlength="4" value="0" class="from"/>
                                            <input type="hidden" maxlength="4" value="1000" class="to"/> -->
                                            <div class="main-card m-m rubber-ipt-ctn">

                                                <div class="main-card-ctt flex jcc aic">
                                                    <div class="rubber-ipt mb-m mt-s">
                                                        <div class="rubber-ipt-range" style="width: 200px;">
                                                        </div>

                                                        <div class="rubber-ipt-min" style="left: 0px;"></div>
                                                        <div class="rubber-ipt-max" style="left: 0px;"></div>

                                                        <div class="w-100 flex jcsb mt-s">
                                                            <p> रू <span class="rubber-value-min"> 100</span>
                                                            </p>
                                                            <p> रू <span class="rubber-value-max">
                                                                    100000</span>
                                                            </p>
                                                        </div>
                                                    </div>



                                                </div>
                                                {{-- <a href="#!" class="btn btn-inline post-btn w100 p10 mt60 price-submit"><span>Refine Search</span></a> --}}
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <hr>
                                </div>
                            @endif
                          
                            <input type="text" hidden name="type" class="type" value="{{ $type }}"
                                id="">
                            <input type="text" hidden name="is_auction" class="is_auction"
                                value="{{ $isAuction }}" id="">

                            @if ($slug == 'jobs')

                                <div class="form-group">
                                    <select class="form-control salary_scal" name="salary_scal">
                                        <option value="">Salary</option>
                                        <option value="10000">10000 below</option>
                                        <option value="20000">20000 +</option>
                                        <option value="30000">30000 +</option>
                                        <option value="40000">40000 +</option>
                                        <option value="50000">50000 +</option>
                                        <option value="60000">60000 +</option>
                                        <option value="70000">70000 +</option>
                                        <option value="80000">80000 +</option>
                                        <option value="90000">90000 +</option>
                                        <option value="100000">100000 +</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <select class="form-control job_type" name="job_type">
                                        <option value="">Job Type</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                        <option value="3">Work From Home </option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <select class="form-control duration" name="duration">
                                        <option value="">Duration</option>
                                        <option value="1">Permanent</option>
                                        <option value="2">Temporary</option>
                                        <option value="3">Contract </option>

                                    </select>

                                </div>

                            @endif
                        </div>
                    </div>
                    <a href="#!" class="btn btn-inline post-btn w100 p10 mt60 refine-search"><span>Refine Search</span></a>

                </form>
            </div>

            <!-------filter mobile---------->


            <!-------filter desktop--------->

        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
<script>
    var $range = $(".js-range-slider"),
        $from = $(".from"),
        $to = $(".to"),
        range,
        min = $range.data('min'),
        max = $range.data('max'),
        from,
        to;
    var updateValues = function () {
        $from.prop("value", from);
        $to.prop("value", to);
    };
    $range.ionRangeSlider({
        onChange: function (data) {
          from = data.from;
          to = data.to;
          updateValues();
        }
    });
    range = $range.data("ionRangeSlider");
    var updateRange = function () {
        range.update({
            from: from,
            to: to
        });
    };
    $from.on("input", function () {
        from = +$(this).prop("value");
        if (from < min) {
            from = min;
        }
        if (from > to) {
            from = to;
        }
        updateValues();    
        updateRange();
    });
    $to.on("input", function () {
        to = +$(this).prop("value");
        if (to > max) {
            to = max;
        }
        if (to < from) {
            to = from;
        }
        updateValues();    
        updateRange();
    });
</script> -->
<!-- <style>
.content{
    margin-top: 30px;
}
.irs-line{
    width: 100%;
}
.irs--round .irs-bar {
   background-color: #006cfa;
}
.irs--round .irs-handle {
  background-color: #006cfa;
  border-color: #006cfa;
  box-shadow: 0px 0px 0px 5px rgba(0, 194, 192, 0.2);
}
.irs--round .irs-handle.state_hover, 
.irs--round .irs-handle:hover {
   background-color: #006cfa;
}
.irs--round .irs-handle {
  width: 16px;
  height: 16px;
  top: 29px
}
.irs--round .irs-from, 
.irs--round .irs-to, 
.irs--round .irs-single {
  background-color: transparent;
  color: #666666;
}
.irs--round .irs-from:before, 
.irs--round .irs-to:before, 
.irs--round .irs-single:before,
.irs--round .irs-min, 
.irs--round .irs-max {
  display: none;
}
</style> -->
