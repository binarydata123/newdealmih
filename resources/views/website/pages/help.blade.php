@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<style type="text/css">
   
   #hr hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    width: 600px;
    border-top: 3px solid rgba(0, 0, 0, 0.06) !important;

}



@media only screen and (max-width: 767px) { 
    .video iframe{
    width:  100% !important;
  }
  #hr hr 
  {
    width:  100% !important;
  }

}

.video{
   overflow: hidden;
}

</style>

<section class="single-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>Help</h2>
                     <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">about</li>
                     </ol> -->
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="about-part mt60 mb70">
         <div class="container">
            <div class="row">
            <div class="col-lg-12" align="center">



         <!--    <h2 class="mb20"> Need Help? </h2>

            <p>We are here to assist you! For any support and query
            please email us on the email I’d given below.</p>

<a href="#!" class="hrf mb20">support@dealmih.com</a>

<div class="col-md-3"><a target="_blank" href="https://www.gmail.com" class="btn btn-inline post-btn2 fs18w w100 mb20"><span>Email Us</span></a></div> -->



</div>
</div>
</section>

<section>
   
<div class="container " id="hr">
   <div class="row align-items-center mb-3 justify-content-center">
      <div class="col-md-7" id="border-2">
         <div class="video_text">
          <h4 class="mb-3">How To Register/Signup?</h4>
          <hr>
         </div>
         <div class="video">
           <iframe width="600" height="315" src="https://www.youtube.com/embed/3_C37oIzZwk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       </div>
       <div class="row mt-5">
         <div class="col-md-12">
         <div class="video_text">
          <h4 class="mb-3">How To Create Listing/Advertise?</h4>
           <hr>
         </div>
         <div class="video">
          <iframe width="600" height="315" src="https://www.youtube.com/embed/DUI3ul08t9Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       </div>
            
         </div>
          
       </div>
              <div class="row mt-5">
         <div class="col-md-12">
         <div class="video_text">
          <h4 class="mb-3">How To Edit My Profile?</h4>
           <hr>
         </div>
         <div class="video">
          <iframe width="600" height="315" src="https://www.youtube.com/embed/9HEXw9W-sMo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       </div>
            
         </div>
          
       </div>
              <div class="row mt-5">
         <div class="col-md-12">
         <div class="video_text">
          <h4 class="mb-3">How To Change Password?</h4>
           <hr>
         </div>
         <div class="video">
         
          <iframe width="600" height="315" src="https://www.youtube.com/embed/ti1nUxo724g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       </div>
            
         </div>
          
       </div>
  </div>
</div>
</div>
</section>



@endsection
@section('js')
@endsection