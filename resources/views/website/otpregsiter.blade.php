@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<style>
   
small.otp_error {
    margin-top: -15px;
    display: block;
    color: red;
}

</style>
<section class="user-form-part p0">
    <div class="user-form-banner w60">
       <div class="user-form-content">
          <!-- <a href="#"><img src="images/logow.png" alt="logo"></a>
          <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
          <p>Biggest Online Advertising Marketplace in the World.</p> -->
          <p><span class="f22">You Buy & You Sell</span>  </p>
       </div>
    </div>
    <div class="user-form-category w40">
       <!-- <div class="user-form-header"><a href="#"><img src="images/logo.png" alt="logo"></a><a href="index.html"><i class="fas fa-arrow-left"></i></a></div> -->
     
       <div class="tab-pane active" id="login-tab">


      <div align="right">
         <a href="#!" class="nh">Need help?</a>
      </div>
           <!-------------->
    
           <div class="container">
             <div>
                <div class="user-form-title mb20" align="center">
                   <h2>Welcome</h2>
                   
                  
                </div>

                <div class="user-form-direction">
                   <p>Sign in Via Social Account</p>
                </div>

                <ul class="user-form-option">
                  
                   
                   <li><a href="{{url('auth/google')}}"><img src="{{url('public/website/images/ui.svg')}}"><span class="text_set">Google</span></a></li>
                   <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                    <li><a href="{{url('a/apple/login')}}" class="apple-de"><i class="fa fa-apple" ></i><span class="text_set">Apple</span></a></li>
                </ul>
                <div class="user-form-direction">
                <p class="mbm20">Or Enter your login details below.</p>
               
                </div>

                  


                 <form action="{{url('checkotp')}}" method="post">
                    @csrf
                   <div class="row">
                    
                      <div class="col-12">
                        <div class="form-group mb-0">
                           <p style="color:#F00; margin-top:10px; text-left: center;">@if(Session::has('message'))
                          <small> {!! Session::get('message') !!} </small>
                       @endif</p></div>
                     
                        </div>
                     <div class="col-12 login-mobile">
                        <input type="hidden" value="{{$userid}}" name="userid">
                        <div class="form-group"><input type="text" maxlength="6" class="form-control" name="otp" id="otp" placeholder="Enter OTP on your mobile/Email" required></div>
                        @if ($errors->has('otp'))
                               <span class="help-block" style="color: red;">
                                   {{ $errors->first('otp') }}
                               </span>
                               @endif
                       </div>
                       <div class="col-12 login-mobile">
                        <div class="form-group"><button type="submit" class="btn btn-inline"><span>Verify OTP Mobile/Email </span></button></div>
                     </div>
                      
                   </div>

                   <div class="user-form-direction">
               
                <p>Don't have an account yet? <a href="{{url('register')}}"><u>Register Now</u> </a></p> 
                </div>


                </form>
              
             </div>
          
          </div>
       </div>
  
    </div>
 </section>
 @section('js')

<script>

</script>
 
 <script>

   
     //  $('.emob').on('change', function() {
     //   var mobtext = $(this).val();
     //   if(mobtext.match('[0-9]{10}'))  {
     //     $('.login-email').hide();
     //                $('.login-mobile').show();
     //        } 
     //        else{

     //           $('.login-mobile').hide();
     //                $('.login-email').show();

     //        }
     // });
 </script>
 @endsection
@endsection
