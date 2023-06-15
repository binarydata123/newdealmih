@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<style>
    img#data-img {
    width: 400px;
    height: 200px;
    max-width: 100% !important;
}
/*.post-btn {
    width: 190px;
    
}*/




</style>

@php
$header_category = App\Models\HeaderCategory::getheadercategory();
@endphp
 
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                            <div class="row mb-5">


                                <div class="col-sm-6">
                                     <label style="text-align: right;display: block;margin: 10px;">Please Select Category</label>
                                </div>
                               
                            
                                <div class="col-sm-6">
                                  <select class="form-control" id="managedropadd">
                                      <option value="all">All</option>
                                       @foreach($header_category as $cat)
                                        <option value="{{$cat->id}}" {{ ( Request::segment(2) == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                                
                            </div>

                <!------------------------------------------------------------->

      <div class="account-card bs p0">
        @if (session()->has('success'))
        <div class="alert alert-success text-center" style="padding: 10px 0;">
            {{ session()->get('success') }}
        </div>
        @endif   
      <div class="row">
         <div class="col-lg-12">
            <div class="niche-nav">
               <ul class="nav nav-tabs">
                  <li><a href="#ratings" class="nav-link active" data-toggle="tab"> My Product</a></li>   
                  @if($managecount > 0)
 
                  @if($header_cat_id == '3')              
                    <li><a href="#advertiser" class="nav-link" data-toggle="tab"> Sold/Rented</a></li>
                  @else
                    <li><a href="#advertiser" class="nav-link" data-toggle="tab"> Sold</a></li>
                  @endif
                  @else 
                  <li><a href="#advertiser" class="nav-link" data-toggle="tab"> Sold</a></li>
                  @endif
                  <li><a href="#engaged" class="nav-link" data-toggle="tab"> Expired</a></li>
               </ul>
            </div>
         </div>
      </div>

      <!--tab1-->

      <div class="tab-pane active" id="ratings">
      <div class="row wishlist1 mt20 mb20">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            
                               @if($managecount > 0)

                                @if ($products->count() > 0)
                                @foreach ($products as $product)
                                <!---->
                                 @php                                                         
                                  $category_data = DB::table('categories')->where('id', $product->category_id)->first();
                                        $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();

                                    @endphp


                                   
                                    <!---->
                                        <div class="product-info wrapinfo mt0">
                                            <p class="product-title">
                                                <!-- <a href="#">
                                                Order ID: 44253457{{ $product->id }}</a>  -->
                                            </p>
                                            <div>
                                                <button type="button" title="Wishlist"
                                                   data-id="{{$product->id}}" data-content="product" class="far fa-trash-alt tred fs18w delete"></button>
                                                </div>
                                        </div>
                                        <div class="product-card standard image-heg">
                                            @if($header_category_data->id != '5')
                                            <a href="{{url('product/detail',$product->slug)}}">
                                            <div class="product-media">
                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product"id="data-img">
                                                    @else
                                                        <img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" id="data-img">
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                            @else 
                                             <a href="{{url('services-detail',$product->slug)}}">
                                            <div class="product-media">
                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product"id="data-img">
                                                    @else
                                                        <img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" id="data-img">
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                            @endif
                                            <div class="product-content">

                                                <div class="product-info text-cont">
                                                    <ol class="breadcrumb product-category">
                                                        <h5 class="product-title">
                                                            @if($header_category_data->id != '5')
                                                            <a href="{{url('product/detail',$product->slug)}}">{{ ucwords($product->title) }}</a>
                                                            @else
                                                            <a href="{{url('services-detail',$product->slug)}}">{{ ucwords($product->title) }}</a>
                                                            @endif
                                                            </h5>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        {{-- @if ($product->type == 1)
                                                            <span class="s-used">Used</span>
                                                        @else
                                                            <li class="s-success">Brand New</li>
                                                        @endif --}}
                                                        {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                                        </li> --}}
                                                        @if($product->quantity > '1')
                                                         <li class="s-success">Quantity: {{ $product->quantity }}</li>
                                                         @endif
                                                    </ol>
                                                @if($header_category_data->name != 'Services')

                                                    <h5 class="product-price">रू {{ number_format($product->price) }}                                                        
                                                    </h5>
                                                      @else
                                                    <h5 class="product-price"></h5>

                                                    @endif
                                                   
                                                </div>
                                                <div class="product-meta"><span>Closes :
                                                        {{ $product->created_at->addDays(30)->format('D d M') }}</span>
                                                        <br>  <span>@if($product->is_approved == 1) 
                                                            Your ad is live or Active.
                                                             @else Under review by admin @endif</span>
                                                </div>
                                                
                                                <div class="product-info text-cont">
                                                    <a data-id="{{$product->id}}" class="btn post-btn btn-light sold" data-content="1" data-type-row="product" data-type="@if(!empty($product->job_type)) Closed @endif"><span>
                                                        @if($product->sub_category == 67 || $product->sub_category == 71 || $product->sub_category == 68 || $product->sub_category == 327)
                                                        @if(!empty($product->job_type)) Closed @else Mark as Rented @endif
                                                        @else
                                                        @if(!empty($product->job_type)) Closed @else Mark as Sold Out @endif
                                                        @endif
                                                    </span></a>
                                                        <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                                        <div>
                                                        <a href="{{url('product/edit',$product->slug)}}" class="vall2"><span>Edit</span></a>
                                                    </div>
                                                    {{-- <a href="#" class="btn btn-inline post-btn"><span>Quick
                                                            Relist</span></a> --}}
                                                    
                                                   
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                @include('website.no-data')
                            @endif

                            @else
                                 @include('website.no-data')
                            @endif
                            </div>
                        </div>

                            {{-- <div class="col-lg-12">
                                <div class="form-group"><i class="fa fa-plus tblu"></i> <a href="#!"
                                        class="hrf"> Add another method </a></div>
                            </div> --}}
                           
                        </div>
     

      <!--tab1-->


<!--tab2-->
      <div class="tab-pane" id="advertiser">
        <div class="row wishlist1 mt20 mb20">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                 @if($managecount > 0)
            @if ($soldProducts->count() > 0)
            @foreach ($soldProducts as $soldProduct)

            @php                                                         
              $category_data = DB::table('categories')->where('id', $soldProduct->category_id)->first();
              $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();
            @endphp
                    <div class="product-info wrapinfo mt0">
                        <p class="product-title">
                        {{--<a href="#">
                            <!-- Order ID: 44253457{{ $product->id }} -->
                        </a> --}}
                        </p>
                        <div>
                            <button type="button" title="Wishlist"
                               data-id="{{$soldProduct->id}}" data-content="product" class="far fa-trash-alt tred fs18w delete"></button>
                            </div>
                    </div>
                  

                    <div class="product-card standard image-heg">
                        @if($header_category_data->id != '5')
                        <a href="{{url('product/detail',$soldProduct->slug)}}">
                        <div class="product-media ">
                            <div class="product-img">
                                @if ($soldProduct->image)
                                    <img src="{{ url('public/media/product-image/' . $soldProduct->image) }}"
                                        alt="product" id="data-img">
                                @else
                                    <img src="{{ url('public/website/images/no-image.png') }}"
                                        alt="product" id="data-img">
                                @endif
                            </div>
                        </div>
                        </a>
                        @else
                        <a href="{{url('services-detail',$soldProduct->slug)}}">
                        <div class="product-media ">
                            <div class="product-img">
                                @if ($soldProduct->image)
                                    <img src="{{ url('public/media/product-image/' . $soldProduct->image) }}"
                                        alt="product" id="data-img">
                                @else
                                    <img src="{{ url('public/website/images/no-image.png') }}"
                                        alt="product" id="data-img">
                                @endif
                            </div>
                        </div>
                        </a>
                        @endif
                      
                        <div class="product-content">

                            <div class="product-info text-cont">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title">
                                        @if($header_category_data->id != '5')
                                        <a href="{{url('product/detail',$soldProduct->slug)}}">{{ ucwords($soldProduct->title) }}</a>
                                        @else 
                                        <a href="{{url('services-detail',$soldProduct->slug)}}">{{ ucwords($soldProduct->title) }}</a>
                                        @endif
                                    </h5>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if ($soldProduct->type == 1)
                                        <span class="s-used">Used</span>
                                    @else
                                        <li class="s-success">Brand New</li>
                                    @endif
                                    {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                    </li> --}}
                                </ol>
                                <h5 class="product-price">रू {{ number_format($soldProduct->price) }}
                                </h5>
                            </div>
                            <div class="product-meta"><span>Closes :
                                    {{ $soldProduct->created_at->addDays(30)->format('D d M') }}</span>
                                <br>
                            
                            @if($soldProduct->orderProduct)
                                @if($soldProduct->orderProduct->orderList)
                                @if($soldProduct->orderProduct->orderList->user)
                            <span>Order By :
                                {{ucwords($soldProduct->orderProduct->orderList->user->username)}}</span>
                       
                             @endif
                            @endif
                        @endif

                    </div>

                            <div class="product-info text-cont">
                                <a data-id="{{$soldProduct->id}}" class="btn post-btn btn-light sold" data-content="0" data-type-row="sold" data-type="@if(!empty($soldProduct->job_type)) Closed @endif"><span> 

                                    @if($soldProduct->sub_category == 67 || $soldProduct->sub_category == 71 || $soldProduct->sub_category == 68 || $soldProduct->sub_category == 327)
                                     @if(!empty($soldProduct->job_type)) Open @else Rent @endif 
                                    @else
                                       @if(!empty($soldProduct->job_type)) Open @else Unsold @endif 
                                    @endif
                                </span></a>
                                {{-- <a href="#" class="btn btn-inline post-btn"><span>Quick
                                        Relist</span></a> --}}
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>
                                    <a href="{{url('product/edit',$soldProduct->slug)}}" class="vall2"><span>Edit</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            @endforeach
        @else
            @include('website.no-data')
        @endif
        @else
            @include('website.no-data')
        @endif
            </div>
         </div>
      </div>

      <!--tab2-->


      <!--tab3-->
      <div class="tab-pane" id="engaged">
        <div class="row  wishlist1 mt20 mb20">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @if($managecount > 0)
            @if ($expiredProducts->count() > 0)
            @foreach ($expiredProducts as $expiredProduct)
            

            @php

                $category_data = DB::table('categories')->where('id', $expiredProduct->category_id)->first();
              $header_category_data = DB::table('header_categories')->where('id', $category_data->header_category_id)->first();

                $expiredDate = $expiredProduct->created_at->addDays(30)->format('Y-m-d');
            @endphp
              
                    <div class="product-info wrapinfo">
                        {{-- <p class="product-title"><a href="#">Order ID: 44253457{{ $product->id }}</a> --}}
                        </p>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div>
                            <button type="button" title="Wishlist"
                               data-id="{{$expiredProduct->id}}" data-content="product" class="far fa-trash-alt tred fs18w delete"></button>
                            </div>
                    </div>
                    <div class="product-card standard image-heg">
                         @if($header_category_data->id != '5')
                        <a href="{{url('product/detail',$expiredProduct->slug)}}">
                        <div class="product-media">
                            <div class="product-img">
                                @if ($expiredProduct->image)
                                    <img src="{{ url('public/media/product-image/' . $expiredProduct->image) }}"
                                        alt="product" height="142px" width="200">
                                @else
                                    <img src="{{ url('public/website/images/no-image.png') }}"
                                        alt="product" height="142px" width="200">
                                @endif
                            </div>
                        </div>
                        </a>
                        @else
                        <a href="{{url('services-detail',$expiredProduct->slug)}}">
                        <div class="product-media">
                            <div class="product-img">
                                @if ($expiredProduct->image)
                                    <img src="{{ url('public/media/product-image/' . $expiredProduct->image) }}"
                                        alt="product" height="142px" width="200">
                                @else
                                    <img src="{{ url('public/website/images/no-image.png') }}"
                                        alt="product" height="142px" width="200">
                                @endif
                            </div>
                        </div>
                        </a>
                        @endif
                        <div class="product-content">

                            <div class="product-info text-cont">
                                <ol class="breadcrumb product-category">
                                    <h5 class="product-title">
                                        @if($header_category_data->id != '5')
                                        <a href="{{url('product/detail',$expiredProduct->slug)}}">{{ ucwords($expiredProduct->title) }}</a>
                                        @else 
                                        <a href="{{url('services-detail',$expiredProduct->slug)}}">{{ ucwords($expiredProduct->title) }}</a>
                                        @endif
                                    </h5>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    @if ($expiredProduct->type == 1)
                                        <span class="s-used">Used</span>
                                    @else
                                        <li class="s-success">Brand New</li>
                                    @endif
                                    {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                    </li> --}}
                                </ol>
                                <h5 class="product-price">रू {{ number_format($expiredProduct->price) }}
                                </h5>
                            </div>
                            <div class="product-meta"><span>Closes :
                                    {{ $expiredProduct->created_at->addDays(30)->format('D d M') }}</span>
                            </div>
                            <div class="product-info text-cont">
                                <a data-id="{{$expiredProduct->id}}" class="btn post-btn btn-light sold" data-content="0"><span>Sold </span></a>
                                <a data-id="{{$expiredProduct->id}}" class="btn btn-inline post-btn relist"><span>Quick
                                        Relist</span></a>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>&nbsp;&nbsp;</div>
                                <div>
                                    <a href="{{url('product/edit',$expiredProduct->slug)}}" class="vall2"><span>Edit</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
           
            @endforeach
        @else
            @include('website.no-data')
        @endif
        @else
            @include('website.no-data')
        @endif
            </div>
         </div>
      </div>

      <!--tab3-->
    
  
                            </div>
