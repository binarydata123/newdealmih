@extends('website.layout.app')
@section('css')
@endsection
@section('content')
@include('website.no-data')

</style>
<div class="modal fade" id="language" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="mfs24">Order Successful</h4>
                <p class="sgreen">Your Order has been placed Successfully. Store Owner will Contact You soon.</p>
                <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10" width="180px">
                <div class="bussiness_owner_details">
                    <p>You can also Contact Business Owner on this Details:</p>
                <?php 
                    if ($carts) {
                        foreach ($carts as $cart) {
                            $product = DB::table('products')->where('id', $cart->product_id)->first();
                            $user_id = $product->user_id;
                            $product_name = $product->title;
                            $product_image = asset('media/product-image/' . $product->image);
                            $user_details = DB::table('users')->where('id', $user_id)->first();
                            ?>
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-sm-4 col-4">
                                    @if($product_image)
                                        <div class="product_img_sec">
                                            <img src="{{$product_image}}" width="100px" />
                                        </div>
                                    @else

                                        <div class="product_img_sec">
                                            <img src="{{url('/public/images/pdefault.png')}}" width="100px" />
                                        </div>

                                    @endif
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8">
                                    @if($product_name)
                                    <p class="text-left">{{$product_name}}</p>
                                    @endif
                                    @if($user_details->email)
                                    <p class="text-left"><strong>Email: </strong> <a href="mailto:{{$user_details->email}}">{{$user_details->email}}</a></p>
                                    @endif
                                </div>
                            </div>
                            
                            
                            
                            @if($user_details->phone_number)
                            <p><strong>Contact Us: </strong> {{$user_details->phone_number}}</p>
                            @endif
                            <?php
                        }

                    }
                ?>
                </div>
                <!-- <div class="col-md-10"> <a href="{{url('order')}}" class="btn btn-inline2 post-btn2"
                        ><span>Go to My Orders</span></a></div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
       $('#language').modal('show');
    });

    $(".close").click(function(){
          window.location.href = '/order';
    });

</script>
@endsection