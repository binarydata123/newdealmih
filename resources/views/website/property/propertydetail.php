@extends('website.layout.app')

 @section('css')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
     <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">
     <style>
         a[disabled="disabled"] {
             pointer-events: none;
         }
 
         .link-copied-success {
          padding: 20px 0;
           margin-bottom:10px;
           color:#008000;
         }
 
     </style>
 @endsection
 @section('content')
  
  
  <!-------new------------>
  <section id="services" class="services section-bg mt10">
       <div class="container-fluid mt60">
          <p class="fs12 mb20">Home/Property/<span class="cblue">View Property</span> </p>
 
          <div class="row row-sm">
 
             <div class="col-lg-6 _boxzoom">
                <div class="zoom-thumb">
                   <ul class="piclist">
                      @if(isset($property->media)   )
                         @foreach($property->media as $media)
                      <li><img src="{{ url('public/media/product-multi-image/' . $media->file) }}" alt=""></li>
                         @endforeach
                      @endif
                   </ul>
                </div>
                <div class="_product-images" align="center">
                   <div class="picZoomer" align="center">
                     
                      <img class="my_img" src="@if($property->image){{asset('media/product-image/' . $property->image)}}@else{{url('public/website/images/dea/property/l6.jpg')}}@endif" alt="">
                   </div>
                   <div class="alert alert-msg text-center" style="padding: 10px 0;"></div>
 
                   <div class="w95">
                      <div class="row">
     
                         @if($property->is_auction)
                         <div class="col-md-6">  <a  class="btn btn-inline2 post-btn2 bid-modal"
            data-toggle="modal"><span>Place Bid</span></a></div>
                               @else
                               <div class="col-md-6">
                                  @if (Auth::check())
                                  <button type="button" title="Wishlist"
                                      data-id="{{ $property->id }}"
                                      class="wishlist btn btn-inline2 post-btn2">Wishlist</button>
                              @endif
                               </div>
                               @endif
                         <div class="col-md-6"><a href="{{ url('messages?type='.$slug) }}"  class="btn btn-inline post-btn2 fs18w"><span>
                                  Contact Owner</span></a></div>
                      </div>
                   </div>
                </div>
 
                <div class="dbox">
                      <h4 class="fs20">Description </h4>
                      <ul class="ldisc">
                        {!!$property->description!!}
                      </ul>
                      <div align="right">
                         {{-- <a href="#!" class="clink"> <u>See More</u></a> --}}
                      </div>
                   </div>
 
                   @if($property->location)
                   <div class="mb20">
                   <h4 class="fs20">Map View </h4>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.64621395394!2d85.25609251320085!3d27.708942727046708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2sin!4v1633433283424!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                   </div>
                   @endif
                   @if($property->youtube_url)
                   <div class="mb20">
                   <h4 class="fs20">Videos hhhhh </h4>
                   <iframe width="100%" height="400" src="https://www.youtube.com/watch?v=0gpm4llQ06Y&t=5s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   </div>
                   @endif
 
 
             </div>
 
 
 
             <div class="col-lg-6">
                <div class="common-card p0">  
                   <div class="row">
                      <div class="col-md-9">
                         <h3 class="ad-details-title">{{ucwords($property->title)}}</h3>
                      </div>
 
                      <div class="col-md-3">
                      <div class="alert alert-link-copied text-center" style=""></div>
 
                         <button class="clink copy_link"><i class="fa fa-clone" aria-hidden="true"></i> <u>Copy Link</u></button>
                      </div>
                   </div>
  
                   <h5 class="fs16">Buy Now Price <span class="actualp"> रू {{number_format($property->price)}}</span></h5>
                   @if ($property->auction_price)
                   <h5 class="fs16 mt15">Auction Start Price <span class="aucp"> रू {{$property->auction_price}}</span></h5>
                   @endif
                   <div class="dbox">
                   <h4 class="fs20 mb10">Details ASDSD</h4>
                         
                         <ul class="ad-details-specific plisting">
                             <li><h6>Type</h6><p>@if(isset($features->property_type))
                               @if($features->property_type ==1){{"Appartments"}}@endif
                               @if($features->property_type ==2){{"Builder Floor"}}@endif
                               @if($features->property_type ==3){{"Farm House"}}@endif
                               @if($features->property_type ==4){{"Houses & Villas"}}@endif
                               @if($features->property_type ==5){{"Hostel"}}@endif
                               @if($features->property_type ==6){{"PG & Guest house"}}@endif
                               
 
                               @endif</p></li>
                             <li><h6>Land Area</h6><p>@if(isset($features->land_area)){{$features->land_area}}@endif sq. ft.</p></li>
                             <li><h6>Bathrooms</h6><p>@if(isset($features->bathrooms)){{$features->bathrooms}}@endif</p></li>
                             <li><h6>Bedrooms</h6><p>@if(isset($features->bedrooms)){{$features->bedrooms}}@endif</p></li>
                             <li><h6>Listed by</h6><p>@if(isset($features->listed_by)){{$features->listed_by}}@endif</p></li>
                             <li><h6>Furnished</h6><p>@if(isset($features->furnished))
                               @if($features->furnished ==1)Yes @endif
                               @if($features->furnished ==2)No @endif
                               @endif</p></li>
  
                             <li><h6>Facilities </h6><p> @if(isset($features->facilities)){{$features->facilities}}@endif</p></li>
                              <li><h6>Floor No </h6><p>  @if(isset($features->floor_no)){{$features->floor_no}}@endif</p></li>
                             <li><h6>Car Parking </h6><p>@if(isset($features->car_parking)){{$features->car_parking}}@endif</p></li>
                             <li><h6>Facing </h6><p> @if(isset($features->facing))
                               @if($features->facing ==1)North @endif
                               @if($features->facing ==2)East @endif
                               @if($features->facing ==3)West @endif
                               @if($features->facing ==4) South @endif
                               @endif</p></li>
                             <li><h6>Project Name </h6><p> @if(isset($features->project_name)){{$features->project_name}}@endif</p></li>
                         </ul>
                     </div>
                   <div class="common-card dbox2">
                      <h4 class="fs20">Seller Information </h4>
 
                      <div class="row">
                         <div class="col-md-12" align="right">
                            <p class="lalign"><span class="gbox">Address Verified</span> <span class="rbox">In
                                  Trade</span><span
                                             class="rbox2"><a href="#!" class="twhite">Message Seller</a></span></p>
                         </div>
                         <div class="col-md-3 mtm30">
                            <img class="iresponsive" src="{{url('public/website/images/dea/p1.png')}}" alt="">
                         </div>
                         <div class="col-md-9 mtm45">
                            <ul class="ad-details-specific dbb">
                               <li>
                                  <h6>Name:</h6>
                                  <p>@if($property->seller_first_name){{$property->seller_first_name}}@endif @if($property->seller_first_name){{$property->seller_first_name}}@endif</p>
                               </li>
                               <li>
                                  <h6>Location:</h6>
                                  <p>@if ($property->districtList){{ $property->districtList->district_name }} @endif @if ($property->municipalityList) , {{ $property->municipalityList->municipality_name }} @endif</p>
                               </li>
                               {{-- <li>
                                  <h6>Pick-up Location:</h6>
                                  <p>Pickup from seller location</p>
                               </li>
                               <li>
                                  <h6> Shipping Area:</h6>
                                  <p>All Over Nepal</p>
                               </li> --}}
                               <li>
                                  <h6>Payment Method:</h6>
                                  <p>Bank transfer, Cash</p>
                               </li>
 
                               <li>
                               <h6><span class="pfeedback"> positive</span>  <span>
                                  <a href="{{url('store-profile',$property->userList->id)}}" class="tblack"> Rating ( 
                                  <i class="fa fa-star rating"></i> 
                                  <i class="fa fa-star rating"></i>
                                <i class="fa fa-star rating"></i> 
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-star empty"></i> )</a>
                               </span></h6>
                               </li>
 
 
                            </ul>
                            <!-- <div align="right">
                               <a href="#!" class="clink mt20"> <u>View Seller's other location</u></a>
                            </div> -->
                         </div>
                      </div>
 
 
                   </div>
 
 
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
 
 
 <script>
 
 $('.wishlist').on('click', function() {
             var id = $(this).data('id');
             $.ajax({
                 type: "post",
                 url: base_url + "wishlist",
                 data: {
                     id: id
                 },
                 success: function(res) {
                    $('.alert-msg').html(res[0]);
                    $('.wishlist').html(res[1]);
                    $('.alert-msg').addClass("alert-success");
 
                 },
                 error: function() {
 
                 }
             })
         })
 
 
         new Clipboard('.copy_link', {
       text: function() {
          return window.location.href;
     
         }
  
       });
 
      $(".copy_link").click(function(){
      $('.alert-link-copied').html("Link copied");
      $('.alert-link-copied').addClass("link-copied-success");
       })
 </script>
 
 
 
     
 @endsection
 
 
 