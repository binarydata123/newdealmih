@extends('website.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">

@endsection
@section('content')

<style>
    #jobs-ads{
    width: 100%;
    min-height: 500px;
    object-fit: cover;
 }
 a#job {
    border-radius: 5px;
    background-color: #567df4;
    color: #fff;
    text-decoration: none !important;
    padding: 10px;
}
.modal-body{
    text-align: start;
}
</style>
     
  <!-------new------------>
  <section id="services" class="services section-bg mt10">
         <div class="container-fluid mt60">
            <!-- <p class="fs12 mb20">Home/Marketing Strategies/Mobiles/<span class="cblue">Iphone11</span> </p> -->
          
           <div class="row row-sm">
             <!-- <div class="col-lg-6 _boxzoom">
               <div class="zoom-thumb">
                 <ul class="piclist">
                   <li><img src="images/dea/p2.png" alt=""></li>
                   <li><img src="images/dea/p3.png" alt=""></li>
                   <li><img src="images/dea/p4.png" alt=""></li>
                   <li><img src="images/dea/p2.png" alt=""></li>
                   
                 </ul>
               </div>
               <div class="_product-images" align="center">
                 <div class="picZoomer" align="center">
                   <img class="my_img" src="images/dea/p2.png" alt="">
                 </div>

                 <div class="w95">
                    <div class="row">
                       <div class="col-md-6"> <a href="login.html" class="btn btn-inline2 post-btn2"><span>Place Bid</span></a></div>
                       <div class="col-md-6"><a href="login.html" class="btn btn-inline post-btn2 fs18w"><span>Buy Now</span></a></div>
                    </div>
               
                 
                  
               
                  </div>


               </div>

              
              
             </div> -->

             
             <div class="col-md-9">
                 <div class="row">
             <div class="col-md-12">
               <div class="common-card p0">
                    
                     @if(session()->has('message'))
                        <div class="alert alert-danger" style="padding: 10px 0;">
                           {{ session()->get('message') }}
                        </div>
                    @endif

                 
                  <h3 class="ad-details-title p10 mb0">{{
                                ucwords($job->title) }} <span class="s-success">Listed {{
                                ucwords($job->created_at) }} </span></h3>
                  <div class="product-meta">
                      <span><i class="fas fa-map-marker-alt"></i>@if($job->address_one)
                                                    {{$job->address_one}}@endif
                                                    @if($job->address_two)
                                                    , {{$job->address_two}}@endif
                                                    @if($job->district)
                                                        @php
                                                            $district_data = DB::table('districts')->where('district_id', $job->district)->first();
                                                        @endphp
                                                    , {{$district_data->district_name}}@endif
                                                    @if($job->municipality)
                                                        @php
                                                            $municipality_data = DB::table('municipalities')->where('municipality_id', $job->municipality)->first();
                                                        @endphp
                                                    , {{$municipality_data->municipality_name}}@endif</span>
                      &nbsp;<span><i class="fa fa-briefcase"></i>Job Type: <span class="bluebtn">@if($job->job_type == 1){{"Full
                                                Time"}}@endif
                                                @if($job->job_type == 2){{"Part
                                                Time"}}@endif
                                                @if($job->job_type == 3){{"Work
                                                From Home "}}@endif</span>
                      <span><i class="fa fa-clock"></i>Duration: <span class="bluebtn"> @if($job->duration ==
                                                        1){{"Permanent"}}@endif
                                                        @if($job->duration ==
                                                        2){{"Temporary"}}@endif
                                                        @if($job->duration ==
                                                        3){{"Contract"}}@endif</span></span></div>
               </div>
</div>

               
</div>


<div class="col-md-12">
   
<div class="dbox mt0 mb20">
                  <h4 class="fs20">Apply online </h4>
                  <hr>
            <form method="post" action="{{ url('apply-job-submit') }}" enctype="multipart/form-data">
               @csrf
                  <div class="row ml0">
                     <div class="col-lg-6">
                        <input type="hidden" name="slug" id="slug" value="@if(isset($slug)){{$slug}}@endif">
                     <div class="form-group mt15">
                           <fieldset>
                              <legend class="mbm12">First Name</legend>
                              <input class="form-control b0" type="text" name="firstname" placeholder="First Name" @if(isset($userprofile->first_name))value="{{$userprofile->first_name}}"@endif required>
                           </fieldset>
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="form-group mt15">
                        <fieldset>
                              <legend class="mbm12">Last Name</legend>
                              <input class="form-control b0" type="text" name="lastname" placeholder="Last Name" @if(isset($userprofile->last_name))value="{{$userprofile->last_name}}"@endif required>
                           </fieldset>
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="form-group mt15">
                        <fieldset>
                              <legend class="mbm12">Email</legend>
                              <input class="form-control b0" type="email" name="email" placeholder="Your Email" @if(isset($userprofile->email))value="{{$userprofile->email}}"@endif required>
                           </fieldset>
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="form-group mt15">
                           <fieldset>
                              <legend class="mbm12">Phone Number</legend>
                              <input class="form-control b0" type="text" name="phonenumber" placeholder="Phone Number" @if(isset($userprofile->phone_number))value="{{$userprofile->phone_number}}"@endif required>
                           </fieldset>
                        </div>
                     </div>

                    


                     <div class="col-lg-12">
                     <div class="form-group"> 
                        <label>Upload CV</label>
                           <input type="file" class="form-control ldash" name="profile_file" id="profile_file" required>                      
                        </div>
                         
                           @if(isset($userprofile->upload))
                           <div style="">
                             <a href="" style="color: #17181d;font-size: 12px;"> </a>
                           </div>
                           @endif            
                     
                     </div>

                     <div class="col-lg-12">
                        <div class="form-group mt15">
                           <fieldset>
                               <textarea class="form-control b0 coverletter-ckeditor" type="text" name="coverletter" placeholder="Cover letter" required> @if(isset($userprofile->cover_letter)){{$userprofile->cover_letter}}@endif</textarea>
                           </fieldset>
                        </div>
                     </div>

                     <div align="right" class="col-lg-12" data-toggle="modal" data-target="#job_modal">
                        <a style="cursor: pointer;text-decoration: underline;" id="job">Apply Now </a>
                        <!-- <button href="" class="btn btn-inline fil mb10 "><span>Apply Now</span></button> -->
                        <div class="modal fade" id="job_modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                      </div>
                                    <div class="modal-body">
                                        <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                                        <span class="job">Do you want to save your application for future use?<span>
                                            
                                    </div>
                                    <div class="modal-footer">
                                         <button class="btn btn-primary"><span>Yes</span></button>
                                          <button class="btn btn-danger"><span>No</span></button>
                                       
                                      </div>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>

               </form>
            
                </div>

</div>

            </div>
            <div class="col-md-3">
                
              <a target="_blank" href="{{$webads->ne_title}}">
                        <img src="{{url('public/media/webads-image',$webads->image)}}" class="br5" id="jobs-ads"></a>
          </div>
        

</div>

      
                  
               </div>
             </div>
           
       </section>
     
      <!-------new------------>


@endsection
@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
    <script src="{{ url('public/website/js/classified/product-detail.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>

    <script>


         var allEditors = document.querySelectorAll('.coverletter-ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(
               allEditors[i], {
               removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
               },
            );
         }


       </script>

@endsection