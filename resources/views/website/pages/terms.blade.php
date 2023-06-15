@extends('website.layout.app')
@section('css')
@endsection
@section('content')



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

       {!! $cms->content  !!}



@endsection
@section('js')
@endsection