<style>
   .store-img{
      display: flex;
   }
   @media(max-width: 767px){
      .store-img{
      padding-left: 0;
   }
   img.apple-img{
      width: 125px !important;
      margin-bottom: 10px;
   }
   }
   i.fa.fa-linkedin {
    background: #567df4;
    color: #fff;
}
</style>
     <footer class="footer-part">
        <div class="container">
           <div class="row">
              <div class="container">
                 <div class="footer-end-content logbtn">
                    <a href="{{ url('/') }}" class="sidebar-logo"><img src="{{url('public/website/images/footer-logo.png')}}" alt="logo"></a>
                     <!-- <ul class="store-img">
                        <li class="mr-3">
                        <a href="https://www.apple.com/in/app-store/"><img src="{{url('/images/apple.png')}}" style="width: 150px;" class="apple-img"></a>
                     </li>
                     <li>
                        <a href="https://play.google.com/store/apps/details?id=com.dealmih.web&hl=en-GB"><img src="{{url('/images/google.png')}}" style="width: 150px;" class="apple-img"></a>
                     </li>
                     </ul> -->
                    <ul class="footer-social">
                        <li><a href="https://www.facebook.com/dealmih/" target="fb"><i class="fa fa-facebook-f"></i></a></li> 
                       <li><a href="https://twitter.com/Dealmih_com" target="tw"><i class="fab fa-twitter"></i></a></li>
                       <li><a href="https://www.youtube.com/@dealmihnepal9610" target="yt"><i class="fab fa-youtube"></i></a></li>
                       <li><a href="https://www.instagram.com/dealmih_com/" target="inst"><i class="fa fa-instagram"></i></a></li>
                       <li><a class="linkedin1" href="https://nz.linkedin.com/in/ravi-yadav-772720133" target="ti"><i class="fa fa-linkedin"></i></a></li> 
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Marketplace</h3>
                    <ul class="footer-widget">

                    
                       <li><a href="{{url('marketplace')}}">Latest deals</a></li>
                       <li><a href="{{url('marketplace')}}">Closing soon</a></li>
