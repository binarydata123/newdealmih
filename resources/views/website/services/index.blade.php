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

    <div>
        <section class="banner-part8" @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/services.jpg);"  @endif>
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="yl"><span class="bghead">
                            @if($cms) {{ucwords($cms->title)}} @else Shop our unique range of new & used @endif</span></h1>
                        </div>
                    </div>
                    <form method="get" action="{{ url('search/services') }}">
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
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}} " name="search[]">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor bdxs8">
                                    <span class="hidden-x">{{trans('global.search_service')}}</span>
                                    <span class="visible-xs"> <i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
         <section class="mt20 recomend-part">
            <div class="container">
                <div class="row">
                    <div class="webads-image">
                        @if($webads) 
                        <a target="_blank" href="{{$webads->ne_title}}">
                           <img src="{{url('public/media/webads-image',$webads->image)}}" class="iresponsive" id="webads_image"></a>
                            @else 
                        <img src="{{ url('public/website/images/dea/ad.jpg') }}" class="img-responsive">
                        @endif
                    </div>
                </div>

            </div>
        </section>
        <section class="p30 niche-part pb60">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb20">
                        <div class="account-title manageads1 bord0">
                        </div>
                    </div>
                    @if($categories)
                        @foreach ($categories as $key=> $categoryList )
                    <div class="col-lg-3">
                        <ul>
                            <li>
                                <form method="get" action="{{ url('search/services') }}">
                                    <input type="text" name="category[]" value="{{$categoryList->id}}" hidden>
                                 <button 
                                     class="lblu">{{ucwords($categoryList->category_name)}}</button>
                                    </form>
                                    </li>
                        </ul>
                    </div>
                    @endforeach
            @endif
                </div>
            </div>
        </section>
        <section class="recomend-part mt20 p30">
            <div class="container-fluid">
                <div class="row">
                    @if ($serviceitems->count() > 0)
                        <div class="col-lg-10 col-xs-8 mb20">
                            <div class="">
                                <h3>Recommended Deals</h3>

                            </div>
                        </div>
                    @endif
                    @if ($serviceitems->count() > 4)
                        <div class="col-lg-2 col-xs-4 mb20">
                            <div class="section-center-heading">
                                <u>
                                    
                                   <a href="{{url('search/services')}}"> <h5>View all <i class="fas fa-arrow-right"></i></h5></a>
                                </u>

                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow">
                            @if ($serviceitems->count() > 0)
                                @foreach ($serviceitems as $serviceitem)
                                    <div class="product-card">
                                        <div class="product-media resimg ">
                                            
                                            <a href="{{ url('services-detail/' . $serviceitem->slug) }}">
                                                <div class="product-img">

                                                    @if ($serviceitem->image)
                                                        <img src="{{ url('public/media/product-image/' . $serviceitem->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif

                                                </div>
                                            </a>

                                                <div class="product-type">
                                                    <div class="product-btn">
                                                        @if (Auth::check())
                                                            @if($serviceitem->user_id != Auth::user()->id)
                                                                @if($serviceitem->is_buynow == 1)
                                                                    <button type="button" title="Wishlist"
                                                                        data-id="{{ $serviceitem->id }}"
                                                                        class="@if ($serviceitem->user_id != Auth::user()->id) 
                                                                        fa fa-heart  @endif">  
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                        </div>
                                       
                                        <div class="product-content">
                                            <ol class="breadcrumb product-category">
                                                {{-- <li>
                                                    <p class="product-price tblak"> रू</p>
                                                </li> --}}
                                                <li class="breadcrumb-item">
                                                    <a href="{{ url('services-detail/' . $serviceitem->slug) }}"
                                                        tabindex="-1">
                                                        @if (is_numeric($serviceitem->price)) {{ number_format($serviceitem->price) }} @endif</a>
                                                </li>
                                            </ol>
                                            <div class="product-meta">
                                                <a href="{{ url('services-detail/' . $serviceitem->slug) }}"
                                                            class="fs18l3">
                                                <span>{{ ucwords($serviceitem->title) }}</span></a><br>
                                              
                                                 {{-- <span>
                                                    <a href="{{url('services-detail/'.$serviceitem->slug)}}" class="tblack"> Feedback 3.0
                                                    <i class="fa fa-star rating"></i> 
                                                     </a>(2)
                                                 </span> --}}
                                                 @php
                                                      $produstReviews = App\Models\ServiceFeedback::where('product_id',$serviceitem->id);
                                                        $reviews = $produstReviews->get();
                                                        $userCount = $reviews->count();
                                                            $avgRating = $produstReviews->avg('rating');
                                                 @endphp
                                                
                                                 <h6><span class="pfeedback" id="p_feedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                                          <a href="{{url('services-detail/'.$serviceitem->slug)}}" class="tblack"> Feedback {{number_format($avgRating,1)}}
                                          <i class="fa fa-star rating"></i> 
                                           </a>({{$reviews->count()}})
                                       </span></h6>
                                            </div>
                                            <div class="product-info">
                                                <span><i class="fas fa-map-marker-alt"></i> @if ($serviceitem->districtList){{ $serviceitem->districtList->district_name }} @endif</span>
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
		
       



    </div>


@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        var category = "";
        var subCategory = "";
        var path = "{{ url('product-title') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    query: query,
                    slug: "services",
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
                success: function() {

                },
                error: function() {

                }
            })
        })

    </script>
@endsection