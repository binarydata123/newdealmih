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
         <a href="#!" class="nh">Need help?</a>
      </div>
           <!-------------->
    
           <div class="container">
             <div>
                {{-- <div class="user-form-title mb20" align="center">
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
               
                </div> --}}



                <form action="{{url('password-reset/'.$user->id)}}" method="post">
                    @csrf
                   <div class="row">
                    
                      {{-- <div class="col-12">
                        <div class="form-group ">
                           <p style="color:#F00; margin-top:10px; text-align: center;">@if(Session::has('message'))
                          <small> {!! Session::get('message') !!} </small>
                       @endif</p></div>
                         <div class="form-group"><input type="text" class="form-control" name="current_password" placeholder="Current password "></div>
                         @if ($errors->has('current_password'))
                         <span class="help-block" style="color: red;">
                             {{ $errors->first('current_password') }}
                         </span>
                         @endif
                        </div> --}}
                      <div class="col-12">
                         <div class="form-group"><input type="password" class="form-control" name="password" id="pass" placeholder="New Password">
                            <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button></div>
                         @if ($errors->has('password'))
                                <span class="help-block" style="color: red;">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                        </div>

                        <div class="col-12">
                            <div class="form-group"><input type="password" class="form-control" name="confirm_password" id="pass" placeholder="Confirm Password">
                               <button type="button" class="form-icon"><i class="eye fas fa-eye"></i></button></div>
                            @if ($errors->has('confirm_password'))
                                   <span class="help-block" style="color: red;">
                                       {{ $errors->first('confirm_password') }}
                                   </span>
                                   @endif
                           </div>
                        
                      {{-- <div class="col-6">
                         <div class="form-group">
                            <div class="custom-control custom-checkbox"></div>
                         </div> --}}

                      </div>
                      
                      {{-- <div class="col-6">
                         <div class="form-group text-right"><a href="{{url('forgot-password')}}" class="form-forgot">Forgot password?</a></div>
                      </div> --}}
                      
                      <div class="col-12">
                         <div class="form-group"><button type="submit" class="btn btn-inline"><span>Login</span></button></div>
                      </div>
                   </div>

                   <div class="user-form-direction">
               
                {{-- <p>Don't have an account yet? <a href="{{url('register')}}"><u>Register Now</u> </a></p>  --}}
                </div>


                </form>
              
             </div>
          
          </div>
       </div>
  
    </div>
 </section>
@endsection
