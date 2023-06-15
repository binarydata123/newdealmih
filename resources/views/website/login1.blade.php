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
         <a href="#!" data-toggle="modal" data-target="#help" class="nh">Need help?</a>
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
                  
                   
                   <li><a href="{{url('auth/google')}}"><img src="{{url('public/website/images/ui.svg')}}"><span> Sign in With Google</span></a></li>
                   <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i><span>Sign in With Facebook</span></a></li>
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

 <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>


  var firebaseConfig = {
      apiKey: "AIzaSyAsmggYGe0uE0Ohd8ua9rjlPPrr7Ei2gbw",
      authDomain: "deal-60797.firebaseapp.com",
      databaseURL: "https://deal-60797-default-rtdb.firebaseio.com",
      projectId: "deal-60797",
      storageBucket: "deal-60797.appspot.com",
      messagingSenderId: "4186717137",
      appId: "1:4186717137:web:9ba0a8e2a71aa5d30efef0",
      measurementId: "G-BK9QNNYK6K"
  };
    
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();
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
 <script>
  window.addEventListener('load', function(){

alert("The window has loaded");

});
 </script>
 @endsection
@endsection
