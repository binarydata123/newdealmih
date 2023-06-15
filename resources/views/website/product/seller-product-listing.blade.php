@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<section class="dashboard-part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card p0">
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center" style="padding: 10px 0;">
                            {{ session()->get('success') }}
                        </div>  
                    @endif  
                    <div class="row mt20 mb20">
                        <h3 class="heading_title text-center pb-5" style="width: 100%;">Seller Other Products Listing</h3>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="product-card standard image-heg">
                                        <a href="{{url('product/detail',$product->slug)}}">
                                            <div class="product-media">
                                                <div class="product-imgdd">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}" alt="product" height="142px" width="200">
                                                    @else
                                                        <img src="{{ url('public/website/images/no-image.png') }}" alt="product" height="142px" width="200">
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        <div class="product-content">
                                            <div class="product-info text-cont">
                                                <ol class="breadcrumb product-category">
                                                    <h5 class="product-title"><a href="{{url('product/detail',$product->slug)}}">{{ ucwords($product->title) }}</a></h5>
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
                                            <div class="product-meta">
                                                <span>Closes : {{ date('D d M', strtotime($product->created_at.'+30 days')) }}</span>
                                                <br>
                                               <!--  <span>@if($product->is_approved == 1) Your ads is live or Active. @else Under review by admin @endif</span> -->
                                            </div>
                                            <div class="product-info text-cont">
                                                {{-- <a data-id="{{$product->id}}" class="btn post-btn btn-light sold" data-content="1"><span>Sold Out</span></a> --}}
                                                <!-- <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div>
                                                <div>&nbsp;&nbsp;</div> -->
                                                <!-- <div>
                                                    <a href="{{url('product/edit',$product->slug)}}" class="vall2"><span>Edit</span></a>
                                                </div> -->
                                            </div>
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
    </div>
</section>
@endsection
@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script>
$('.relist').on('click', function(){
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
