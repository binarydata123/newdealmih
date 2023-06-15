@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">


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
                  <li><a href="#ratings" class="nav-link active" data-toggle="tab"> My store Products</a></li>

               </ul>
            </div>
         </div>
      </div>

      <!--tab1-->
      <div class="tab-pane active" id="ratings">
      <div class="row wishlist1 mt20 mb20">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @if ($products->count() > 0)
                                @foreach ($products as $product)
                                @if($product->category->header_category_id != '4')
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
                                            <a href="{{url('product/detail',$product->slug)}}">
                                            <div class="product-media">

                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product" height="142px" width="200">
                                                    @else
                                                        <img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" height="142px" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                            </a>
                                            <div class="product-content">

                                                <div class="product-info text-cont">
                                                    <ol class="breadcrumb product-category">
                                                        <h5 class="product-title"><a
                                                                href="{{url('product/detail',$product->slug)}}">{{ ucwords($product->title) }}</a></h5>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        @if ($product->type == 1)
                                                            <span class="s-used">Used</span>
                                                        @else
                                                            <li class="s-success">Brand New</li>
                                                        @endif
                                                        {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                                        </li> --}}
                                                    </ol>
                                                    <h5 class="product-price">रू {{ number_format($product->price) }}
                                                    </h5>
                                                </div>
                                                <div class="product-meta"><span>Closes :
                                                        {{ $product->created_at->addDays(30)->format('D d M') }}</span>
                                                        <br>  <span>@if($product->is_approved == 1) 
                                                            Your ads is live or Active.
                                                             @else Under review by admin @endif</span>
                                                </div>
                                                
                                                <div class="product-info text-cont">
                                                    
                                                    {{-- <a data-id="{{$product->id}}" class="btn post-btn btn-light sold" data-content="1"><span>
                                                       
                                                        Sold Out</span></a> --}}
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
                                        @endif
                                @endforeach
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


      <!--tab3-->
      

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
        swal({
        title: "Are you sure ?",
        text: "Are you sure you want to sold ?", 
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
