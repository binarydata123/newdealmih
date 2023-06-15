@extends('website.layout.app')
@section('css')


@endsection
@section('content')
    <section class="dashboard-part pt10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="account-title plr20 mb60 b0 mb60">
                        <li class="active current"><img src="{{ url('public/website/images/dea/tick.png') }}"> ADDRESS</li>
                        <li>
                            <hr class="wizard">
                        </li>
                        <li>ORDER SUMMARY</li>
                        <li>
                            <hr class="wizardg">
                        </li>
                        <li>PAYMENT</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="account-card alert fade show bs">
                     @if(!empty($address))
                        <div class="account-title wishlist1">
                          <h6 class="f16ad">SELECT DELIVERY ADDRESS</h6> 
                           <!--  <div>
                                <a class="addnew" href="#!"> ADD NEW ADDRESS </a>
                            </div> -->
                        </div>
                        @endif
                        <div class="row">
                            
                                
                           @if(!empty($address))
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <p class="ffs14">CURRENT ADDRESS</p>
                                <div class="product-card standard image-heg bshadow mt20 mb20">

                                    <div class="product-content">

                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><input type="radio" checked name="address"> <a href="#"
                                                        class="ffs16 ml10"> {{ucwords(Auth::user()->username)}}</a></h5>
                                                <li class="breadcrumb-item hme" aria-current="page">{{ucwords($addres->type)}}</li>
                                            </ol>
                                            <div class="product-meta qty" id="product-meta1">
                                            <a class="rbtn delete" data-content="address" data-id="{{$addres->id}}" href="#!"> <i class="fa fa-trash tred " data-id="{{$addres->id}}"></i> Delete
                                            <a class="gbtn" href="{{url('edit/address/'.$addres->id)}}"> <i class="fa fa-pencil tgry"></i> Edit </a>
                                        </div>
                                        </div>
                                        <div class="fs16l"><span> @if (Auth::user()->businessDetails) {{Auth::user()->businessDetails->address_one}},
                               @if(Auth::user()->businessDetails->district) {{Auth::user()->businessDetails->district->district_name}} , 
                               @endif
                               @if(Auth::user()->businessDetails->village)
                               {{ Auth::user()->businessDetails->village->name}} ,
                                @endif 
                                
                                @if(Auth::user()->businessDetails->muncipality)
                               {{ Auth::user()->businessDetails->muncipality->municipality_name}}
                                @endif 
                                @else - @endif
                               
                            </span></div>
                                        
                                    </div>
                                </div>
                            </div>

                           
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <p class="ffs14">OTHER ADDRESS</p>
                                  

                                @if($address)
                                @foreach ($address as $orderAddress)

                                
                                <div class="product-card standard image-heg bshadow mt20 mb20">
                                  
                                    <div class="product-content">
                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><input type="radio" name="address"> <a href="#"
                                                        class="ffs16 ml10"> {{ucwords(Auth::user()->username)}}</a></h5>
                                                <li class="breadcrumb-item hme" aria-current="page">{{ucwords($orderAddress->type)}}</li>
                                            </ol>
                                            <div class="product-meta qty" id="product-meta1">
                                                    <a class="rbtn delete" data-content="address" data-id="{{$orderAddress->id}}" href="#!"> <i class="fa fa-trash tred " data-id="{{$orderAddress->id}}"></i> Delete
                                                    <a class="gbtn" href="{{url('edit/address/'.$orderAddress->id)}}"> <i class="fa fa-pencil tgry"></i> Edit </a>
                                                </div>
                                        </div>
                                        <div class="fs16l" ><span>@if(isset($orderAddress->address_one)) {{$orderAddress->address_one}}, @else {{$orderAddress->address_two}}, @endif
                                           {{$orderAddress->district->district_name}},
                                         {{ $orderAddress->muncipality->municipality_name}}  ,
                                        {{ $orderAddress->village->name}}  
                                            
                                           
                                            </span></div>     
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                           
                            @endif

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb20">
                                <p> <a href="#!" class="ada new-addres"><i class="fa fa-plus mr10 "></i> Add New Address</a>
                                </p>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 new-addres-show" style="display: none;">
                                <div class="product-card standard image-heg bshadow mt20 mb20 newad">
                                    <div class="product-content">
                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><input type="radio" checked><a href="#!"
                                                        class="fs16 tblu ml15"> Add New Address</a></h5>
                                            </ol>
                                             <a href="" onclick="initializeInputs();">  CLEAR ALL </a>
                                        </div>

                                        <form data-content="create/address" class="formSubmit" data-address="order-address" id="myForm1">
                                          
                                          <input type="text" name="user_id" class="user_id" hidden
                                          value="{{ Auth::user()->id }}">
                                       <!--  <a href="#!" class="btn btn-inline ml10 mt10"><span><img
                                                    src="{{ url('public/website/images/dea/location.svg') }}"> Use my current
                                                location </span></a> -->
                                        <div class="row mt20">
                                            <div class="col-lg-12">
                                                <p class="fhead mb20 mt40">Address Information</p>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control district" name="district_id" id="district_id">
                                                        <option value="">District</option>
                                                         @if($districts)
                                                            @foreach ($districts as $district)
                                                          
                                                                 <option
                                                                    @if ($user->businessDetails) @if ($user->businessDetails->district_id == $district->district_id) selected @endif
                                                                    @endif value="{{ $district->district_id }}">
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach
                                                         @endif
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control municipality" name="municipaliti_id" id="municipaliti_id">
                                                        <option value="">Muncipality/Nagarpalika</option>
                                                        @if ($user->businessDetails)
                                                            @php
                                                                $muncipalities = App\Models\Municipality::where('district_id', $user->businessDetails->district_id)->get();
                                                            @endphp
                                                            @if ($muncipalities)
                                                                @foreach ($muncipalities as $muncipality)
                                                                    <option
                                                                        @if ($muncipality->municipality_id == $user->businessDetails->mucipality_id) selected @endif
                                                                        value="{{ $muncipality->municipality_id }}">
                                                                        {{ $muncipality->municipality_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                      
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">

                                                <div class="form-group">

                                                    <select class="form-control village" name="village_id" id="village_id">
                                                        <option value="">Village</option>
                                                        @if ($user->businessDetails)
                                                            @php
                                                                $vallages = App\Models\Village::where('district_id', $user->businessDetails->district_id)->get();
                                                            @endphp
                                                            @if ($vallages)
                                                                @foreach ($vallages as $vallage)
                                                                    <option
                                                                        @if ($vallage->id == $user->businessDetails->village_id) selected @endif
                                                                        value="{{ $vallage->id }}">{{ $vallage->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <textarea class="form-control" name="address_one"
                                                        placeholder="Ward No." id="address_one">@if ($user->businessDetails) {{ $user->businessDetails->address_one }} @endif</textarea>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <!-- <div class="col-lg-6">
                                                <div class="form-group">

                                                    <textarea class="form-control" name="address_two"
                                                        placeholder="Ward No 2"></textarea>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>
 -->
                                            <div class="col-lg-12">

                                                <p class="fhead2 mb10 mt20">Address Label (Optional)</p>

                                            </div>

                                            <div class="product-info text-cont ml20">
                                                <ol class="breadcrumb product-category">
                                                    <h5 class="product-title"><input type="radio" name="type" value="home" checked> <a href="#" 
                                                            class="ffs16"> Home</a></h5>

                                                    <h5 class="product-title ml15"><input type="radio" name="type" value="office"> <a href="#"
                                                            class="ffs16"> Office</a></h5>
                                                </ol>
                                            </div>
                                            <div class="col-md-12">
                                              <span>
                                                   <input type="submit" class="btn btn-inline ml10 mt10 fbs"
                                                   value="SAVE AND DELIVER HERE"> 
                                                         </span>
                                                       
                                                <a href="#!" class="btn btn-inline ffv ml10 mt10 "><span> CANCEL </span></a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

                @php
                    $price = 0;
                    @endphp
                     @if($carts->count() > 0)
                     @foreach ($carts as $key => $cart)
                       @php
                           $price+=$cart->price * $cart->cart_quantity;
                       @endphp
                       @endforeach
                @endif

               
                <div class="col-lg-4">
                    <div class="account-card alert fade show padf bs">
                        <ul class="br0">
                            <li class="notify-item">
                                <a href="#" class="notify-link">
                                    <p class="nfs162 mt10"> PRICE DETAILS </p>

                                </a>
                            </li>
                            <li class="notify-item">
                                <a href="#" class="notify-link">
                                    <p class="nfs163"> Price  <span class="fright2 nfs163"> रू {{number_format($price)}}</span>
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
                                <a href="" class="notify-link">
                                    <p class="nfs164 mb20"> Total Amount <span class="fright2 nfs164"> रू  {{number_format($price)}}</span>
                                    </p>

                                </a>
                            </li>
                            <li class="notify-item">
                                <div align="center">

                                    @if(isset($carttype))

                                     <a href="{{ url('order-summary/delivery/'.$product->slug) }}" class="btn btn-inline4 post-btn"><span
                                            class="twhite">Checkout</span></a>

                                    @else

                                     <a @if(isset($product->slug))
                                    href="{{ url('order-summary?product='.$product->slug) }}" @else href="{{ url('order-summary')}}" @endif class="btn btn-inline4 post-btn"><span
                                            class="twhite">Checkout</span></a>

                                    @endif

                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="{{url('public/website/js/classified/delete.js')}}"></script>

<script>
   $('.new-addres').on('click', function()
   {
      $('.new-addres-show').show();
   })

   $(document).on('change', '.district', function (e) {
      var id = $(this).val();
      var sel = $('.municipality');
      var village = $('.village');
      var url = base_url + 'municipality';
      $.post(url, { id: id }, function (data) {
        var dataList = data.data;
        var villageList = data.village;
        console.log(villageList);
        sel.html('<option value="">Muncipality/Nagarpalika</option>');
        village.html('<option value="">Village</option>');
        $.each(dataList, function (key, value) {
          sel.append('<option value=' + value.municipality_id + '>' + value.municipality_name + '</option>');
        });

        $.each(villageList, function (villageKey, villagevalue) {
          village.append('<option value=' + villagevalue.id + '>' + villagevalue.name + '</option>');
        });
      });
    });
</script>

<script>

function initializeInputs() {
    document.getElementById("district_id").value = '';
    document.getElementById("municipaliti_id").value= '';
    document.getElementById("village_id").value = '';
    document.getElementById("address_one").value= '';
}

function buttonResetHandler(e) {
    initializeInputs();
}

</script>

@endsection
