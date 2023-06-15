@extends('website.layout.app')
@section('css')
@endsection
@section('content')



<link rel="stylesheet" href="{{url('public/website/css/custom/contact.css')}}">


<section class="single-banner"  @if($cms) 
        style="background: url(../../media/cms-image/{{$cms->image}});"
        @else 
        style="background: url(../../website/images/about/about.jpg);"  @endif>
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>@if($cms) {{ucwords($cms->title)}} @else About us @endif</h2>
                     <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">about</li>
                     </ol> -->
                  </div>
               </div>
            </div>
         </div>
      </section>


<!-- <section class="single-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>Contact</h2>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">about</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </section>
 -->


      <section class="contact-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-4">
                  <div class="contact-info">
                     <i class="fas fa-map-marker-alt"></i>
                     <h3>Our Location</h3>
                    <a href="https://goo.gl/maps/ZDZFoEWSDwbLVEs67" target="_blank" style="color:black;text-decoration: none;"> <p>{{$setting->address}}</p></a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="contact-info">
                     <i class="fas fa-phone-alt"></i>
                     <h3>Make a Call</h3>
                     <a href="tel:+977-9746825000" style="color:black;text-decoration: none;"><p>{{$setting->contact_no}}</p></a>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="contact-info">
                     <i class="fas fa-envelope"></i>
                     <h3>Send Mail</h3>
                     <a href="mailto:support@dealmih.com" style="color:black;text-decoration: none;"><p>{{$setting->developer_email}}</p></a>
                  </div>
               </div>
            </div>
        
         </div>
      </section>


@endsection
@section('js')
@endsection