@extends('website.layout.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">

@endsection
@section('content')


  <!-------new------------>
  <section id="services" class="services section-bg mt10">
         <div class="container-fluid mt60">
            <!-- <p class="fs12 mb20"><a href="{{ url('/') }}">Home</a>
               <span class="cblue">{{ \Request::getRequestUri() }}</span> </p> -->
          
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

                 <div class="common-card bshadow" id="review">
   <div class="card-header">
      <h5 class="card-title">Reviews (2)</h5>
   </div>
   <div class="ad-details-review">
      <ul class="review-list">
         <li class="review-item">
            <div class="review-user">
               <div class="review-head">
                  <div class="review-profile">
                     <a href="#" class="review-avatar"><img src="{{url('public/website/images/user.png')}}" alt="review"></a>
                     <div class="review-meta">
                        <h6><a href="#">Jane Doe -</a><span>June 02, 2020</span></h6>
                        <ul>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li>
                              <h5>- for delivery system</h5>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.</p>
            </div>
         </li>
         <li class="review-item">
            <div class="review-user">
               <div class="review-head">
                  <div class="review-profile">
                     <a href="#" class="review-avatar"><img src="{{url('public/website/images/user.png')}}" alt="review"></a>
                     <div class="review-meta">
                        <h6><a href="#">John Doe -</a><span>June 02, 2020</span></h6>
                        <ul>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star active"></i></li>
                           <li><i class="fas fa-star"></i></li>
                           <li>
                              <h5>- for product quality</h5>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <p class="review-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit Non quibusdam harum ipsum dolor cumque quas magni voluptatibus cupiditate minima quis.</p>
            </div>
          
         </li>
      </ul>
      <form class="review-form">
         <div class="star-rating"><input type="radio" name="rating" id="star-1"><label for="star-1"></label><input type="radio" name="rating" id="star-2"><label for="star-2"></label><input type="radio" name="rating" id="star-3"><label for="star-3"></label><input type="radio" name="rating" id="star-4"><label for="star-4"></label><input type="radio" name="rating" id="star-5"><label for="star-5"></label></div>
         <div class="review-form-grid">
            <div class="form-group"><input type="text" class="form-control" placeholder="Name"></div>
            <div class="form-group"><input type="email" class="form-control" placeholder="Email"></div>
            <div class="form-group">
               <select class="form-control custom-select">
                  <option selected="">Qoute</option>
                  <option value="1">delivery system</option>
                  <option value="2">product quality</option>
                  <option value="3">payment issue</option>
               </select>
            </div>
         </div>
         <div class="form-group"><textarea class="form-control" placeholder="Describe"></textarea></div>
         <button type="submit" class="btn btn-inline review-submit"><i class="fas fa-tint"></i><span>drop your review</span></button>
      </form>
   </div>
</div>
           
                 
</div>










            </div>
            <div class="col-md-3">
            <img src="{{url('public/website/images/ad.png')}}" alt="review">
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
@endsection