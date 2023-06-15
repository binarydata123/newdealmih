<style>
    
@media(max-width:1050px){ 
.form-group label {
    width: 100%;
}
.form-group label span.control__content {
    width: 100%;
}

}
.product-content {
    height: 100%;
    padding: 0px 0px;
    position: relative;
}
.product-info {
    position: absolute;
    bottom: 0;
}
p.img_job {
    margin-bottom: 15%;
    display: block;
}    
</style>
@extends('website.layout.app')
@section('css')
@endsection
@section('content')


    <div>
        <section class="banner-part6"  @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/dea/jobs.jpg);"  @endif >
            <div class="container-fluid">
                <div class="banner-content xsbg">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="yl"><span class="bghead">
                                @if($cms) {{ucwords($cms->title)}} @else Browse Jobs Here @endif</span></h1>
                        </div>
                    </div>
                    <form method="get" action="{{ url('search/jobs') }}">
                        <div class="row newsletter">
                            <div class="col-lg-2 col-md-12">
                                <div class="form-group bshadow">
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
                                <div class="form-group form-control bordr0 bshadow bdxs82">
                                    <i class="fa fa-search hidden-x"></i>
                                    <input class="frmtxt typeahead keyword" type="text" placeholder="{{trans('global.search_keyword')}} "
                                        name="search[]">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-4 padl0">
                                <div class="form-group">
                                    <button class="btn btn-inline22 bbtnmotor bshadow bdxs8">
                                        <span class="hidden-x">{{trans('global.search_job')}}</span>
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
        <section class="mar30 niche-part pb60 sbox">
            <div class="container bgwhite formwht">
                <div class="row">
                    <div class="col-lg-12 pl0">
                        <div class="niche-nav">
                            <ul class="nav nav-tabs tableft navwp">
                                <li><a href="#ratings" class="nav-link active" data-toggle="tab">Browse Job Categories</a>
                                </li>
                                <!-- <li><a href="#advertiser" class="nav-link" data-toggle="tab">For Rent</a></li> -->

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="ratings">
                    <form method="get" action="{{ url('search/jobs') }}">

                    <div class="row ml0">
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">Keywords</legend>
                                    <input class="form-control b0" type="text" placeholder="Search Jobs" name="search">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">Location</legend>
                                    <select class="form-control b0" name="district">
                                        <option value="">All locations</option>
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
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">Category</legend>
                                    <select class="form-control b0">
                                        <option value="">All Categories</option>
                                        @if ($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row ml0" id="vmore">
                        <div class="col-lg-4">
                            <div class="form-group mt15">
                                <fieldset>
                                    <legend class="mbm12">Job Types</legend>
                                    <select class="form-control b0" name="jobType">
                                        <option value="">All Job Types</option>
                                        <option value="1">Full time</option>
                                        <option value="2">Part time</option>
                                        <option value="3">Work From Home</option>

                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="row ml0" id="sp-r-l">
                                <div class="col-lg-6 pl0 pl0xs">
                                    <div class="form-group">
                                        <p class="ffs14">Pay Type</p>
                                        <label class="control mt0 h40 w100xs" for="delivery">
                                            <input type="checkbox" name="pay_type[]" id="delivery" value="1">
                                            <span class="control__content jfld w100xs">

                                                <span class="set-txt">Monthly </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="fo12">&nbsp;</p>
                                        <label class="control mt0 h40 w100xs" for="hourly">
                                            <input type="checkbox" name="pay_type[]" id="hourly" value="2">
                                            <span class="control__content jfld w100xs">

                                                <span class="set-txt">Annual </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="row ml0">
                                <div class="col-lg-12 pl0">
                                    <div class="form-group">
                                        <p class="ffs14">Salary</p>
                                        <select class="form-control salary_scal" name="salary">
                                            <option value="">Any</option>
                                  
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
                                </div>

                                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="ffs14">To</p>
                                        <select class="form-control h52">
                                            <option value="">Any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <a href="#!" class="fs14blu">Browse Work from home jobs</a>
                            </div>
                        </div> --}}
                       
                    </div>
                    <div align="right" class="col-lg-12" id="center-btn">
                        <!-- <button type="button" class="btn btn-info fil mb20xs" data-toggle="collapse" data-target="#vmore">More Options <i class="fa fa-sort" aria-hidden="true"></i></button> -->
                            <button class="btn btn-inline fil" id="searchjobbtn">Search Job</button>
                           
                        </div>
                    </form>
                </div>
                <div class="tab-pane " id="advertiser">
                    <div class="row">
                        <h3 class="mb20">No Data</h3>
                    </div>
                </div>
                <div class="tab-pane" id="engaged">
                    <div class="row">
                        <h3 class="mb20">No Data</h3>
                    </div>
                </div>
            </div>
        </section>
		
        <!--tab-->
        <section class="mt20 recomend-part">
            <div class="container">
                <div class="row">
                    <div class="webads-image ">
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
		
        <section class="recomend-part mt20 mb40">
            <div class="container-fluid">
                @if ($products->count() > 0)
                    <div class="row">
                        <div class="col-lg-10 col-xs-8">
                            <div class="">
                                <h3 class="mfs24">Jobs</h3>

                                <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>



                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-4">
                            <div class="section-center-heading">
                                <u>
                                    <a href="{{ url('search/jobs') }}">
                                        <h5 class="">View all <i class="fas fa-arrow-right"></i></h5>
                                    </a>
                                </u>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recomend-slider slider-arrow jobslide" id="slider-part">
                            @if ($products)
                                @foreach ($products as $product)
                                    <div class="product-card mb20">
                                        <div class="product-media">
                                            @if($product->is_sold == '1')
                                                <span style="position: absolute;background: #ff0000;margin-left: 5px;margin-top: 7px;padding: 0 15px 0 15px;line-height: 24px;color: #fff;font-size: 12px;border-radius: 3px;z-index: 9999 !important;">Closed</span>
                                            @elseif($product->is_sold == '2')
                                                <span style="position: absolute;background: #F5C330;margin-left: 5px;margin-top: 7px;padding: 0 15px 0 15px;line-height: 24px;color: #fff;font-size: 12px;border-radius: 3px;z-index: 9999 !important;">Paused</span>
                                            @else
                                            @endif
                                            <div class="product-type wl">
                                                <div class="product-btn">
                                                    @if(Auth::check())
                                                        @if($product->user_id != Auth::user()->id)
                                                            @if($product->is_buynow == 1)
                                                                <button type="button" title="Wishlist"
                                                                    data-id="{{ $product->id }}"
                                                                    class="@if ($product->user_id != Auth::user()->id) 
                                                                fa fa-heart @endif"></button>
                                                            @endif
                                                        @endif
                                                    @endif                                                
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="product-content">
                                            <div class="breadcrumb product-category h165">
                                                <div class="ml20">
                                                    <p class="breadcrumb-item"><a
                                                            href="{{ url('jobs-detail/' . $product->slug) }}"
                                                            class="fs18l3">{{ ucwords($product->title) }}</a></p>
                                                    
                                                    <p class="fs14o" data-toggle="tooltip" data-placement="top" title="{{strip_tags($product->description)}}">{{ Str::limit(strip_tags($product->description,20)) }}</p>

                                                    {!! Str::limit($product->description, 20) !!}

                                                    <p class="img_job" style="height:50px;overflow:hidden;">
                                                        <a href="{{ url('jobs-detail/' . $product->slug) }}">
                                                            
                                                             <img class="image_slider" @if (isset($product->seller_image))
                                                            src="{{ url('public/media/seller-image/' . $product->seller_image) }}"
                                                        @else src="{{ url('public/website/images/dea/old_logo.png') }}"
                                @endif
                                class="mb20" width="48">
                                </a></p>
                        </div>
                    </div>
                    <div class="product-info">
                        <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                            {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                        </span>
                        <div>
                        <span>
                                Listed Date: {{ $product->created_at->format('D d M') }}
                            </span></div>
                    </div>
                </div>


            </div>
            @endforeach
            @endif
			

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
                            <a href="{{ url('search/jobs') }}" class="vall2 fs18l2"><span>View all <i
                                        class="fa fa-arrow-right"></i></span></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Jobs by Location </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Jobs in Kathmandu</a></li>
                        <li><a href="#!" class="lpink">Jobs in Bhaktapur</a></li>
                        <li> <a href="#!" class="lorg">Jobs in Pokhara</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20"> Jobs by Sector </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Jobs in Trades & services</a></li>
                        <li><a href="#!" class="lpink">Jobs in Healthcare</a></li>
                        <li> <a href="#!" class="lorg">Jobs in Transport & logistics</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20">Popular Jobs </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Jobs in Drivers & couriers</a></li>
                        <li><a href="#!" class="lpink">Jobs in Building & carpentry</a></li>
                        <li> <a href="#!" class="lorg">Jobs in Nursing & midwifery</a></li>
                    </ul>
                </div>

                <div class="col-lg-3">
                    <p class="fs18l3 mb20">Work from home Jobs </p>
                    <ul>
                        <li> <a href="#!" class="lblu">Work from home jobs in Call centre</a></li>
                        <li><a href="#!" class="lpink">Work from home jobs in Accountants</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section> --}}
    </div>

			<div class="container">
			<center><h2 style="font-size:26px;">List or Find Best Jobs Online in Nepal</h2></center><br>
				<p style="text-align:justify;">Dealmih is an online platform that connects job-seeking people with job-giving people. If you are in search of a job, then you can easily get housekeeping jobs in Bhaktapur by connecting with us. We offer a group of dependable, highly skilled maids who can clean your homes and apartments. In accordance with your needs, we offer housekeeping services such as laundry, bathroom polishing, dishwashing, folding laundry, ironing clothes, and much more. Our demanding inspectors are pleased with the work of our maids and are sure that the housekeeping service is worthwhile.</p><br/>
				<p style="text-align:justify;">You can also list job vacancies online in Lalitpur so that you will get connected with job-seeking employees through our platform. We also help people who want to start their careers in their respective fields just after their graduation. For this, we provide job vacancies for freshers in Bhaktapur so that people easily get connected with the people and will get jobs easily. Dealmih is a marketplace for job-seekers as well as for job providers where they can hire employees as per their needs and budget. You can also find care tacker jobs online in Kathmandu to take care of your newly born baby or adult people who require special attention for their living at affordable prices.</p>
           <br><br>
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
                    slug: "jobs",
                    category: category
                }, function(data) {
                    return process(data);
                });
            }
        });

        $('.category').on('change', function() {
            category = $(this).val();
        })
        $('.keyword').on('change', function() {
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
