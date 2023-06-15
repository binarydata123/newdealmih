@extends('website.layout.app')
@section('css')
@endsection
@section('content')

    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <!-- <div class="user-form-header"><a href="#"><img src="images/logo.png" alt="logo"></a><a href="index.html"><i class="fas fa-arrow-left"></i></a></div> -->

                    <div class="tab-pane active frgt" id="login-tab">
                        <div class="container p40">
                            <div>
                                <div class="user-form-title mb30">
                                    <h4 class="fs20"><img
                                            src="{{ url('public/website/images/arrow_back_black.svg') }}"> Add New Address</h4>

                                    <!-- <p class="mbm20 fs14o dcolor h23">Please enter your registered email I’d. We will send you the 6 digit OTP to reset your password.</p> -->
                                </div>
                                <form data-content="address" class="formSubmit">
                                    <input type="text" name="user_id" class="user_id" hidden
                                        value="{{ Auth::user()->id }}">
                                        <div class="row mt20">
                                            <div class="col-lg-12">
                                                <p class="fhead mb20 mt40">Address Information</p>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control district" name="district_id" >
                                                        <option value="">District</option>
                                                         @if($districts)
                                                            @foreach ($districts as $district)
                                                          
                                                                <option value="{{$district->district_id}}">{{ucwords($district->district_name)}}</option>
                                                            @endforeach
                                                         @endif
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control municipality" name="municipaliti_id">
                                                        <option value="">Muncipality/Nagarpalika</option>
                                                      
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">

                                                <div class="form-group">

                                                    <select class="form-control village" name="village_id">
                                                        <option value="">Village</option>
                                                        
                                                    </select>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <textarea class="form-control" name="address_one"
                                                        placeholder="Address line 1"></textarea>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <textarea class="form-control" name="address_two"
                                                        placeholder="Address line 2"></textarea>
                                                <span class="error" style="color: red;"></span>

                                                </div>
                                            </div>

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
                        <!------------>
                    </div>

                </div>
            </div>
        </div>
    </section>
@section('js')
<script>
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
@endsection
@endsection
