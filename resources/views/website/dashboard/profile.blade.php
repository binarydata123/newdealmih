<style>
   @media(max-width:1050px){
.notify-link {
    padding: 12px 8px !important; 
}
.account-card ul li a p {
    font-size: 13px;    
} 

}
.caabc {
    margin-top: -10px;
}
i.fa.fa-trash {
    padding-right: 5px;
}
a#delete {
    border-radius: 5px;
    text-decoration: none !important;
    padding: 10px 0px;
}
.modal-body{
    text-align: start;
}
</style>

@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<section class="dashboard-part top-gap">
    <div class="container-fluid">
       <div class="row">

         @include('website.dashboard.dashboard')

          <div class="col-lg-9">

            @if(session()->has('success-msg'))
            <div style="">
               <div class="alert alert-success text-center" style="padding: 10px 0;">
                  {{ session()->get('success-msg') }}
            </div>
            </div>
        @endif

             <div class="account-card alert fade show bs">
               <div class="col-lg-12 text-right posedit">
                  <a href="{{url('profile/edit')}}" class=""><u>{{trans('global.edit_verify')}}</u></a>
                  </div>
                 
                <div class="btn-title">
                   <h6>{{trans('global.view_profile')}}</h6>
                  
                </div>
                <div class="dash-header-card">
                  <div class="row">
                     <div class="col-6 top-left-img">
                        <div class="dash-header-left">
                           <div class="dash-avatar mtm25"><a href="#" class="dp-image " >
                              <img id="uploadPreview" 
                              @if(Auth::user()->avatar)
                              src="{{asset('media/avatar/'.Auth::user()->avatar)}}"
                              @else
                               src="{{url('public/website/images/us.png')}}"
                               @endif alt="avatar"  height="100" width="100">
                               <img src="{{ url('public/website/images/dea/cam.png') }}" class="camicon" width="30" height="33">   
                           </a>
                          
                           <form action="{{url('profile-image-update')}}" enctype="multipart/form-data" method="post">
                              @csrf
                           <input type="file" name="image" onchange="PreviewImage();" id="image" hidden class="my_file">
                           <input type="submit"  class="btn btn-primary dbtn profile-btn" style="display: none;" value="Save">
                        </form>
                           
                       
                        
                        </div>
                          
                           <div class="dash-intro">
                              
                              <ul class="dash-meta">
                                 <li><span class="btxt2">Name</span></li>
                                 <li><span class="btxt2">Gender</span></li>
                                 <li><span class="btxt2">Mobile Number</span></li>
                                 <li><span class="btxt2">Email id</span></li>
                                 <li><span class="btxt2">Address</span></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <ul class="dash-meta spe-top">
                           <li><span>{{ucwords(Auth::user()->username)}}</span></li>
                            <li><span>@if(Auth::user()->gender) {{Auth::user()->gender}}@else - @endif</span></li>
                            <li><span>@if(Auth::user()->phone_number) {{ucwords(Auth::user()->phone_number)}} @else - @endif</span></li>
                            <li><span> {{ucwords(Auth::user()->email)}}</span></li>
                            <li><span> @if (Auth::user()->businessDetails) {{Auth::user()->businessDetails->address_one}},
                               @if(Auth::user()->businessDetails->district) {{Auth::user()->businessDetails->district->district_name}} , 
                               @endif
                               @if(Auth::user()->businessDetails->village)
                               {{ Auth::user()->businessDetails->village->name}} ,
                                @endif 
                                
                                @if(Auth::user()->businessDetails->muncipality)
                               {{ Auth::user()->businessDetails->muncipality->municipality_name}}
                                @endif 
                                @else - @endif
                               
                            </span></li>
                        </ul>
                     </div>
                  </div>
          
               </div>

             </div>
             
             
                

             <div class="account-card alert fade show bs">
              
                <div class="dash-header-card">
                   <div class="row">
                      <div class="col-lg-3 col-sm-3 col-10">
                         <div class="dash-header-left">
                            <p>  <img src="{{ url('public/website/images/dea/lock.png') }}">Change Password</p>
                          
                         </div>
                      </div>

                      <div class="col-lg-3 col-sm-3 col-2 text-lg-center">
                        <a href="#!" data-toggle="modal" data-target="#cpassword"><u>Change</u></a>
                         </div>
                          <div class="col-lg-3 col-sm-3 col-10">
                           <p  id="delete"><i class="fa fa-trash" aria-hidden="true"></i>Delete Account </p>
                        </div>
                         <div class="col-lg-3 col-sm-3 col-2">
                         <div class="caabc" align="right" data-toggle="modal" data-target="#delete_modal">
                        <a style="cursor: pointer;text-decoration: underline;" id="delete"><u>Delete</u></a>
                        <div class="modal fade" id="delete_modal" role="dialog">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                           <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                          <div class="modal-body">
                                             <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                                              <span class="delete">Are you sure you want to delete your account?<span><br>
                                                <span style="font-size: 12px;">You will not be able to login to your account again once deleted.


</span>
                                                  
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{url('profile/delete',Auth::user()->id)}}" method="post">
                                               <button class="btn btn-primary" ><span>Yes</span></button>
                                                 </form>
                                             <button class="btn btn-danger"><span>No</span></button>
                                             
                                            </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                         </div>
                   </div>
                </div>
                <div align="center" class="d-block d-md-none">
                <a href="{{url('logout')}}" class="btn btn-inline3 post-btn" id="logout-btnn"><span class="cred">LOG OUT</span></a>
             </div>
             </div>
            
          </div>
       
       </div>
    </div>
 </section>

 <div class="modal fade" id="cpassword">
   <form data-content="change-password" class="formSubmit">

   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">

         <div class="modal-header noh">
            <h4></h4>
            <button class="fas fa-times" data-dismiss="modal"></button>
         </div>
        
         <div class="modal-body p15">
            <div align="center">
               <h4 class="test mb20">Change Password</h4>
               <span style="color: green" class="succes-msg"></span>
            </div>
            @if(Auth::user()->google_id == null && Auth::user()->facebook_id == null)
            <div class="col-lg-12"> 
               <div class="form-group"><input type="text" class="form-control" name="password" value="{{old('password')}}" placeholder="Current Password">
                  <span class="error" style="color: red;"></span>

               </div>
            </div>
            @endif
            <div class="col-lg-12"> 
               <div class="form-group"><input type="text" class="form-control" name="new_password" value="{{old('new_password')}}" placeholder="Set New Password">
                  <span class="error" style="color: red;"></span>

               </div>
            </div>

            <div class="col-lg-12"> 
               <div class="form-group"><input type="text" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Confirm Password">
                  <span class="error" style="color: red;"></span>

               </div>
            </div>

            <div class="col-12 mb30">
               <p class="ptxt">Your Password must contain:</p>
               <p class="fs12 dcolor">Atleast 8 Characters, 1 Number, 1 Upper Case, 1 Special Character</p>
               {{-- <p class="fs12 dcolor">●  1 Number,    <span class="tgreen">1 Upper Case,</span>   ●   1 Special Character</p> --}}
            </div>

            <div class="form-group"><input type="submit" class="btn btn-inline fs18" value="Submit"></div>

         </div>
      </div>
   </div>
   </form>
</div>
@endsection
@section('js')
<script>
     $(".dp-image").click(function() {
        $("input[class='my_file']").click();
       
        // PreviewImage();
    });

    function PreviewImage() {
       
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);

        oFReader.onload = function(oFREvent) {
            $(".main-image").show();
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            $('.profile-btn').show();
        };
    };
</script>
@endsection