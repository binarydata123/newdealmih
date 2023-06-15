@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<link rel="stylesheet" href="{{url('public/website/css/custom/message.css')}}"> 
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
              
                <div class="col-lg-12">
                    <div class="account-card alert fade show bs">


         
      
      <!--tab1-->
      <div class="tab-pane active" id="ratings">
      <div class="row wishlist1 mt20 mb20">
         
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt20">


        @if (session()->has('success'))
         <div class="alert alert-success text-center" style="padding: 10px 0;">
             {{ session()->get('success') }}
         </div>
     @endif

     <div class="row">
     <div class="col-md-10">
     <h4 class="fs20">Email Template</h4>
     </div>

     <div class="col-md-2">
     <a href="{{url('dashboard/email-template')}}" class="btn btn-inline post-btn">
        <span style="color:#fff;font-size:14px;">Back</span></a>
     
     </div>
</div>


     
     
     
     <div class=" mt0 mb20">
                  
                  
                  <hr>
                  <form method="post" action="{{ url('email-template/edit/'.$template->id) }}" enctype="multipart/form-data">
                     @csrf
                        <div class="row ml0">
                           <div class="col-lg-12">
                            <div class="form-group mt15">
                                 <fieldset>
                                    <legend class="mbm12">Subject</legend>
                                    <input class="form-control b0" type="text" name="subject" value="{{$template->subject}}" placeholder="First Name"  required>
                                 </fieldset>
                              </div>
                           </div>

      
                           <div class="col-lg-12">
                              <div class="form-group mt15">
                                 <fieldset>
                                     <textarea class="form-control b0 mytextarea" id="mytextarea" type="text" name="email_body">{{$template->email_body}}</textarea>
                                 </fieldset>
                              </div>
                           </div>
                           <div align="right" class="col-lg-12">
                              <button href="" class="btn btn-inline fil mb10"><span>Save </span></button>
                           </div>
                        </div>
      
                     </form>

                </div>
                            </div>
                        </div>
                        </div>
      

     
    </div>
</div>

</div>
</div>
</section>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script>
 CKEDITOR.replace( 'mytextarea', {
       allowedContent: true,
     filebrowserUploadUrl: '{!! asset('ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')!!}',
    filebrowserImageUploadUrl: '{!! asset('ckeditor/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')!!}'

   });
</script>
@endsection