@extends('website.layout.app')
@section('css')
@endsection
@section('content')

    <section class="inner-section ad-list-part mt40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb20 fs14">Home/Property/ <a href="#!">List View </a></p>
                </div>
                @include('website.search.filter')
                <input type="text" class="typeCategory" hidden value="{{$flatemate}}" id="">
                <div class="col-lg-8 col-xl-9">
                    <div class="row mb20">
                        <div class="col-lg-9">
                            <div class="header-filter">

                                <h3>Latest Flatmates Wanted</h3>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3">
                            <div class="filter-short">
                                <!-- <label class="filter-label">Sort by :</label> -->
                                <select class="custom-select filter-select">
                                    <option selected>New & Used</option>
                                    <option value="3">trending</option>
                                    <option value="1">featured</option>
                                    <option value="2">recommend</option>
                                </select>
                            </div>
                        </div> --}}
                        @if($slug == 'property')
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
                    <!------------------>
                    <div class="row ad-standard">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 product-result">
                            @if($products->count() > 0)
                                @foreach ($products as $product)
                                    
                            <div class="product-card standard image-heg bshadow mb20">
                                <div class="product-media resimg">
                                    <a href="{{ url('property-detail/' . $product->slug) }}">
                                    <div class="product-img">
                                        @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product">
                                                    @else<img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product">
                                                    @endif</div>
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-info text-cont">
                                        <ol class="breadcrumb product-category">
                                            <h5 class="product-title"><a href="{{ url('property-detail/' . $product->slug) }}">{{ ucwords($product->title) }}  @if(isset($product->propertyFeature->bedrooms)),
                                                {{$product->propertyFeature->bedrooms}}   bedrooms @endif</a></h5>

                           
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            {{-- <li class="breadcrumb-item active s-success" aria-current="page">Available Now
                                            </li> --}}
                                        </ol>
                                        {{-- <h5 class="ffs16">Listed Today</h5> --}}
                                    </div>
                                    {{-- <div class="product-meta"><span class="mfs14l">{{ ucwords($product->title) }}</span>&nbsp;</div> --}}
                                    <div class="product-meta"><span class="fs18l4">रू {{number_format($product->price)}} per week
                                        </span></div>

                                        <div class="product-meta"><span class=" ">Existing Flatemate :  @if(isset($product->propertyFeature->existing_flatemate))
                                            {{$product->propertyFeature->existing_flatemate}}@endif
                                        </span></div>
                                        <div class="product-meta"><span class=" ">Restricted :  
                                            {{-- @if(isset($product->propertyFeature->restricted))
                                            {{$product->propertyFeature->restricted}}@endif --}}
                                        </span></div>

                                      
                                    {{-- <div class="product-info text-cont">
                                        <span class="fs16 tcolor1"><i class="fa fa-users"></i> 2 existing
                                            flatmates</span>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach
                            @else
                            @include('website.no-data')
                            @endif
                        </div>
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
