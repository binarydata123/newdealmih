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
    
@endsection
@section('content')
    <div>
        <section class="banner-part2" @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/motor.jpg);"  @endif>
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="yl"><span class="bghead">
                                @if($cms) Shop our New and Used Private & Commercial Vehicles @else Shop our unique range of new & used @endif</span>
                            </h1>
                        </div>
                    </div>
                    <form method="get" action="{{ url('search/car-motor-bike-or-boat') }}">
                    <div class="row newsletter">
                        <div class="col-lg-3 col-md-12">
                        <!-- ww2 -->
                            <div class="form-group">
<select class="form-control newfm category bgwt" name="category[]" >
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
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}} " name="search[]">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor bdxs8">
                                    <span class="hidden-x">{{trans('global.search_motor')}}</span>
                                    <span class="visible-xs"> <i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
        <!--tab-->
        <section class="mar30 niche-part sbox">
            <div class="container bgwhite formwht white-sp-b">
                <form action="{{url('search/car-motor-bike-or-boat')}}" method="get">
                    @csrf
                <div class="row">
                    <div class="col-lg-12 pl0" id="sp-00">
                        <div class="niche-nav">
                            <ul class="nav nav-tabs tableft navwp">
                                @if($categories)
                                    @foreach ($categories as $key => $category)
                                        
                                <li><a href="#ratings" class="nav-link @if($key+1 == 1) active @endif main-category" data-content="{{$category->slug}}"
                                    data-id="{{$category->id}}" 
                                    data-toggle="tab">
                                    {{ucwords($category->category_name)}}</a></li>
                                   @endforeach
                                @endif
                               
                            </ul>
                        </div>
                    </div>
                </div>
            <input type="text"  hidden class="category-value" id="">

                <div class="tab-pane active" id="ratings">
                    <div class="container-fluid w100">
                        <div class="row sub-category-result">
                         
                        </div>
                        
                        <div class="col-lg-12 check-status vore" id="vmorhe" >
                            <div class="form-group">
                                {{-- <input type="checkbox">&nbsp; <label for="fix-check" class="form-check-text fs14o"> Search
                                    nearby Suburbs &nbsp;&nbsp;&nbsp;</label> --}}
                                <input type="checkbox" name="used" value="1">&nbsp; <label for="nego-check" class="form-check-text fs14o"> Used
                                    &nbsp;&nbsp;&nbsp;</label>
                                <input type="checkbox" name="brand_new" value="2">&nbsp; <label for="day-check" class="form-check-text fs14o"> New
                                    </label>
                            </div>
                        </div>
                        <div class="tab-pane active" id="all">
                            <div class="row ml0  brand-model-result" id="mg-0">
                            </div>
                                <div class="row ml0  " id="mg-0">
                                <div class="col-lg-3">
                                    <div class="form-group mt15">
                                        <fieldset>
                                            <legend class="mbm12">District</legend>
                                            <select class="form-control b0 district" name="district">
                                                <option value="">Select</option>
                                               @if ($districts)
                                                    @foreach ($districts as $district)
                                                        <option value="{{$district->district_id}}">{{$district->district_name}}</option>
                                                    @endforeach
                                                   
                                               @endif

                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                          
                                <div class="col-lg-6">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">Price</p>
                                                <select class="form-control h52 price" name="price">
                                                    <option value="">Minimum</option>
                                                    <option value="100000">100,000</option>
                                                    <option value="200000">200,000</option>
                                                    <option value="300000">300,000</option>
                                                    <option value="400000">400,000</option>
                                                    <option value="500000">500,000</option>
                                                    <option value="600000">600,000</option>
                                                    <option value="700000">700,000</option>
                                                    <option value="800000">800,000</option>
                                                    <option value="900000">900,000</option>
                                                    <option value="1000000">100,0000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="fo12">&nbsp;</p>
                                                <select class="form-control h52">
                                                    <option value="">Maximum</option>
                                                    <option value="100000">100,000</option>
                                                    <option value="200000">200,000</option>
                                                    <option value="300000">300,000</option>
                                                    <option value="400000">400,000</option>
                                                    <option value="500000">500,000</option>
                                                    <option value="600000">600,000</option>
                                                    <option value="700000">700,000</option>
                                                    <option value="800000">800,000</option>
                                                    <option value="900000">900,000</option>
                                                    <option value="1000000">100,0000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    
                                </div>
                            </div>
                            {{-- feature data loop here  --}}
                            <div class="row ml0 feature-data ">
                            </div>
                            <div align="right" class="col-lg-12">
                                <button type="button" class="btn btn-info fil mb20xs view-more-btn" data-toggle="collapse" data-target="#vmore">
                                    More Options 
                                    <i class="fa fa-sort" aria-hidden="true"></i></button>
                                    <button class="btn btn-inline fil sw">View listing</button>
                                   
                                </div>
                           
                        </div>
                      
                    </div>
                </div>
                </form>
            
            </div>
        </section>
        <!--tab-->
    </div>
    <section class="mt20 recomend-part">
            <div class="container">
                <div class="row">
                    <input type="hidden" name="ne_title" value="{{$webads->ne_title}}" id="ne_title">
                    <div class="webads-image">
                        @if($webads ) 
                       @if($webads->ne_title != 'url')
                        <a target="_blank" href="{{$webads->ne_title}}">
                           <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image" ></a>
                           @else
                            <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image" >
                            @endif
                            @else 
                        <img src="{{ url('public/website/images/dea/job.jpg') }}" class="img-responsive">
                        @endif
                    </div>
                </div>

            </div>
        </section>
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
                            <a href="{{url('search/car-motor-bike-or-boat')}}">  <h5>View all <i class="fas fa-arrow-right"></i></h5></a>
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
                                        @if($product->is_sold == '1')<span style="position: absolute;background: #ff0000;margin-left: 5px;margin-top: 5px;padding: 0 15px 0 15px;color: #fff;font-size: 14px;border-radius: 3px;z-index: 9999 !important;">Sold</span>@endif
                                        <div class="product-img">
                                            @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product">
                                                    @else <img src="{{ url('public/website/images/no-image.png') }}" alt="product">
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
                                            
                                           @if(is_numeric($product->price)) {{ number_format($product->price) }} @endif</a></li>
                                          
                                    </ol>
                                    <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}"><a
                                            href="{{ url('product/detail/' . $product->slug) }}" class="product-title-color">{{ ucwords(Str::limit($product->title,30)) }}</a></span>
                                        
                                        @if($product->type == 1)
                                        <span class="s-used">Used</span>
                                        @else
                                        <span class="s-success">New</span>
                                        @endif
                                        
                                        <p data-toggle="tooltip" data-placement="top" title="{{ $product->description }}">{{ ucwords(Str::limit($product->description,30)) }}</p>


                                        {{-- @if($product->productDataList->count() > 0)
                                        @foreach($product->productDataList as $productData)
                                        @if($productData->featureData)
                                        
                                        <span>@if($productData->featureData->feature)@if(($productData->featureData->feature->name=='KM driven')){{$productData->featureData->data_name}} Km  @endif @endif </span>
                                        <span>@if($productData->featureData->feature)@if(($productData->featureData->feature->name=='Transmission')){{$productData->featureData->data_name}}@endif @endif </span>
                                        <span>@if($productData->featureData->feature)@if(($productData->featureData->feature->name=='fuel type')){{$productData->featureData->data_name}}@endif @endif </span>


                                        <span>@if($productData->featureData->feature){{$productData->featureData->feature->name}}@endif</span> 
                                        @endif
                                        @endforeach
                                        @endif --}}
                                    



                                        
                                    </div>
                                    


                                    {{-- @if($product->productDataList->count() > 0)
                                    <div class="dbox">
                                        <h4 class="fs20 mb10">Details </h4>
                                                
                                              <ul class="ad-details-specific plisting">
                                                @foreach($product->productDataList as $productData)
                                                @if($productData->featureData)
                                                <li><h6>
                                                    @if($productData->featureData->feature)
                                                    {{$productData->featureData->feature->name}}
                                                  
                                                    </h6><p>  {{$productData->featureData->data_name}} 
                                                    </p>
                                                    @endif
                                                </li>
                                                    @endif
                                                    @endforeach
                                              </ul>
                                          </div>
                                          @endif --}}
                                            
                                          
                                        
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif</span>
                                        @if($product->is_auction) <div> <span> @if ($product->auction_end_date)
                                            Closes: {{Carbon\Carbon::parse($product->auction_end_date)->format('d/m/Y')}}  @endif</span></div> 
                                            
                                            @else
                                            <div> <span>  
                                                Closes: {{Carbon\Carbon::parse($product->created_at)->addDays(30)->format('d/m/Y') }}   </span></div>
                                            
                                            @endif
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





	




    {{-- <section class="p30 niche-part pb60">
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
    </section> --}}
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
				<center><h2 style="font-size:26px;">Buy or List your Vehicle for Sale in Nepal</h2></center><br>
				<p style="text-align:justify;">Dealmih is the leading one-stop platform for our valued customers who are planning to buy residential and commercial new and used vehicles in Nepal. When you buy four-wheeler vehicle in Lalitpur, you need to examine for important features such as fuel efficiency, safety, and comfort. With us, anyone can buy or sell their vehicle in Nepal.</p>
				<br/><p style="text-align:justify;">Dealmih also facilitates you to list your vehicle for sale in Kathmandu, as this is our mission to provide the best possible price for your vehicles. To make online dealing convenient, we provide a platform that displays new and used vehicles for our customers for residential and commercial use. If you are planning to buy vehicle in affordable price Kathmandu, then Dealmih is the best choice for you to search for vehicles from a variety of choices. Our variety of vehicles ranges from new and used two-wheeler to four-wheeler vehicles, from which you can directly sell your vehicles to other consumers through our online platform. We always strive to make online shopping for our customers convenient by offering vehicles at affordable prices.</p><br/>
				</div>
			</div>
	</div>		


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    {{-- <script src="{{url('public/website/js/classified/wishlist.js')}}"></script> --}}
    <script>
        var category = "";
        var subCategory = "";
        var path = "{{ url('product-title') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query,
                    slug: "car-motor-bike-or-boat",
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

        


        

          //category sub category search tab
    var  mainCategory ="";
    var subCategoryId = "";
    var subCategorySlug="";
    $(document).ready(function() {
            mainCategory = $('.main-category').data('id');
            // alert(mainCategory);
        //     if(mainCategory == 49)
        //     {
        // $('#vmore').addClass('collapse')

        //     }
            $('.category-value').val(mainCategory);
        //     subCategoryId = $('.sub-cate-first-val').val();
        // console.log(subCategoryId);
            subCategoryValue()
        });

        $(document).on('click','.main-category', function()
        {
            $('.vmore').show();
            mainCategory =$(this).data('id');
            mainCategorySlug = $(this).data('content');
          
            if(mainCategorySlug == "private-vehicles" || mainCategorySlug =="commercial-vehicles-spares")
         {
    
           
            $('#vmore').addClass('collapse')
             
            $('.view-more-btn').show();
         }
         else
         {
            $('.view-more-btn').hide();

         }
            
           
            // alert(mainCategory);
            subCategoryValue();
        })
  

    $(document).on('click','.category-sub',function()
    {
        $('#vmore').removeClass('collapse');
        $('.feature-data-model-result').hide();
         subCategoryId = $(this).data('id');

         subCategorySlug = $(this).data('content');


         if(subCategorySlug == "commercial-other-vehicles")
         {
            $('.main-sub-cate-first-val').val('61');
         }

         if(subCategorySlug == 'spare-parts'){
            $('.main-sub-cate-first-val').val('62');
         }

          
         if(subCategorySlug == "cars" || subCategorySlug == "commercial-other-vehicles" )
         {
             $('#vmore').addClass('collapse')
            $('.view-more-btn').show();
         }
         else
         {
            $('.view-more-btn').hide();

         }
        //  $('.vmore').show();
        if(subCategorySlug == 'spare-parts'){
            $('.main-sub-cate-first-val').val('62');
        }else {
            $('.sub-cate-first-val').val(subCategoryId);
        }
        
        
        featureDataes();
        categoryBrandAndModels();
    })

// subcategory result ajax 
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
                  categoryBrandAndModels();
                   
                },error:function(data)
                {

                }
            })
    }
    // category base model and brand 
        function categoryBrandAndModels()
            {
                $.ajax({
                    url:base_url +"motor/brand-model",
                    type:"post",
                    data:{subCategoryId:subCategoryId},
                    success:function(result)
                    {
                        $('.brand-model-result').html(result.brandModel);
                    },error:function(result)
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

                        if(data.categorySlug == 'spare-parts') {
                            $('#min-sub-slug').hide();
                            $('.sub-cate-first-val').removeAttr('value');
                        }else {
                             $('#min-sub-slug').show();

                        }

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
                // $('.feature-data-model-result').show();
                console.log(data.html);
                $('.feature-data-model-result').html(data.html);
            },error:function(data)
            {

            }
        })
       
    })
    </script>


<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>




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

