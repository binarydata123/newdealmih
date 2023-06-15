@extends('website.layout.app')
@section('css')
@endsection
@section('content')
<section class="user-form-part">
    <div class="user-form-banner">
       <div class="user-form-content">
          <!-- <a href="#"><img src="images/logow.png" alt="logo"></a>
          <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
          <p>Biggest Online Advertising Marketplace in the World.</p> -->
       </div>
    </div>
    <div class="user-form-category">
       <!-- <div class="user-form-header"><a href="#"><img src="{{url('public/website/images/logo.png')}}" alt="logo"></a><a href="{{url('/')}}"><i class="fas fa-arrow-left"></i></a></div> -->
     
       <div class="tab-pane active" id="login-tab">
      <div align="right">
        <a href="#!" data-toggle="modal" data-target="#help" class="nh">Need help?</a>  
      </div>
          <div class="user-form-title" align="left">
             <h4><a href="{{url('/')}}" class="tblack"><i class="fas fa-arrow-left"></i> &nbsp; List an Item</a></h4>
             <p class="ml30">What are you Listing?</p>
          </div>
           <!-------------->
           @if (session()->has('success'))
           <div class="alert alert-success text-center" style="padding: 10px 0;">
               {{ session()->get('success') }}
           </div>
       @endif
           <div id="menu">
             <ul class="topUl">
                    @if($headerCategories)   
                        @foreach ($headerCategories as $headerCategory)
               <li class="ddList">

                 <a href="{{url('create/listing',$headerCategory->slug)}}" title="{{$headerCategory->name}}">
                   <img
                   @if($headerCategory->icon)
                   src="{{asset('media/header-categoy/'.$headerCategory->icon)}}" 

                   @else
                    src="{{url('public/website/images/dea/review.png')}}" 
                    @endif
                    class="listimg" width="45" height="45"> 
                      <h6 class="dline"> {{$headerCategory->name}}</h6>
                 <!-- <p class="ml45 mtm5">No Fee, Free Sale</p> -->
                     @if($headerCategory->order == "1")    
                    <p class="ml45 mtm5">Sale, Rent, Auction</p>
                    @endif
                    @if($headerCategory->order == "2")    
                    <p class="ml45 mtm5">Buy or Sell New & old Stuff</p>
                    @endif
                    @if($headerCategory->order == "3")    
                    <p class="ml45 mtm5">Buy or Sell New & old Vehicles</p>
                    @endif
                    @if($headerCategory->order == "4")    
                    <p class="ml45 mtm5">Hire Talent or look for job</p>
                    @endif
                    @if($headerCategory->order == "5")    
                    <p class="ml45 mtm5">Electrician, plumber, lawyer, Chef</p>
                    @endif
                 <i class="fa fa-chevron-right larrow"></i>
                </a>
                
               </li>
                        @endforeach
                    @endif
               
             
             </ul>
           </div>


          <!------------>
         
       </div>
  
    </div>
 </section>


@endsection