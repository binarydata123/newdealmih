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
         <a href="#!" class="nh">Need help?</a>
      </div>

           <div class="container p40">
             <div>
                <div class="user-form-title mb30">
                   <h4 class="fs20"><img src="{{ url('public/website/images/arrow_back_black.svg') }}">  Change Password</h4>

                   <!-- <p class="mbm20 fs14o dcolor h23">Please enter your registered email I’d. We will send you the 6 digit OTP to reset your password.</p> -->
                </div>
                <form data-content="change-password" class="formSubmit">
                   <div class="row">
                    <div class="col-12">
                        <div class="form-group mb30"><input type="text" class="form-control" name="password" value="{{old('password')}}" placeholder="Current Password">
                            <span class="error" style="color: red;"></span>
                            <small class="form-alert">Please follow this example - 01XXXXXXXXX</small>
                        </div>
                     
                    </div>
                      <div class="col-12">
                         <div class="form-group mb30"><input type="text" class="form-control" name="new_password" value="{{old('new_password')}}" placeholder="Set New Password">
                            <span class="error" style="color: red;"></span>
                            <small class="form-alert">Please follow this example - 01XXXXXXXXX</small></div>
                        
                     
                        </div>

                      <div class="col-12">
                         <div class="form-group mb30"><input type="text" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Confirm Password">
                     <span class="error" style="color: red;"></span>
                            
                            <small class="form-alert">Please follow this example - 01XXXXXXXXX</small></div>
                        </div>

                      <div class="col-12 mb30">
                         <p class="ptxt">Your Password must contain:</p>
                         <p class="fs12 dcolor">&#9679;  Atleast 8 Characters</p>
                         <p class="fs12 dcolor">&#9679;  1 Number,    <span class="tgreen">1 Upper Case,</span>   &#9679;   1 Special Character</p>
                      </div>
                      
                      <div class="col-12">
                         <div class="form-group"><input type="submit" class="btn btn-inline fs18" value="Submit"></div>
                      </div>
                      
                   </div>
                </form>
                
             </div>
          
          </div>
          <!------------>
       </div>
  
    </div>
 </section>
 @section('js')
 
 @endsection
@endsection
