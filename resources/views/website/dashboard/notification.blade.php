@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<section class="dashboard-part">
    <div class="container-fluid">
       <div class="row">

         @include('website.dashboard.dashboard')
         <div class="col-lg-9">
            <div class="account-card alert fade show bs">
               <div class="account-title wishlist1">
                  <h6>Notifications</h6>
                <span class="sep"> <a  href="#" data-content="allnotification" data-id="{{Auth::user()->id}}" class="clrall delete"> Clear all</a></span>
               </div>
                  <div class="row wishlist1">
                    @if($notifications->count() > 0)
                    @foreach ($notifications as $notification)
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                         <div class="product-card standard image-heg" id="product-card1">
                             <div class="product-content">
                                 <div class="product-info text-cont">
                                    <ol class="breadcrumb product-category" id="product-category1">
                                         <div class="w50" style="    position: relative;  left: -12px; top: 15px;"><img style="width: 50px" src="{{url('public/website/images/favicon.png')}}" alt="product"></div> 
                                       <h5 class="product-title" style="padding: 24px"><a href="#" class="notytitle"></a></h5>
                                       <p class="notyp" style="top: 17px;" id="notyp1_id">@if(isset($notification->notification)){{$notification->notification}}@endif</p>
                                   </ol>
                                   <div class="wishlist-move"><span class="mr15">{{ $notification->created_at->format('D d M') }}</span> <span  data-content="notification" data-id="{{$notification->id}}" class="light-text delete"> <i class="far fa-trash-alt fs16 themered"></i></span></div>
                                 
                                 </div> 
                             </div>
                         </div>
                        </div>
                            @endforeach

                            @else 
                            @include('website.no-data')
                            
                            @endif
                      
                    
                 </div>
              </div>

        
           
         </div>
      
      </div>
   </div>
</section>
@endsection

@section('js')

<script src="{{url('public/website/js/classified/delete.js')}}"></script>
    @endsection