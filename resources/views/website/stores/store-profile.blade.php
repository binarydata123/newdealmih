@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <div>

        <section class="blog-details-part">
            <div class="container">
                <div class="row" style="display:block">
                    <div class="blog-details-author">
                        <div class="col-md-5">

                            <div class="author-intro mt40">
                                <a href="#!"><img 
                                    @if($user->is_business == 1)
                                    @if($store->company_log) 
                                    src="{{ url('public/media/company-logo/'.$store->company_log) }}"
                                    @endif
                                    @elseif($user->avatar)
                                    src="{{ url('public/media/avatar/'.$store->avatar) }}"
                                   @else
                                 src="{{ url('public/website/images/dea/job/dp.png') }}" @endif alt="author"></a>
                                <h4 class="mb10"><a href="#!">@if(isset($store->business_name))
                                    {{ucwords($store->business_name)}} @else {{ucwords($user->username)}} @endif</a></h4>
                                <h6 class="mb10">
                                    <a href="{{url('store-profile',$user->id)}}" class="tblack">
                                        <span class="pfeedback">positive</span> <span> Rating
                                            {{number_format($avgRating,1)}} ({{$userCount}})<i class="fa fa-star rating"></i>
                                            {{-- <i class="fa fa-star rating"></i>
                                            <i class="fa fa-star rating"></i>
                                            <i class="fa fa-star rating"></i>
                                            <i class="fa fa-star empty"></i> --}}

                                        </span>
                                    </a>
                                </h6>
                                <p>@if(isset($store->about_company)) {{$store->about_company}} @endif</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="storeimg">
                            @if(isset($store->company_cover_pic))
                            <img @if($store->company_cover_pic)
                            src="{{asset('media/company-cover-pic/'.$store->company_cover_pic)}}" @else
                             src="{{ url('public/website/images/blog/03.jpg') }}" @endif class="img-responsive" alt="blog">
                             @else
                             {{-- no image  --}}
                             <img
                              src="{{ url('public/website/images/dea/job/cover.png') }}" class="img-responsive shadow" alt="blog">
                             @endif
                                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        @if($products->count() > 0)
        <section class="p30 niche-part pb60" id="product_section">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-lg-12 mb10">
                                <div class="header-filter">

                                    <div>
                                        <h3>Products</h3>

                                    </div>

                                    {{-- <div class="filter-short">
                                        <!-- <label class="filter-label">Sort by :</label> -->
                                        <select class="custom-select filter-select">
                                            <option selected>New & Used</option>
                                            <option value="1">Brand new</option>
                                            <option value="2">Used</option>
                                           
                                        </select>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           @if($products)
                              @foreach($products as $product)
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="product-card" style="width: 294px;">
                                    <a href="#!">
                                       <div class="product-media resimg">
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
                                     
                                    <div class="product-content">
                                        {{-- <ol class="breadcrumb product-category">
                                            <li><i class="fas fa-dollar"></i></li>
                                            <li class="breadcrumb-item"><a href="#">{{number_format($product->price)}}</a></li>

                                        </ol> --}}

                                        <ol class="breadcrumb product-category">
                                            <li>
                                                <p class="product-price tblak"> रू</p>
                                            </li>
                                            <li class="breadcrumb-item"><a
                                            >

                                                    @if (is_numeric($product->price)) {{ number_format($product->price) }} @endif</a></li>
                                        </ol>

                                        <div class="product-meta"><span>{{ucwords($product->title)}}</span><br>
                                          @if($product->type == 2)
                                          <span class="s-used">Used</span>

                                            @else
                                            <span class="s-success">New</span>

                                            @endif
                                        </div>
                                        <div class="product-info">
                                          <span><i class="fas fa-map-marker-alt"></i> @if ($product->districtList){{ $product->districtList->district_name }} @endif
                                              {{-- @if ($product->municipalityList) , {{ $product->municipalityList->municipality_name }} @endif --}}
                                          </span>
                                          
                                          <div> <span> 
                                               Closes: {{ $product->created_at->addDays(30)->format('D d M') }}  </span></div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                              @endforeach
                           @endif
                           
                        </div>
                         

                </div>
            </div>
        </section>
        @else
        @include('website.no-data')
        @endif

        <section class="p30 niche-part pb60">
            <div class="container-fluid">


                <div class="row cprofile">



                    <div class="col-md-9">
                        <div class="row">

                            <div class="common-card shadow" id="review">
                                <div class="card-header">
                                    <h5 class="card-title">Reviews ({{$reviews->count()}})</h5>
                                </div>
                                <div class="ad-details-review">
                                    @if(Auth::check())

                                    <form  class="review-form mb20 formSubmit" method="post">
                                        @csrf
                                        <input type="text" hidden name="user_id" value="{{$slug}}" id="">
                                        <input type="text" hidden name="submitted_user" value="{{Auth::user()->id}}" id="">

                                        {{-- <div class="star-rating"><input type="radio" name="rating" value="5"  id="star-1"><label
                                                for="star-1"></label><input type="radio" name="rating" value="4" id="star-2"><label
                                                for="star-2"></label><input type="radio" name="rating" value="3"  id="star-3"><label
                                                for="star-3"></label><input type="radio" name="rating" value="2"  id="star-4"><label
                                                for="star-4"></label>
                                                <input type="radio" name="rating" value="1"  id="star-5">
                                                <span class="error" style="color: red;"></span>

                                             
                                                <label
                                                for="star-5"></label></div> --}}
                                        <div class="row">

                                            <div class="col-md-6">
                                            <div class="star-rating">
                                                
                                                <input type="radio" name="rating" value="5"  id="star-1"><label
                                                for="star-1"></label><input type="radio" name="rating" value="4" id="star-2"><label
                                                for="star-2"></label><input type="radio" name="rating" value="3"  id="star-3"><label
                                                for="star-3"></label><input type="radio" name="rating" value="2"  id="star-4">
                                               <label
                                                for="star-4">

                                               
                                                
                                            </label>
                                                <input type="radio" name="rating" value="1"  id="star-5">
                                               
                                                <label
                                                for="star-5"></label>
                                                <div class="rating-error" style="color: red;"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                                <div class="form-group"><input type="text" class="form-control"
                                                       name="title" placeholder="Title" >
                                                <span class="error" style="color: red;"></span>
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control"
                                               name="review" placeholder="Describe"></textarea>
                                               <span class="error" style="color: red;"></span>
                                            </div>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-inline review-submit"><i
                                                class="fas fa-tint"></i><span>drop your review</span></button>
                                    </form>
                                    @else

                                    <button type="submit" class="btn btn-inline review-submit"
                                    @if (!Auth::check()) data-toggle="modal"
                                    data-target="#login"
                                    @endif ><i
                                       
                                        class="fas fa-tint"></i><span>Login and drop your review</span></button>

@endif

                                    <ul class="review-list">
                                        @if($reviews)
                                            @foreach($reviews as $review)
                                        <li class="review-item">
                                            <div class="review-user">
                                                <div class="review-head">
                                                    <div class="review-profile">
                                                        <a href="#" class="review-avatar"><img
                                                                @if($review->user)
                                                                @if(isset($review->user->avatar))
                                                                src="{{ url('public/media/avatar/'.$review->user->avatar) }}"
                                                                 @else src="{{ url('public/website/images/user.png') }}" @endif
                                                                 @endif
                                                                alt="review"></a>
                                                        <div class="review-meta">
                                                            <h6><a href="#">@if($review->user) {{ucwords($review->user->username)}} - @endif</a><span>{{$review->created_at->format('M d Y')}}</span></h6>
                                                            <ul>
                                                                <li><i class="fas fa-star @if($review->rating >= 1) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 2) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 3) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 4) active @endif"></i></li>
                                                                <li><i class="fas fa-star @if($review->rating >= 5) active @endif"></i></li>
                                                                <li>
                                                                    <h5>- {{$review->title}}</h5>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="review-desc">{{$review->review}}</p>
                                            </div>
                                        </li>
                                            @endforeach
                                        @endif
                                     
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ url('public/website/images/ad.png') }}" alt="review">
                    </div>

                </div>
        </section>
    </div>


@endsection
@section('js')
   
@endsection
