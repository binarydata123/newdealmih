@extends('website.layout.app')
@section('css')

@endsection
@section('content')
    <div>
        <section class="banner-part9" @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/stores.jpg);"  @endif>
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                        <h1 class="yl"><span class="bghead">
                            @if($cms) {{ucwords($cms->title)}} @else Shop our unique range of new & used @endif</span></h1>
                        </div>
                    </div>
                    <!-- <form method="get" action="{{ url('search/market-place') }}"> 
                    <div class="row newsletter">
                        <div class="col-lg-2 col-md-12">
                            <div class="form-group">
                                <input type="text" hidden name="type" value="1" id="">
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
                                <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}}  " name="search[]">
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                            <div class="form-group">
                                <button class="btn btn-inline22 bbtnmotor store-search bdxs8">
                                    <span class="hidden-x">{{trans('global.search_store')}}</span>
                                    <span class="visible-xs"><i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                     </form>  -->
                     <form method="get" action="{{ url('search/market-place') }}">
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
                                    <input type="text" class=" frmtxt typeahead keyword" placeholder="{{trans('global.search_keyword')}}  " name="search[]">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                                <div class="form-group">
                                    <button class="btn btn-inline22 bbtnmotor bdxs8">
                                        <span class="hidden-x">{{trans('global.search_store')}}</span>
                                        <span class="visible-xs">  <i class="fa fa-search"></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                <form method="get" action="{{ url('search/market-place') }}">
                                    <input type="text" name="category[]" value="{{$categoryList->id}}" hidden>
                                 <button 
                                     class="lblu" id="lblu-button">{{ucwords($categoryList->category_name)}}</button>
                                    </form>
                                    </li>
                        </ul>
                    </div>
                    @endforeach
            @endif
                </div>
            </div>
        </section>
        <section class="p30 niche-part pb60 mt30">
            <div class="container-fluid">
        <div class="row cprofile store-result">
            @if($stores)
                @foreach ($stores as $store)
                   
   <div class="col-md-6 col-lg-3">
      <div class="blog-card">
         <div class="blog-img resimg">
             
            <img @if($store->company_cover_pic) 
            src="{{asset('media/company-cover-pic/'.$store->company_cover_pic)}}"
            @else src="{{url('public/website/images/blog/02.jpg')}}" @endif alt="blog">
         </div>
         <div class="blog-content h240">

            <a href="{{url('store-profile',$store->user_id)}}" class="blog-avatar"><img @if($store->company_log)
                src="{{asset('media/company-logo/'.$store->company_log)}}"
                @else  src="{{url('public/website/images/dea/job/dp.png')}}" @endif alt="avatar"></a>
            <div class="blog-text">
               <h4 class="fs18"><a href="{{url('store-profile',$store->user_id)}}">{{$store->business_name}}</a></h4>
               <p class="fs14">{{$store->about_company}}</p>
            </div>
            @php
                  $produstReviews = App\Models\ProductReview::where('user_id',$store->user_id);
        $reviews = $produstReviews->get();
        $userCount = $reviews->count();
        $avgRating = $produstReviews->avg('rating');
            @endphp
            <a href="{{url('store-profile',$store->user_id)}}" class="tblack">
                <span class="pfeedback">positive</span> <span> Rating
                    {{number_format($avgRating,1)}} ({{$userCount}})<i class="fa fa-star rating"></i>
                  

                </span>
             <br>
            <a href="{{url('store-profile',$store->user_id)}}" class="blog-read"><span>View Store</span><i class="fas fa-long-arrow-alt-right"></i></a>
      
          
        </div>
      </div>
   </div>  
  
        @endforeach
  @endif
 
</div>

{{-- <div class="row">
   <div class="col-lg-12">
      <ul class="pagination">
         <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
         <li class="page-item"><a class="page-link active" href="#">1</a></li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item">...</li>
         <li class="page-item"><a class="page-link" href="#">10</a></li>
         <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
      </ul>
   </div>
</div> --}}


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
                    slug: "market-place",
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

        // search store 
        $('.store-search').on('click',function()
        {
            $.ajax({
                type:"get",
                url:base_url+"stores",
                data:{category,subCategory},
                success:function(data)
                {
                    $('.store-result').html(data.html);
                },error:function()
                {

                }
            });
        });
    </script>
@endsection
