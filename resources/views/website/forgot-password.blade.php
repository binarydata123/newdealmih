@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <section class="user-form-part">
        <div class="user-form-banner w602">
            <div class="user-form-content">
                <!-- <a href="#"><img src="images/logow.png" alt="logo"></a>
              <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
              <p>Biggest Online Advertising Marketplace in the World.</p> -->
            </div>
        </div>
        <div class="user-form-category w40">
            <!-- <div class="user-form-header"><a href="#"><img src="images/logo.png" alt="logo"></a><a href="index.html"><i class="fas fa-arrow-left"></i></a></div> -->

            <div class="tab-pane active frgt" id="login-tab">
                <div align="right">
                    <a href="#!" data-toggle="modal" data-target="#help" class="nh">Need help?</a>
                </div>
                
               
                <!-------------->
                <div class="container p40">
                     @if (session()->has('success'))
                    <div class="alert alert-success text-center" style="padding: 10px 0;">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if (session()->has('error'))

                    <div class="alert alert-danger text-center" style="padding: 10px 0;">
                        {{ session()->get('error') }}
                    </div>
                @endif
                    <div>
                        <div class="user-form-title">
                            <h4 class="fs20"><a style="color:inherit;" href="{{url('/forgot-password')}}"><img src="{{ url('public/website/images/arrow_back_black.svg') }}"> Forgot
                                Password?</a></h4>

                            {{-- <p class="mbm20 fs14o dcolor h23">Please enter your registered email I’d. We will send you the 6
                                digit OTP to reset your password.</p> --}}
                        </div>
                        <form action="{{ url('forgot-password') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group"><input type="text" class="form-control" name="email"
                                            placeholder="Email Address" required>
                                            {{-- <small class="form-alert">Please follow this
                                            example - 01XXXXXXXXX</small> --}}
                                        </div>
                                            @if (isset($errors->all()[0]))
                                    <div style="color: red;" class="error">{{ $errors->all()[0] }}</div>
                                @endif
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group"><button type="submit" class="btn btn-inline fs18"><span>Send
                                                </span></button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
