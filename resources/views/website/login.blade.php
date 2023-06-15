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
li.apple-fa a {
    background: none !important;
}
.user-form-option li:nth-child(3) a i {
    background: #000000;
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
         <a href="{{url('https://dealmih.com/help')}}"  class="nh">Need help?</a>
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
                   <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i><span class="text_set">Facebook</span></a></li>
                   <li><a href="{{url('a/apple/login')}}" class="apple-de"><i class="fa fa-apple" ></i><span class="text_set">Apple</span></a></li>
                   <!-- <li class="apple-fa"><a href="{{url('auth/appleid')}}"><i class="fa fa-apple" aria-hidden="true"></i><span>Sign in With IOS Device</span></a></li> -->
                </ul>
                <div class="user-form-direction">
                <p class="mbm20">Or Enter your login details below.</p>
               
                </div>

                  


                 <form action="{{url('login')}}" method="post">
                    @csrf
                   <div class="row">
                    
                      <div class="col-12">
                        <div class="form-group ">
                           <p style="color:#F00; margin-top:10px; text-align: center;">@if(Session::has('message'))
                          <small> {!! Session::get('message') !!} </small>
                       @endif</p></div>
                       <small style="display:none;" id="classerror" class="text-danger">Please Enter mobile Number</small>
                         <input type="hidden" name="device_token" id="device_token">
                         <div class="form-group"><input type="text" class="form-control emob" name="email" placeholder="Email Or Mobile Number" id="emob" required><small><a href="javascript:void(0)" class="float-right mt-2 mb-2" id="otpcheck">Click here to login through OTP?</a></small></div>
                         <small class="otp_error" style="display:none;">Email & phone number does not match with our Record </small>
                         @if ($errors->has('email'))
                         <span class="help-block" style="color: red;">
                             {{ $errors->first('email') }}
                         </span>
                         @endif
                        </div>

                      <div class="col-12 login-email">
                         <div class="form-group"><input type="password" class="form-control" name="password" id="pass" placeholder="Password" required><button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6 characters</small></div>
                         
                         @if ($errors->has('password'))
                                <span class="help-block" style="color: red;">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                        </div>
                        
                      <div class="col-6 login-email">
                         <div class="form-group">
                            <div class="custom-control custom-checkbox"></div>
                         </div>

                      </div>
                      
                      <div class="col-6 login-email">
                         <div class="form-group text-right"><a href="{{url('forgot-password')}}" class="form-forgot">Forgot password?</a></div>
                      </div>


                      
                      <div class="col-12 login-email">
                         <div class="form-group"><button id="submit_btn" type="submit" class="btn btn-inline"><span>Login</span></button></div>
                      </div>
                      <div class="col-12 login-mobile" style="display: none;">
                        <small class="otpmsgsds"> Enter OTP recieved on your mobile/email.</small>
                     </div>
                     <div class="col-12 login-mobile" style="display: none;">
                        <div class="form-group"><input type="password" class="form-control" name="otp" id="otp" placeholder="Enter OTP on your mobile/email"><button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button><small class="form-alert">OTP must be 6 characters</small></div>
                        @if ($errors->has('otp'))
                               <span class="help-block" style="color: red;">
                                   {{ $errors->first('otp') }}
                               </span>
                               @endif
                       </div>
                       <div class="col-12 login-mobile" style="display: none;">
                        <div class="form-group"><button type="submit" class="btn btn-inline"><span>Verify OTP Mobile Number/Email</span></button></div>
                     </div>
                      
                   </div>


                </form>


<!--                 @signInWithApple($color, $hasBorder, $type, $borderRadius)
 -->
               <div class="user-form-direction mb-4">
               
                <p>Don't have an account yet? <a href="{{url('register')}}"><u>Register Now</u> </a></p> 
                </div>
             </div>
          
          </div>
       </div>
  
    </div>
 </section>
 @section('js')

 <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>


   window.onload = function() {
    initFirebaseMessagingRegistration();
  };

    var firebaseConfig = {
        apiKey: "AIzaSyCSRtg6ja2_Z-lEYj40oNFvKbBZN6PaanU",
  authDomain: "dealmme.firebaseapp.com",
  projectId: "dealmme",
  storageBucket: "dealmme.appspot.com",
  messagingSenderId: "901239814095",
  appId: "1:901239814095:web:682c52dfcd818cf29144ba",
  measurementId: "G-R6V3PFHFCP"
    };
    
   firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

  function initFirebaseMessagingRegistration() {
          messaging
          .requestPermission()
          .then(function () {
              return messaging.getToken()
          })
          .then(function(token) {
              $('#device_token').val(token);


          }).catch(function (err) {
              console.log('User Chat Token Error'+ err);
          });
   }  
    
   messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
 
</script>
 
 <script>

      $(function(){
         $("#otpcheck").click(function(){
            var mobile = $("#emob").val();
            var token = '<?php echo csrf_token() ?>';

         if(mobile != ''){

            $('small#classerror').hide();

             $.ajax({
              url:'/checkphone',
              type:'POST',
              data:{
                  token:token,
                  mobile:mobile,
               },
              success:function(result){
                  
                  if(result.status == false){
                     $('.otp_error').show();
                  }else {
                     $('#pass').removeAttr('required');
                     $("#otp").attr("required", "true");
                     $('.otp_error').hide();
                     $('.login-mobile').show();
                     $('.login-email').hide();

                     
                  }
                  

              }
         })

         }else {

             $('small#classerror').show();
           
         }
            

           

         })
      });

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
