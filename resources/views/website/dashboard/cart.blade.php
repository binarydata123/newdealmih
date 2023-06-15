@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<style type="text/css">
    
    p.selller_satus {
    font-size: 14px;
    color: #567df4;
    margin: 6px;
}
.remove-flex {
    display: unset !important;
}
</style>
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 imgrounded">
                    <div class="account-card alert fade show bs">
                        <div class="account-title manageads1">
                            <h6 class="fs164">My Cart <span> ({{$carts->count()}})</span></h6>
                        </div>
                                                      
                           
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                               <br><br>
                               <div class="alert alert-msg  text-center" style="padding: 10px 0;"></div>

                                @php
                                    $price = 0;
                                @endphp



                                @if($carts->count() > 0)
                                    @foreach ($carts as $key => $cart)
                                        @if($cart)
                                            @php
                                                $price+=$cart->price * $cart->cart_quantity;
                                            @endphp
                                            <div class="product-card standard image-heg remove-flex">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="product-media">
                                                    <a href="{{url('product/detail/'.$cart->slug)}}">
                                                    <div class="product-img">
                                                         <img @if($cart) src="{{ url('public/media/product-image/'.$cart->image) }}" 
                                                         @else src="{{ url('public/website/images/product/07.jpg') }}"  @endif
                                                            alt="product"></div>
                                                    </a>
                                                </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-12">
                                                         <div class="product-content">

                                                    <div class="product-info text-cont">
                                                        <ol class="breadcrumb product-category">
                                                            <h5 class="product-title"><a href="{{url('product/detail/'.$cart->slug)}}">@if($cart)
                                                               {{ucwords($cart->title)}} @endif</a></h5>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <li class="breadcrumb-item active s-success" aria-current="page">Brand New
                                                            </li>
                                                        </ol>

                                                        <!---->
                                                        <form class="fpos">
                                                            <div data-id="{{$key+2}}" data-content="{{$cart->cart_product_id}}" class="value-button decreaseValue" id="decrease" 
                                                                value="Decrease Value">
                                                                <span><i class="fa fa-minus"></i></span>
                                                            </div>

                                                            <input type="text" id="number"  class="number{{$key+2}}" value="{{$cart->cart_quantity}}" min="1" disabled="disabled" />
                                                            <div data-id="{{$key+2}}" data-content="{{$cart->cart_product_id}}" class="value-button increaseValue" id="increase" 
                                                                value="Increase Value"  > <span><i class="fa fa-plus"></i></span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <ol class="breadcrumb product-category">    
                                                        <li>
                                                            <p class="product-price tblak"> रू</p>
                                                        </li>
                                                    <li class="breadcrumb-item"><a>
                                                        {{ number_format($cart->price) }} </a></li>
                                                    </ol>



                                                    {{-- <div class="product-meta"><span class="nfs14">Color : Blue
                                                        </span></div> --}}
                                                    <div class="product-info text-cont">
                                                        <a href="#!" class="delete" data-content="cart" data-id="{{$cart->cart_id}}"> <span class="fs14r"><img 
                                                                    src="{{ url('public/website/images/delete.svg') }}"> Delete</span></a>
                                                        {{-- <a href="#!" class="wishlist" data-id="{{$cart->id}}"><span class="fs14r "><img
                                                                    src="{{ url('public/website/images/dea/file-download.svg') }}">WishList
                                                                </span></a> --}}
                                                                <div class="product-btn">
                                                                    @if (Auth::check())
                                                                <button type="button" title="Wishlist"
                                                                data-id="{{$cart->id}}"
                                                                class="@if ($cart->wishlist) @if ($cart->wishlist->user_id == Auth::user()->id) 
                                                                fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
                                                                @endif
                                                                  
                                                                </div>Wishlist
                                                                
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
                                                        </div>
                                                    </div>
                                                    

                                                        @if($cart->pick_up == 1)

                                                            <p class="selller_satus">Pickup from seller</p>

                                                        @else

                                                            <p class="selller_satus">Pickup from store</p>

                                                        @endif

                                                    
                                                </div>
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
                      
                    </div>
                </div>

                @php
                    $grandTotal = $price ;
                @endphp
                @if($carts ->count() > 0)
                <div class="col-lg-4">
                    <div class="account-card alert fade show padf bs">
                        <ul class="br0">
                            <li class="notify-item">
                                <a href="#" class="notify-link">
                                    <p class="nfs162 mt10"> PRICE DETAILS ({{$carts->count()}} Items) </p>
                                </a>
                            </li>
                            <li class="notify-item">
                                <a href="#" class="notify-link">
                                    <p class="nfs163"> Price ({{$carts->count()}} items) <span class="fright2 nfs163 grandTotal"> रू {{$price}}</span>
                                    </p>

                                </a>
                            </li>
                            <hr>
                            <li class="notify-item">
                                <a href="myorders.html" class="notify-link">
                                    <p class="nfs164 mb20"> Total Amount <span class="fright2 nfs164 grandTotal"> रू {{$grandTotal}}</span></p>
                                </a>
                            </li>
                            <li class="notify-item">
                                <div align="center">
                                    <a data-toggle="modal" data-target="#help" class="btn btn-inline4 post-btn"><span
                                            class="twhite">Checkout</span></a>
                                    <!-- <a class="btn btn-inline4 post-btn"><span class="twhite">Checkout</span></a> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <div class="modal fade" id="help">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div align="center">
                        <h4 class="nfs22">Choose Checkout</h4>
                    </div>
                    <div class="mtb30 ml15">
                        <div class="mb20">
                            <input type="radio" id="age1" name="age" value="30" checked="">
                            <label for="age1">
                                <p class="fs18l3"> Checkout for Delivery</p>
                            </label>
                        </div>

                        <div class="mb20">
                            <input type="radio" id="age2" name="age" value="30">
                            <label for="age2">
                                <p class="fs18l3"> Pickup from store /Seller</p>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12"><a href="{{url('order-address')}}"
                            class="btn btn-inline post-btn2 fs18w w100 mb20"><span>Submit</span></a></div>
                </div>
            </div>
        </div>
    </div>

   



@endsection
@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script src="{{url('public/website/js/classified/cart.js')}}"></script>

<script>

$('.wishlist').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: base_url + "wishlist",
                data: {
                    id: id
                },
                success: function(res) {
                  
                       $('.alert-msg').addClass("alert-success");
                       $('.alert-msg').html(res[0]);
                },
                error: function() {

                }
            })
        })

    </script>

@endsection
