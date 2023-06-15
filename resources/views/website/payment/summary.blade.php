@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <section class="dashboard-part pt10">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <ul class="account-title plr20 mb60 b0 mb60">
                        <li class="active"><img src="{{ url('public/website/images/dea/tick.png') }}"> ADDRESS</li>
                        <li>
                            <hr class="wizard">
                        </li>
                        <li class="active current"><img src="{{ url('public/website/images/dea/tick.png') }}"> ORDER SUMMARY</li>
                        <!-- <li>
                            <hr class="wizardg">
                        </li> -->
                        <!-- <li>PAYMENT</li> -->
                    </ul>
                </div>
            </div>
            <div class="alert alert-msg  text-center" style="padding: 10px 0;"></div>
            <div class="row">
                <div class="col-lg-8 imgrounded">
                    <div class="account-card alert fade show bs">
                        <div class="row">
                           
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="product-info wrapinfo mt1 mb10">
                                    <p class="ffs162 mt10 mb10">Orders For Delivery</p>
                                </div>
                                @php
                                    $price = 0;
                                @endphp
                                @if($carts ->count() > 0)
                                    @foreach ($carts as $key => $cart)
                                      @php
                                          $price+=$cart->price * $cart->cart_quantity;
                                      @endphp
                                <div class="product-card standard image-heg">
                                    <div class="product-media">
                                        <a href="{{url('product/detail/'.$cart->slug)}}">
                                        <div class="product-img" id="cart-imgs" >
                                            @if($cart->image != '')
                                             <img src="{{ url('public/media/product-image/'.$cart->image) }}" alt="product">
                                             @else
                                             <img src="{{ url('public/website/images/no-image.png') }}" alt="product">
                                             @endif
                                         </div>
                                        </a>
                                    </div>
                                    <div class="product-content">

                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><a href="{{url('product/detail/'.$cart->slug)}}">@if($cart)
                                                   {{ucwords($cart->title)}} @endif</a></h5>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                               <!--  <li class="breadcrumb-item active s-success" aria-current="page">Brand New
                                                </li> -->
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
                                                        <div class="product-btn">
                                                            <button type="button" title="Wishlist"
                                                            data-id="{{$cart->id}}"
                                                            class="@if ($cart->wishlist) @if ($cart->wishlist->user_id == Auth::user()->id) 
                                                            fa fa-heart wishlist fas   @endif @else  fa fa-heart wishlist @endif"></button>
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
                @php
                    $price = 0;
                @endphp
                <div class="col-lg-4">
                    <form action="{{url('order-create')}}" method="post">
                        @csrf
                        @if ($carts->count() > 0)
                        @foreach ($carts as $key => $cart)
                        <input type="text"  name="cart[]" hidden value="{{$cart->cart_id}}" id="">
                            @php
                                $price += $cart->price * $cart->cart_quantity;
                            @endphp
                        @endforeach
                        @endif
                        @php
                            $grandTotal = $price ;
                        @endphp
                        <div class="account-card alert fade show padf bs">
                            <ul class="br0">
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <p class="nfs162 mt10"> PRICE DETAILS </p>
                                    </a>
                                </li>
                                <li class="notify-item">
                                    <a href="#" class="notify-link">
                                        <p class="nfs163"> Price  <span class="fright2 nfs163grandTotal"> रू {{number_format($price)}}</span>
                                        </p>
                                    </a>
                                </li>

                                {{-- <li class="notify-item">
                                    <a href="myorders.html" class="notify-link">
                                        <p class="nfs163"> Delivery Fee <span class="fright2 nfs163 fteal"> रू 50</span>
                                        </p>

                                    </a>
                                </li> --}}
                                <hr>
                                <li class="notify-item">
                                    <a href="myorders.html" class="notify-link">
                                        <p class="nfs164 mb20"> Total Amount <span class="fright2 nfs164 grandTotal"> रू {{number_format($grandTotal)}}</span></p>

                                    </a>
                                </li>

                                <li class="notify-item">
                                    <div align="center">
                                <!--         <a  @if(isset($product->slug))
                                            href="{{ url('checkout?product='.$product->slug) }}" @else href="{{ url('checkout')}}" @endif class="btn btn-inline4 post-btn"><span
                                                    class="twhite">Checkout</span></a> -->
                            

                                        <!-- <a  data-toggle="modal" data-target="#help" class="btn btn-inline4 post-btn"><span
                                            class="twhite">Checkout</span></a> -->
                                        <button class="btn btn-inline4 post-btn"><span>Checkout</span></button>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

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

                <form action="{{url('order-create')}}" method="post">
                    @csrf
                    @if ($carts->count() > 0)
                        @foreach ($carts as $key => $cart)
                        <input type="text"  name="cart[]" hidden value="{{$cart->id}}" id="">
                            @php
                                $price += $cart->price * $cart->cart_quantity;
                            @endphp
                        @endforeach
                    @endif
                    @php
                    $grandTotal = $price;
                    @endphp
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
                                    <p class="fs18l3"> Pickup from store</p>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12"><button
                                class="btn btn-inline post-btn2 fs18w w100 mb20"><span>Submit</span></button></div>
                    </div>
                </form>
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