<!--                        <li><a href="{{url('stores')}}">Store</a></li>
 -->                      
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Jobs</h3>
                   

                    <ul class="footer-widget">
                       <li><a href="{{url('jobs')}}">Browse Categories</a></li>
                       <li><a href="{{url('jobs')}}">Advertiser advice</a></li>
                       <li><a href="{{url('jobs')}}">New Jobs</a></li>
                       
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Motors</h3>
                  
                    <ul class="footer-widget">
                       <li><a href="{{url('motor')}}">Cars</a></li>
                       <li><a href="{{url('motor')}}">Motorbikes</a></li>
                       <li><a href="{{url('motor')}}">Car Buying Advice</a></li>
                      
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Property</h3>

                 
                    <ul class="footer-widget">
                       <li><a href="{{url('property')}}">Businesses For Sale</a></li>
                       <li><a href="{{url('property')}}">Residential For Sell</a></li>
                       <li><a href="{{url('property')}}">Commercial for Sell</a></li>
                      
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Services</h3>
                  
                    <ul class="footer-widget">
                       <li><a href="{{url('services')}}">Domestic Services</a></li>
                       <li><a href="{{url('services')}}">Labour</a></li>
                      
                       <li><a href="{{url('services')}}">Legal</a></li>
                       
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
                 <div class="footer-content">
                    <h3>Quick Links</h3>
                    <ul class="footer-widget">
                    <li><a href="{{url('about')}}">About us</a></li>
                    <li><a href="{{url('contact')}}">Contact us</a></li>
                   

                    <li><a href="{{url('advertising')}}">Advertising</a></li>
                    <li><a href="{{url('help')}}">Help</a></li>
                    <!-- <li><a href="https://www.youtube.com/watch?v=sgZiH737aFQ">Help</a></li> -->
                   

               


                       <!-- <li><a href="#!">Help</a></li>
                       <li><a href="#!">Announcements</a></li>
                       <li><a href="#!">Trust & safety</a></li>
                       <li><a href="#!">Seller information</a></li> -->
                    </ul>
                 </div>
              </div>

              {{-- <div class="col-md-4">
              <div class="footer-content">
              <h3>Our Location</h3>
              <p class="twhite"><i class="fa fa-map-marker" aria-hidden="true"></i> 1 Imadol, Mahalaxmi, Lalitpur, Nepal</p>
               </div>
               </div> --}}

               {{-- <div class="col-md-5">
               <div class="footer-content">
               <h3>Make a Call</h3>
               <p class="twhite"><i class="fa fa-phone" aria-hidden="true"></i> what's app, Viber & IMO only : +977-9746825000</p>
               </div>
               </div> --}}

               {{-- <div class="col-md-3">
               <div class="footer-content">
               <h3>Send Mail</h3>
               <p class="twhite"><i class="fa fa-envelope" aria-hidden="true"></i> support@dealmih.com</p>
               </div>
               </div> --}}

           </div>
        </div>
        <div class="footer-end mt10">
           <div class="container">
              <div class="footer-end-content">
                 <p>Copyright © {{ date("Y")}} EETHAS Groups Pvt.Ltd</p>

                 <p><a href="{{url('terms')}}" class="twhite">Terms & Conditions</a> | <a href="{{url('privacy')}}" class="twhite">Privacy & Policy</a> | <a href="{{url('feedback')}}" class="twhite">Feedback</a></p>

                 


                 <!-- div class="footer-right"> -->
                    <!-- <h5>We Accept : </h5>  <img src="{{url('public/website/images/pay-card/02.jpg')}}" width="30">
                    <img src="{{url('public/website/images/pay-card/mc.png')}}">
                    <img src="{{url('public/website/images/pay-card/up.png')}}" width="30">
                    <img src="{{url('public/website/images/pay-card/bt.png')}}"> -->
                  </span>
                    <!-- <ul class="footer-social">
                       <li><a href="#!"><i class="fa fa-facebook-f"></i></a></li>
                       <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                       <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
               
                    </ul> -->
                 <!-- </div> -->
                 
              </div>
           </div>
        </div>
     </footer>
     <div class="modal fade" id="currency">
        <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
              <div class="modal-header">
                 <h4>Choose a Currency</h4>
                 <button class="fas fa-times" data-dismiss="modal"></button>
              </div>
              <div class="modal-body"><button class="modal-link active">United States Doller (USD) - $</button><button class="modal-link">Euro (EUR) - €</button><button class="modal-link">British Pound (GBP) - £</button><button class="modal-link">Australian Dollar (AUD) - A$</button><button class="modal-link">Canadian Dollar (CAD) - C$</button></div>
           </div>
        </div>
     </div>
     <div class="modal fade" id="language">
        <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
              <div class="modal-header">
                 <h4>Choose a Language</h4>
                 <button class="fas fa-times" data-dismiss="modal"></button>
              </div>
              <div class="modal-body"><button class="modal-link active">English</button><button class="modal-link">bangali</button><button class="modal-link">arabic</button><button class="modal-link">germany</button><button class="modal-link">spanish</button></div>
           </div>
        </div>
     </div>
       <script src="{{url('public/website/js/vendor/jquery-1.12.4.min.js')}}"></script>
       @yield('js')
       <script src="{{url('public/website/js/vendor/popper.min.js')}}"></script>
       <script src="{{url('public/website/js/vendor/bootstrap.min.js')}}"></script>
       <script src="{{url('public/website/js/vendor/slick.min.js')}}"></script>
       <script src="{{url('public/website/js/custom/slick.js')}}"></script>
       <script src="{{url('public/website/js/custom/main.js')}}"></script>
       <script src="{{url('public/website/js/notifications/Lobibox.js')}}"></script>
       <script src="{{url('public/website/js/classified/submit-form.js')}}"></script>
       <script src="{{url('public/website/js/classified/login-form.js')}}"></script>
       <script src="{{url('public/website/js/classified/rangeSlider.js')}}"></script>

       <script src="{{url('public/website/js/vendor/emojionearea.min.js')}}"></script>
       <script src="{{url('public/website/js/custom/emojionearea.js')}}"></script>

       

       <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

       

       <script>
        var base_url = '{!! url('/') !!}/';
  
  
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      </script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> -->

  

  <script src="{{url('public/website/js/custom/ekko-lightbox.js')}}"></script>

<script>
   $("[id^=carousel-thumbs]").carousel({
	interval: false
});

/** Pause/Play Button **/
$(".carousel-pause").click(function () {
	var id = $(this).attr("href");
	if ($(this).hasClass("pause")) {
		$(this).removeClass("pause").toggleClass("play");
		$(this).children(".sr-only").text("Play");
		$(id).carousel("pause");
	} else {
		$(this).removeClass("play").toggleClass("pause");
		$(this).children(".sr-only").text("Pause");
		$(id).carousel("cycle");
	}
	$(id).carousel;
});

/** Fullscreen Buttun **/
$(".carousel-fullscreen").click(function () {
	var id = $(this).attr("href");
	$(id).find(".active").ekkoLightbox({
		type: "image"
	});
});

if ($("[id^=carousel-thumbs] .carousel-item").length < 2) {
	$("#carousel-thumbs [class^=carousel-control-]").remove();
	$("#carousel-thumbs").css("padding", "0 5px");
}

$("#carousel").on("slide.bs.carousel", function (e) {
	var id = parseInt($(e.relatedTarget).attr("data-slide-number"));
	var thumbNum = parseInt(
		$("[id=carousel-selector-" + id + "]")
			.parent()
			.parent()
			.attr("data-slide-number")
	);
	$("[id^=carousel-selector-]").removeClass("selected");
	$("[id=carousel-selector-" + id + "]").addClass("selected");
	$("#carousel-thumbs").carousel(thumbNum);
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$("#pricerange").rangeSlider(
  {
    // or 'vertical'
    direction: "horizontal",

    // or 'interval'
    type: "interval",

    // or 'red'
    skin: "green",

    // shows settings panel
    settings: false,

    // shows range bar
    bar: true,

    // shows labels
    tip: true,

    // shows scales
    scale: false
  },
  {
    // min value
    min: 0,

    // max value
    max: 100000,

    // step size
    step: 100,

    // predefined range
    values: [200, 1000]// slider settings here
  }
);


</script>



  
    </body>
  
    </html>