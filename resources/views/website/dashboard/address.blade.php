@extends('website.layout.app')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

@endsection
@section('content')
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <div class="account-card alert fade show bs">
                        <div class="account-title wishlist1">
                            <h6>Address</h6>
                        </div>
                        <div class="row ad-standard">
                            @if($addres)
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p class="ffs14">DEFAULT ADDRESS</p>
                                <div class="product-card standard image-heg bshadow mt20 mb20">
                                    <div class="product-content">
                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><input type="radio" checked=""> <a href="#"
                                                        class="ffs16 ml10">{{ucwords(Auth::user()->username)}}</a></h5>
                                                <li class="breadcrumb-item hme" aria-current="page">{{ucwords($addres->type)}}</li>
                                            </ol>
                                        </div>
                                        <div class="fs16l"><span>@if(isset($addres->address_one)) {{$addres->address_one}} @else {{$addres->address_two}} @endif<br>
                                                </span></div>
                                        <div class="product-meta qty">

                                            <a class="rbtn delete" data-content="address" data-id="{{$addres->id}}" href="#!"> <i class="fa fa-trash tred " data-id="{{$addres->id}}"></i> Delete
                                            </a>
                                            <a class="gbtn" href="{{url('edit/address/'.$addres->id)}}"> <i class="fa fa-pencil tgry"></i> Edit </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p class="ffs14">OTHER ADDRESS</p>
                                <div class="product-card standard image-heg bshadow mt20 mb20">
                                    @if($address)
                                        @foreach ($address as $addresDetail)
                                            
                                    <div class="product-content">
                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><input type="radio" > <a href="#"
                                                        class="ffs16 ml10"> {{ucwords(Auth::user()->username)}}</a></h5>
                                                <li class="breadcrumb-item hme" aria-current="page">{{ucwords($addresDetail->type)}}</li>
                                            </ol>
                                        </div>
                                        <div class="fs16l"><span>@if(isset($addres->address_one)) {{$addres->address_one}} @else {{$addres->address_two}} @endif <br>
                                                </span></div>
                                        <div class="product-meta qty">
                                            <a class="rbtn delete" data-content="address" data-id="{{$addres->id}}" href="#!"> <i class="fa fa-trash tred"></i> Delete
                                            </a>
                                            <a class="gbtn" href="{{url('edit/address/'.$addresDetail->id)}}"> <i class="fa fa-pencil tgry"></i> Edit </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p> <a href="{{url('create/address')}}" class="ada"><i class="fa fa-plus mr10"></i> Add New Address</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endsection
    @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<script src="{{url('public/website/js/classified/delete.js')}}"></script>

    @endsection