<!-------------------------------------------------------------->


                  
                </div>

            </div>
        </div>
    </section>

@endsection
@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script>
    // sold or unsold product status change
    $('.sold').on('click', function()
    {
        var id = $(this).data('id');
        var value = $(this).data('content');
        var msg = $(this).data('type').trim();
        var type = $(this).data('type-row').trim();
        var newtext = $(this).text().trim();
       
        if(type == 'product'){

                if(msg == 'Closed'){

                    textmsg = 'Are you sure to Close this job ?';

                }

                if(newtext == 'Mark as Rented'){

                     textmsg = 'Are you sure you want to rented ?';
                }
                else {
                    textmsg = 'Are you sure you want to sold ?';
                }
        }

        if(type == 'sold'){ 

            if(msg == 'Closed'){

                    textmsg = 'Are you sure to Open this job ?';

                }
                if(newtext == 'Rent'){

                     textmsg = 'Are you sure you want to Rent it?';
                }
                else {
                    textmsg = 'Are you sure you want to unsold ?';
                }

        }

        swal({
        //title: "Are you sure ?",
        text: textmsg, 
        icon: "warning",
        buttons: true,
        dangerMode: true,
        showCancelButton: true,
    })
          .then((willDelete) => {
                    if (willDelete) {

        $.ajax({
            type:"post",
            url:base_url+"product/sold",
            data:{id:id,value:value},
            success:function(result)
            {
                if(result.status ==true)
                    {
                        location.reload();
                    }
            },error:function()
            {

            }
        })
    } 
                });
                
    })

    $('#managedropadd').on('change', function (e) {
         var optionSelected = $("option:selected", this);
         var url = this.value;

         if(url == 'all'){
            window.location.href = base_url+'manage-ads';
        }else if(url == '4'){
            window.location.href = base_url+'job-profile/?job_post=active';
        
        }else {
            window.location.href = base_url+'manage-ads/'+url;
        }

    });

    $('.relist').on('click', function()
    {
        var id = $(this).data('id');
        $.ajax({
            type:"post",
            url:base_url+"product/relist",
            data:{id:id},
            success:function(data)
            {
                if(data.status == true)
                {
                    location.reload();
                }
            },error:function(data)
            {

            }
        })
    })
</script>
@endsection
