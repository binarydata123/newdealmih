@extends('website.layout.app')
@section('css')
@endsection
@section('content')
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
                   {{-- <p class="mbm20">Enter your login details below.</p> --}}
                  
                </div>

                <div class="user-form-direction">
                   <p>Sign in Via Social Account</p>
                </div>

                <ul class="user-form-option">
                  
                   
                   <li><a href="{{url('auth/google')}}"><img src="{{url('public/website/images/ui.svg')}}"><span class="text_set">Google</span></a></li>
                   <li><a href="{{url('auth/facebook')}}"><i class="fa fa-facebook"></i><span class="text_set">Facebook</span></a></li>
                   <li><a href="{{url('a/apple/login')}}" class="apple-de"><i class="fa fa-apple" ></i><span class="text_set">Apple</span></a></li>
<!--                    @signInWithApple($color, $hasBorder, $type, $borderRadius)
 -->                </ul>

                <div class="user-form-direction mb10">
                   <p>Or Enter your Registration details below.</p>
                </div>

 
                <form action="{{url('register')}}" method="post" id="formsubmit">
                    @csrf


                   <div class="row">
                    <div class="col-12">
                        <div class="form-group ">
                            
                            <p style="color:#F00; margin-top:10px; text-align: center;">@if(Session::has('message'))
                           <small> {!! Session::get('message') !!} </small>
                        @endif</p></div>
                        <div class="form-group">
                            <input type="hidden" name="device_token" id="device_token">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Full name" value="{{old('username')}}">
                           </div>
                        @if ($errors->has('username'))
                               <span class="help-block" style="color: red;">
                                   {{ $errors->first('username') }}
                               </span>
                               @endif
                       </div>
                      <div class="col-12">
                        
                         <div class="form-group"><input type="text" class="form-control" name="email" placeholder="Email or Phone Number" id="emailphone" value="{{old('email')}}"></div>
                         @if ($errors->has('email'))
                         <span class="help-block" style="color: red;">
                             {{ $errors->first('email') }}
                         </span>
                         @endif


                        </div>
                      <!-- <div class="col-12">

                        <div class="form-group"><input type="number" class="form-control" name="phone_number" placeholder="9745555000 " value="{{old('phone_number')}}"></div>
                         @if ($errors->has('phone_number'))
                         <span class="help-block" style="color: red;">
                             {{ $errors->first('phone_number') }}
                         </span>
                         @endif
                        </div> -->

                      <div class="col-12">
                         <div class="form-group"><input type="password" class="form-control" name="password" id="pass" placeholder="Password" value="{{old('password')}}"><button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button></div>
                         @if ($errors->has('password'))
                                <span class="help-block" style="color: red;">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                        </div>

                        <div class="col-12">
                           <div class="form-group"><input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="{{old('password')}}"><button type="button" class="form-icon"><i class="eye1 fas fa-eye" disabled></i></button></div>
                           {{-- @if ($errors->has('confirm_password'))
                                  <span class="help-block" style="color: red;">
                                      {{ $errors->first('confirm_password') }}
                                  </span>
                                  @endif --}}
                          </div>
                          <div class="col-12 mb30">
                        <p class="ptxt">Your Password must contain:</p>
                        <p class="fs12 dcolor">  Atleast 8 Characters, 1 Number, 1 Upper Case, 1 Special Character</p>
                        {{-- <p class="fs12 dcolor">  1 Number,    <span class="tgreen">1 Upper Case,</span>   ●   1 Special Character</p> --}}
                     </div>
                        
                      <div class="col-12">
                         <div class="form-group">
                           <span class="at-checkbox">
                              <input style="top:5px;" id="privacy_policy" type="checkbox" name="privacy_policy" class="check-policy" >
                              <label for="at-login" class="text-set" style="font-size: 12px">I have read and agreed to the <a target="_blank" href="{{url('terms')}}"> Terms & Conditions </a> and <a target="_blank" href="{{url('privacy')}}"
                                 title="Privacy Policy">Privacy Policy</a>
                              </label>
                              @if ($errors->has('privacy_policy'))
                              <span class="help-block" style="color: red;">
                                  {{ $errors->first('privacy_policy') }}
                              </span>
                              @endif                         </div>
                      </div>


                      
                      
                      {{-- <div class="col-6">
                         <div class="form-group text-right"><a href="{{url('forgot-password')}}" class="form-forgot">Forgot password?</a></div>
                      </div> --}}
                      
                      <div class="col-12">
                         <div class="form-group"><button id="registersubmit" type="submit" class="btn btn-inline"><span>Register</span></button></div>
                      </div>
                   </div>
                </form>

       

               


               
                <div class="user-form-direction">
                <p>Already have account? <a href="{{url('login')}}"><u>Login</u> </a></p> 
                </div>


             </div>
          
          </div>
       </div>
  
    </div>


 </section>

 <style>
        .input-box { position: relative; }
        .unit { position: absolute; display: block; left: 5px; top: 10px; z-index: 9; }
        .fixedTxtInput { display: block; border: 1px solid #d7d6d6; background: #fff; padding: 10px 10px 10px 30px; width: 100%; }
    </style>


@endsection


@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

<script>
    $(document).ready(function(){

         $("form#formsubmit").submit(function (e) {
            var textval  = $("#emailphone").val();
              if (isNaN(textval)) 
                  {
                    
                  
                  }else {

                    if(textval.length < 10){
                        alert("Please enter phone number/email");
                        return false;
                    }

                    if(textval.length > 10){
                         alert("Please enter phone number/email");
                         return false;
                    }
                    
                  }

        });
        
    });

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
    $("#submitForm").click(function(){

        var name=$("#name").val();
        var mobile= $("#mobile").val();
        var email = $("#email").val();
        var token = $("#csrf").val();
       $.ajax({
        url:'/submitForm',
        type:'POST',
        data:{
            _token:token,
            name:name,
            mobile:mobile,
            email:email},
        success:function(result){
            var result = JSON.parse(result);
            // alert(result);
            if(result.statusCode == 200){
                    $("#formdiv").removeClass('show');
                    $("#formdiv").addClass('hide');
                    $("#otpdiv").removeClass('hide'); 
                    $("#otpdiv").addClass('show'); 
                    }
            else{
                alert("something wrong... please try later");
            }
        }
       })
    })

    $("#otpSubmit").click(function(){
        var otp = $("#otp").val();
        otp = otp.trim();
        var token = $("#csrf").val();
        console.log("---",otp);
        $.ajax({
            type:"post",
            url:'/submitotp',
            data:{
                _token:token,
                otp:otp
            },
            success:function(otpResult){
                otpResult = JSON.parse(otpResult);
                if(otpResult.statusCode == 200){
                    location.replace("/showresult");
                }
                else{
                    alert("otp not match. Please try again");
                }
            }
        })
    })
})


</script>
@endsection