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
.product-media .product-img img{
    width: 100% !important;
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
                            <h6>Store Orders</h6>
                        </div>


                        <div class="row">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" style="padding: 10px 0;margin-top: 50px;width: 100%;">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if (count($orders) > 0)
                                @foreach ($orders as $order)
                                    @if($orders_products)
                                        @foreach ($orders_products as $key => $value)
                                            @foreach ($orders_products[$key] as $orderProduct)
                                                @php
                                                    $all_orders_products = DB::table('order_products')->where('product_id', $orderProduct->product_id)->first();
                                                @endphp
                                                @if ($orderProduct->products)
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="product-info wrapinfo">
                                                            <p class="product-title">
                                                                {{ Carbon\Carbon::parse($all_orders_products->created_at)->format('M/d/Y') }}
                                                            </p>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                            <p class="product-title">Order ID:
                                                               {{$all_orders_products->id}}{{ Carbon\Carbon::parse($all_orders_products->created_at)->format('mdY') }}{{ $orderProduct->products->id }}
                                                            </p>

                                                        </div>
                                                        <div class="row product-card standard image-heg">
                                                            <div class="col-sm-3 product-media">
                                                                <a href="{{ url('product/detail/' . $orderProduct->products->slug) }}">
                                                                    <div class="product-img">
                                                                        @if ($orderProduct->products->image)
                                                                            <img src="{{ url('public/media/product-image/' . $orderProduct->products->image) }}"
                                                                                alt="product">
                                                                        @else
                                                                            <img src="{{ url('public/website/images/no-image.png') }}"
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
                                                                                    $order_returns = DB::table('order_returns')->where('product_id', $all_orders_products->product_id)->first();
                                                                                @endphp
                                                                                @if($order_returns)
                                                                                    <span class="s-return">Return Request #{{$order_returns->id}}</span>
                                                                                @endif
                                                                            </ol>
                                                                        </div>
                                                                        <div class="product-meta">
                                                                            <span><i class="fas fa-map-marker-alt"></i>
                                                                                @if ($orderProduct->products)
                                                                                    @if ($orderProduct->products->districtList)
                                                                                        {{ $orderProduct->products->districtList->district_name }}
                                                                                    @endif
                                                                                @endif
                                                                            </span>&nbsp;<span class="tcolor1">Delivery Status:
                                                                            <span class="bluebtn">Pickup</span></span>
                                                                        </div>
                                                                        <div class="product-meta" id="meta"><span class="fs14o tcolor1 fw500">Qty :
                                                                            {{ $all_orders_products->quantity }}
                                                                            {{-- Paid Via :
                                                                            <span class="bluebtn">Card</span> --}}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 text-right">
                                                                        <h5 class="product-price">रू{{ number_format($all_orders_products->purchase_price) }}</h5>
                                                                        <a href="{{url('store-profile/'.$orderProduct->products->user_id.'/'.$all_orders_products->id)}}" class="float-right btn btn-secondary">Place Feedback </a>
                                                                        <a class="view_detail btn btn-primary" href="{{url('product/detail/'.$orderProduct->products->slug)}}">View Details</a>
                                                                        @php
                                                                            $order_returns = DB::table('order_returns')->where('product_id', $all_orders_products->product_id)->first();
                                                                        @endphp
                                                                        @if($order_returns)
                                                                            <a class="view_detail btn btn-primary" href="#" data-toggle="modal" data-target="#returnrequestDetailsModalCenter_{{$all_orders_products->product_id}}">Return Request</a>
                                                                        @endif
                                                                    </div>
                                                                </div>    
                                                                <div id="orderbtn" class="text-cont">
                                                                    @if($order->order_status=='1')
                                                                        <button class="btn post-btn btn-light">Order Pending</button>

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
                                                                        <form class="oderdata" method="POST" action="{{ url('cancel-order', [$order->id],[$orderProduct]) }}">
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
                                                    <div class="modal fade bd-example-modal-lg" id="returnrequestDetailsModalCenter_{{$all_orders_products->product_id}}" tabindex="-1" role="dialog" aria-labelledby="returnrequestDetailsModalCenterTitle" aria-hidden="true">
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
