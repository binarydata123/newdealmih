@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<style>
    #p_feedback{
    margin-right: 0 !important;
    margin-left: 0 !important;
  }

</style>

    <section class="inner-section ad-list-part mt40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb20 fs14">Home/{{$headerCategoryName}}/ <a href="#!">List View </a></p>
                </div>
                
                @include('website.search.filter')
                <div class="col-lg-8 col-xl-9 ">
                    <div class="row mb20">
                        <div class="col-lg-9">
                            <div class="header-filter">
                                <h3>{{ucwords($headerCategoryName)}}</h3>
                            </div>
                        </div>
                        @if($slug == 'market-place' || $slug == 'car-motor-bike-or-boat' || $slug != 'jobs' || $slug == 'property')
                        <div class="col-lg-3">
                            <div class="filter-short">
                                <!-- <label class="filter-label">Sort by :</label> -->
                                <form action="{{url('search', $slug)}}" method="get" id="filter_sort_form">
                                    <input type="">
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

                    
                    <div class="row product-result">
                        
                        @if($slug != 'jobs')


                       
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                            
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                                    <div class="product-card">
                                        <div class="product-media resimg">
                                            @if($slug != 'services')
                                            <a href="{{ url('product/detail/' . $product->slug) }}" target="_blank">
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
                                            @else
                                            <a href="{{ url('services-detail/' . $product->slug) }}" target="_blank">
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
                                            @endif
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
                                        <!---->
                                    @php
                                        $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                        $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();
                                    @endphp
                                    <!---->
                                        <div class="product-content">
                                            <ol class="breadcrumb product-category">
                                                @if($header_category_data->name != 'Services')
                                                <li>
                                                    <p class="product-price tblak"> रू</p>
                                                </li>
                                                @else
                                                <li>
                                                    <p class="product-price tblak"></p>
                                                </li>
                                                @endif
                                                {{-- {{dd($product)}} --}}

                                             @if($header_category_data->name != 'Services')
                                                 <li class="breadcrumb-item"><a
                                                        href="{{ url('product/detail/' . $product->slug) }}" target="_blank">
                                                        @if (is_numeric($product->price)) {{ number_format($product->price) }} @endif</a></li>
                                            </ol>
                                            <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}">{{ ucwords(Str::limit($product->title,35)) }}</span><br>
                                                @else
                                                <div class="product-meta"><span data-toggle="tooltip" data-placement="top" title="{{ $product->title }}">{{ ucwords(Str::limit($product->title,35)) }}</span><br>
                                                @php
                                                      $produstReviews = App\Models\ServiceFeedback::where('product_id',$product->id);
                                                        $reviews = $produstReviews->get();
                                                        $userCount = $reviews->count();
                                                            $avgRating = $produstReviews->avg('rating');
                                                @endphp
                                                 <h5><span class="pfeedback" id="p_feedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                                                  <a href="{{url('services-detail/'.$product->slug)}}" class="tblack"> Feedback {{number_format($avgRating,1)}}
                                                  <i class="fa fa-star rating"></i> 
                                                   </a>({{$reviews->count()}})
                                                 </span></h5>
                                            
                                                @endif

                                         @if($header_category_data->name != 'Services')

                                                @if($product->type == 1)
                                                <span class="s-used">Used</span>
                                                @else
                                                <span class="s-success">Brand New</span>
                                                @endif
                                         @else
                                                @if($product->type == 1)
                                                <span class=""></span>
                                                @else
                                                <span class=""></span>
                                                @endif

                                         @endif

                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                                                </span>
                                                <div> <span>
                                                        Closes: {{ $product->created_at->addDays(30)->format('D d M') }}
                                                    </span></div>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            @endforeach
                            @else
                            @include('website.no-data')
                            @endif
                            @else
                           
                            @include('website.search.jobs')
                        @endif
                       
					   
                        
                    </div>
                </div>
				<?php 
	$uri = $_SERVER['REQUEST_URI'];
	if($uri=='/search/services?category%5B%5D=324'){ 
		?>
		<div class="container">
		<h1 style="margin-left: 90px; font-size: 22px; margin-bottom: 10px;">Get Legals & Law Services</h1>
		<div class="row" style="margin-left: 90px;">
		<h2 style="font-size: 20px; ">Dedication and professionalism are hallmarks of Dealmih</h2>
		<p style="text-align:justify;">The dedicated staff at Dealmih is made up of young, skilled, and specialist legal experts who work in a variety of practice areas, including investment models, investment security, benefits, and investment returns while investing in buying the products from our platform. Located in Kathmandu, Nepal, we are a full-service law firm. Our firm adheres to the highest ethical standards and offers top-notch legal services at competitive rates. You will receive high-quality legal services in accordance with global market demands serving in all core areas of Kathmandu. We firmly believe in the success and happiness of our clients.</p>
		
		<h2 style="font-size: 20px;">Online Legals & Law Services In Nepal</h2>
		
		<br/><p style="text-align:justify;"> You can easily get legals and law services in Kathmandu from Dealmih to resolve the residential and commercial issues that exist when our customers buy and sell any product from our platform. We also abide by all the labor laws that exist in Kathmandu to protect the respect of our laborers. Our professional team of legal experts can handle all the issues legally and help customers with investment security, investment benefits, and assured returns on every investment. We strive to provide all legal services to our customers at affordable prices with full dedication and professionalism, which are our hallmarks.</p>
		</div>
		</div>
		<?php
	}
	?>
            </div>
        </div>
        </div>
    </section>
	
	

@endsection
@section('js')

    <script src="{{ url('public/website/js/classified/search.js') }}"></script>
   <script src="{{url('public/website/js/classified/wishlish.js')}}"></script>

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
        $(document).on('change', '#search_type', function(e) {
            $("#filter_sort_form").submit();
        });

        
        
    </script>
@endsection
