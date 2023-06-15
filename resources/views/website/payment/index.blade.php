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
                        <li class="active"><img src="{{ url('public/website/images/dea/tick.png') }}"> ORDER SUMMARY
                        </li>
                        <li>
                            <hr class="wizard">
                        </li>
                        <li class="active current"><img src="{{ url('public/website/images/dea/tick.png') }}"> CHECKOUT</li>
                    </ul>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-8 imgrounded">
                    <div class="account-card alert fade show bs"> -->


                    <!---tab---->

                            <!------------------------------------------------------------->

      <!--<div class="account-card bs p0">
       <div class="row">
         <div class="col-lg-12">
            <div class="niche-nav">
               <ul class="nav nav-tabs">
                  <li><a href="#ratings" class="nav-link active" data-toggle="tab"> Payment </a></li>
                  <li><a href="#advertiser" class="nav-link" data-toggle="tab"> Bank Details</a></li>
                  <li><a href="#engaged" class="nav-link" data-toggle="tab"> Payment History</a></li>
               </ul>
            </div>
         </div>
      </div> -->

      <!--tab1-->
      <!-- <div class="tab-pane active" id="ratings">
      <div class="row ad-standard wishlist1 mt20 mb20">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row ad-standard">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                             
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 br11">

                                    <div class="product-card standard image-heg mt20 mb20">

                                        <div class="product-content">
                                            <div class="row mt20">

                                                {{-- <div class="col-lg-12">

                                                    <p class="ffs162 mb20"> Add Card</p>
                                                </div> --}}

                                                <div align="center">
                                                    <img src="{{url('public/website/images/dealmih.jpg')}}" style="width: 60%">
                                                </div>

                                                {{-- <div class="col-lg-6">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="Card Number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">

                                                        <input type="date" class="form-control" placeholder="Card Number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control" placeholder="CVV">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">

                                                        <input type="text" class="form-control"
                                                            placeholder="Name on Card">
                                                    </div>
                                                </div>

                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <ul class="form-check-list">

                                                            <li class="mb10"><input type="checkbox">&nbsp; <label
                                                                    for="fix-check" class="form-check-text fs14o"> Save Card
                                                                    For Later</label></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <a href="#!" class="btn btn-inline ml10 fbs"><span>Add Card</span></a>

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                          
                           
                        </div>
      </div> -->

      <!--tab1-->


<!--tab2-->
      <!-- <div class="tab-pane" id="advertiser">
        <div class="row">

          <div class="col-md-12">

          <div class="bnkd bs">

          <p><span class="tblu">Bank Name:</span> </p>
          <p>Nepal Credit and Commerce bank Ltd(NCC)</p>

          <p><span class="tblu">Account Number:</span></p>
          <p><b> 0760 0001 01201 </b></p>

                </div>


                <div class="bnkd bs">

<p><span class="tblu">Bank Name:</span> </p>
<p>NABIL BANK LTD</p>

<p><span class="tblu">Account Number:</span></p>
<p><b> 0630 1017 5003 78 </b></p>

      </div>

          <!-- @include('website.no-data') -->
          <!-- </div>


         </div>
      </div> -->

      <!--tab2-->


     
    
  
                            <!-- </div> -->

                    <!--tab---->

                      
                    <!-- </div>
                </div> -->
               
                @php
                    $price = 0;
                @endphp
                
              
                
                <div class="col-lg-4">
                    <form action="{{url('order-create')}}" method="post">
                        @csrf
                        @if ($carts->count() > 0)
                        @foreach ($carts as $key => $cart)
                        <input type="text"  name="cart[]" hidden value="{{$cart->id}}" id="">
                            @php
                                $price += $cart->product->price * $cart->quantity;
                            @endphp
                        @endforeach
                    @endif
                    @php
                    $grandTotal = $price;
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
                                    <p class="nfs163"> Price <span class="fright2 nfs163grandTotal"> रू
                                            {{ number_format($price) }}</span>
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
                                    <p class="nfs164 mb20"> Total Amount <span class="fright2 nfs164 grandTotal"> रू
                                            {{ number_format($grandTotal) }}</span></p>

                                </a>
                            </li>

                            <li class="notify-item">
                                <div align="center">
                                    <button class="btn btn-inline4 post-btn"><span
                                            class="twhite">Checkout</span></button>
                                </div>

                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
           
            </div>
        </div>
    </section>

    <div class="modal fade" id="language">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header noh">
                    <h4></h4>
                    <button class="fas fa-times" data-dismiss="modal"></button>
                </div>
                <div class="modal-body" align="center">
                    <h4 class="mfs24">Payment Successful</h4>
                    <p class="sgreen">Your Order has been placed Successfully</p>
                    <img src="{{ url('public/website/images/dea/bid_succes.png') }}" class="iresponsive mt10">
                    <div class="col-md-10"> <a href="login.html" class="btn btn-inline2 post-btn2" data-toggle="modal"
                            data-target="#number"><span>Go to My Orders</span></a></div>
                </div>
            </div>
        </div>
    </div>

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
                                <p class="fs18l3"> Pickup from store</p>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12"><a href="#!"
                            class="btn btn-inline post-btn2 fs18w w100 mb20"><span>Submit</span></a></div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
@endsection
