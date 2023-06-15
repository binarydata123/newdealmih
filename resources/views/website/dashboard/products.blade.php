@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<style type="text/css">
    
.product-card.standard {
    display: flex;
    margin-top: 20px;
    align-items: normal;
}
.oderdata {
    display: inline;
}
a.view_detail {
    /*position: absolute;
    right: 20px;
    margin-top: 50px;*/
    padding: 7px 48px;
}
.product-card.standard .product-media {
    margin: 0px;
}
.form-check-inline{
    display: block;
}
.s-return{
    background-color: #ff0000;
    color: #fff;
    padding: 3px 10px 3px 10px;
    border-radius: 5px;
    margin-left: 10px;
}
</style>
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <div class="account-card alert fade show bs">
                        <div class="account-title manageads1">
                            <h6>My Orders</h6>

                            {{-- <div class="form-group mb0">

                                <select class="form-control hauto">
                                    <option selected="">Select filter</option>
                                    <option value="1">property</option>
                                    <option value="2">electronics</option>
                                    <option value="3">automobiles</option>
                                </select>
                            </div> --}}

                        </div>


                        <div class="row">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" style="padding: 10px 0;margin-top: 50px;width: 100%;">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if ($products->count() > 0)
                                @foreach ($products as $order)
                                    @if ($order->orderProduct)
                                        @foreach ($order->orderProduct as $orderProduct)
                                            @if ($orderProduct->products)
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="product-info wrapinfo">
                                                        <p class="product-title">
                                                            {{ $orderProduct->created_at->format('M/d/Y') }}
                                                        </p>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <p class="product-title">Order ID:
                                                           {{$orderProduct->id}}{{ $orderProduct->created_at->format('mdY') }}{{ $orderProduct->products->id }}
                                                        </p>

                                                    </div>
                                                    <div class="row product-card standard image-heg">
                                                        <div class="col-sm-3 product-media">
                                                            <a
                                                                href="{{ url('product/detail/' . $orderProduct->products->slug) }}">
                                                                <div class="product-img">
                                                                    @if ($orderProduct->products->image)
                                                                        <img src="{{ url('public/media/product-image/' . $orderProduct->products->image) }}"
                                                                            alt="product">
                                                                    @else<img
                                                                            src="{{ url('public/website/images/no-image.png') }}"
                                                                            alt="product">
                                                                    @endif
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-9 product-content">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="product-info text-cont">
                                                                        <ol class="breadcrumb product-category">
                                                                            <h5 class="product-title"><a
                                                                                    href="{{ url('product/detail/' . $orderProduct->products->slug) }}">
                                                                                    {{ ucwords($orderProduct->products->title) }}</a>
                                                                            </h5>
                                                                            
                                                                            @if ($orderProduct->products->type == 1)
                                                                                <span class="s-used">Used</span>
                                                                            @else
                                                                                <span class="s-success">Brand New</span>
                                                                            @endif
                                                                            @php
                                                                                $order_returns = DB::table('order_returns')->where('product_id', $orderProduct->product_id)->first();
                                                                            @endphp
                                                                            @if($order_returns)
                                                                                <span class="s-return">Return Request #{{$order_returns->id}}</span>
                                                                            @endif
                                                                        </ol>
                                                                    </div>
                                                                    <div class="product-meta"><span><i
                                                                                class="fas fa-map-marker-alt"></i>
                                                                            @if ($orderProduct->products)
                                                                                @if ($orderProduct->products->districtList)
                                                                                    {{ $orderProduct->products->districtList->district_name }}
                                                                                @endif
                                                                            @endif
                                                                        </span>&nbsp;<span class="tcolor1">Delivery Status:
                                                                            <span class="bluebtn">Pickup</span></span>
                                                                    </div>
                                                                    <div class="product-meta"><span class="fs14o tcolor1 fw500">Qty :
                                                                            {{ $orderProduct->quantity }}
                                                                            {{-- Paid Via :b
                                                                            <span class="bluebtn">Card</span> --}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 text-right">
                                                                    <h5 class="product-price">रू
                                                                            {{ number_format($orderProduct->purchase_price) }}</h5>
                                                                    <a href="{{url('store-profile/'.$orderProduct->products->user_id.'/'.$orderProduct->id)}}" class="float-right btn btn-secondary">Place Feedback </a>
                                                                    <a class="view_detail btn btn-primary" href="{{url('product/detail/'.$orderProduct->products->slug)}}">View
                                                                    Details</a>
                                                                    @if($order_returns)
                                                                        <a class="view_detail btn btn-primary" href="#" data-toggle="modal" data-target="#returnrequestDetailsModalCenter_{{$orderProduct->product_id}}">Return Request</a>
                                                                    @else
                                                                        <a class="view_detail btn btn-primary" href="#" data-toggle="modal" data-target="#returnProductModalCenter_{{$orderProduct->product_id}}">Return</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div id="orderbtn" class="text-cont">
                                                                @if($order->order_status=='1')
                                                                    <button class="btn post-btn btn-light">Order Pending</button>
                                                                    @if($order->role_id=='1')
                                                                    <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="hd_order_status" id="hd_order_status" value="2">
                                                                        <button type="submit" class="btn post-btn btn-light">Order Approve</button>
                                                                    </form>
                                                                    <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="hd_order_status" id="hd_order_status" value="3">
                                                                        <button type="submit" class="btn post-btn btn-light">Order Decline</button>

                                                                    </form>
                                                                    @endif
                                                                    <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="hd_order_status" id="hd_order_status" value="4">
                                                                        <button type="submit" class="btn post-btn btn-light">Cancel Order</button>
                                                                    </form>
                                                              
                                                                @elseif($order->order_status=='2')

                                                                    <button class="btn post-btn btn-light">Order Approved</button>
                                                                    
                                                                    <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="hd_order_status" id="hd_order_status" value="4">
                                                                        <button type="submit" class="btn post-btn btn-light">Cancel Order</button>
                                                                    </form>
                                                                @elseif($order->order_status=='3')
                                                                    <button class="btn post-btn btn-light">Order Declined</button>
                                                                    <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id]) }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="hd_order_status" id="hd_order_status" value="4">
                                                                        <button type="submit" class="btn post-btn btn-light">Cancel Order</button>
                                                                    </form>
                                                                   
                                                                @elseif($order->order_status=='4')
                                                                    <button class="btn post-btn btn-light">Order Cancelled</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="returnProductModalCenter_{{$orderProduct->product_id}}" tabindex="-1" role="dialog" aria-labelledby="returnProductModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="returnProductModalLongTitle">Return Order</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="return_form" action="{{url('/return-order')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="hd_order_id" id="hd_order_id" value="{{$order->id}}">
                                                                    <input type="hidden" name="hd_user_id" id="hd_user_id" value="{{Auth::user()->id}}">
                                                                    <input type="hidden" name="hd_product_id" id="hd_product_id" value="{{$orderProduct->product_id}}">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="return_first_name">First Name*</label>
                                                                            <input type="text" name="return_first_name" class="form-control" id="return_first_name" placeholder="First Name" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="return_last_name">Last Name*</label>
                                                                            <input type="text" name="return_last_name" class="form-control" id="return_last_name" placeholder="Last Name" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_email">Email*</label>
                                                                        <input type="email" name="return_email" class="form-control" id="return_email" placeholder="Email" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_phone">Phone Number*</label>
                                                                        <input type="text" name="return_phone" class="form-control" id="return_phone" placeholder="Phone Number" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_street_address_one">Return Street Address*</label>
                                                                        <input type="text" name="return_street_address_one" class="form-control" id="return_street_address_one" placeholder="1234 Main St" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_street_address_two">Return Street Address 2</label>
                                                                        <input type="text" name="return_street_address_two" class="form-control" id="return_street_address_two" placeholder="Apartment, studio, or floor">
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="return_city">Return City*</label>
                                                                            <input type="text" name="return_city" class="form-control" id="return_city" placeholder="City" required>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="return_state">Return State/Province*</label>
                                                                            <input type="text" name="return_state" class="form-control" id="return_state" placeholder="State/Province" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_zip">Return PostCode/Zipcode*</label>
                                                                        <input type="text" name="return_zip" class="form-control" id="return_zip" placeholder="PostCode/Zipcode" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_order_number">Order Number*</label>
                                                                        <input type="text" name="return_order_number" class="form-control" id="return_order_number" placeholder="Order Number" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_request_type">Request Type*</label>
                                                                        <select id="return_request_type" name="return_request_type" class="form-control" required>
                                                                            <option selected>Choose Request Type</option>
                                                                            <option value="return">Return</option>
                                                                            <option value="exchange">Exchange</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_reason">Reason For Return/Exchnage*</label>
                                                                        <select id="return_reason" name="return_reason" class="form-control" required>
                                                                            <option selected>Please Select</option>
                                                                            <option value="not_described">Not as described</option>
                                                                            <option value="defective_not_working">Defective / Not Working</option>
                                                                            <option value="physical_damage">Physical Damage</option>
                                                                            <option value="ordered_wrong_item">Ordered wrong Item</option>
                                                                            <option value="other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="return_description">Please Described*</label>
                                                                        <textarea class="form-control" name="return_description" id="return_description" rows="3" required></textarea>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                            <!-- <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade bd-example-modal-lg" id="returnrequestDetailsModalCenter_{{$orderProduct->product_id}}" tabindex="-1" role="dialog" aria-labelledby="returnrequestDetailsModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="returnrequestDetailsModalLongTitle">Return Request Id #@if($order_returns){{$order_returns->id}}@endif</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul>
                                                                    @if($order_returns)
                                                                        <li style="padding-bottom: 15px;"><strong>Return Request Type: </strong>{{ucfirst($order_returns->return_request_type)}}</li>
                                                                        @if($order_returns->return_reason == 'not_described')
                                                                            @php
                                                                            $return_reason = 'Not as described';
                                                                            @endphp
                                                                        @elseif ($order_returns->return_reason == 'defective_not_working')
                                                                            @php
                                                                            $return_reason = 'Defective / Not Working';
                                                                            @endphp
                                                                        @elseif ($order_returns->return_reason == 'physical_damage')
                                                                            @php
                                                                            $return_reason = 'Physical Damage';
                                                                            @endphp
                                                                        @elseif ($order_returns->return_reason == 'ordered_wrong_item')
                                                                            @php
                                                                            $return_reason = 'Ordered wrong Item';
                                                                            @endphp
                                                                        @else
                                                                            @php
                                                                            $return_reason = $order_returns->return_reason;
                                                                            @endphp
                                                                        @endif
                                                                        <li style="padding-bottom: 15px;"><strong>Return Reason: </strong>{{$return_reason}}</li>
                                                                        <li><strong>Return Description: </strong>{{$order_returns->return_description}}</li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endif
                                @endforeach
                            @else
                                @include('website.no-data')
                            @endif
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </section>
@endsection
