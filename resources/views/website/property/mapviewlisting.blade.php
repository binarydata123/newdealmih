@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<section class="inner-section ad-list-part mt40">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <p class="mb20 fs14">Home/Property/ <a href="#!">List View </a></p>
               </div>
               <div class="col-lg-4 col-xl-3">
                  <div class="row">

                     <div class="col-md-6 col-lg-12">
                        <div class="product-widget">
                           <h4 class="product-widget-title fils">Filters</h4>
                           <form class="product-widget-form formpad">
                              <h6>Categories</h6>
                              <ul class="product-widget-list product-widget-scroll">
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek9"></div>
                                    <label class="product-widget-label" for="chcek9"><span class="product-widget-text">Antiques & Collectables</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek10"></div>
                                    <label class="product-widget-label" for="chcek10"><span class="product-widget-text">Arts</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek11"></div>
                                    <label class="product-widget-label" for="chcek11"><span class="product-widget-text">Baby gear</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek12"></div>
                                    <label class="product-widget-label" for="chcek12"><span class="product-widget-text">Books</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek13"></div>
                                    <label class="product-widget-label" for="chcek13"><span class="product-widget-text">Building & renovation</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek14"></div>
                                    <label class="product-widget-label" for="chcek14"><span class="product-widget-text">Business,farming & Industry</span></label>
                                 </li>
                                
                              </ul>

                              <hr>
                              <h6>Category Art</h6>
                              <ul class="product-widget-list product-widget-scroll">
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek9"></div>
                                    <label class="product-widget-label" for="chcek9"><span class="product-widget-text">Antiques & Collectables</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek10"></div>
                                    <label class="product-widget-label" for="chcek10"><span class="product-widget-text">Arts</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek11"></div>
                                    <label class="product-widget-label" for="chcek11"><span class="product-widget-text">Baby gear</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek12"></div>
                                    <label class="product-widget-label" for="chcek12"><span class="product-widget-text">Books</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek13"></div>
                                    <label class="product-widget-label" for="chcek13"><span class="product-widget-text">Building & renovation</span></label>
                                 </li>
                                 <li class="product-widget-item">
                                    <div class="product-widget-checkbox"><input type="checkbox" id="chcek14"></div>
                                    <label class="product-widget-label" for="chcek14"><span class="product-widget-text">Business,farming & Industry</span></label>
                                 </li>
                                
                              </ul>
                              
                           </form>
                        </div>
                     </div>
                     
                  
                  
                  </div>
               </div>
               <div class="col-lg-8 col-xl-9">
                  <div class="row mb20">
                     <div class="col-lg-9">
                        <div class="header-filter">

                          
                            <h3>Latest Flatmates Wanted</h3>

                          
</div>
</div>



<div class="col-lg-3"><div class="filter-short">
                              <!-- <label class="filter-label">Sort by :</label> -->
                              <select class="custom-select filter-select">
                                 <option selected>New & Used</option>
                                 <option value="3">trending</option>
                                 <option value="1">featured</option>
                                 <option value="2">recommend</option>
                              </select>
                           </div>
</div>

                          



                        
                    
                  </div>

                  <!------------------>

                  <div class="row ad-standard">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                
                                <div class="product-card standard image-heg bshadow mb20">
                                    <div class="product-media">

                                        <div class="product-img"><img src="{{url('public/website/images/product/07.jpg')}}" alt="product"></div>


                                    </div>
                                    <div class="product-content">

                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><a href="#">Parnell, 5 bedrooms</a></h5>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <li class="breadcrumb-item active s-success" aria-current="page">Available Now
                                                </li>
                                            </ol>
                                            <h5 class="ffs16">Listed Today</h5>
                                        </div>
                                        <div class="product-meta"><span class="mfs14l">Hawke Bay</span>&nbsp;</div>
                                        <div class="product-meta"><span class="fs18l4">रू 1,000 per week
                                                </span></div>
                                        <div class="product-info text-cont">
                                           
                                            
                                          
                                                <span class="fs16 tcolor1"><i class="fa fa-users"></i> 2 existing flatmates</span>
                                            </div>
                                        </div>

                                    </div>

                                    
                              
                              
                              
                              
                                    <div class="product-card standard image-heg bshadow mb20">
                                    <div class="product-media">

                                        <div class="product-img"><img src="{{url('public/website/images/product/07.jpg')}}" alt="product"></div>


                                    </div>
                                    <div class="product-content">

                                        <div class="product-info text-cont">
                                            <ol class="breadcrumb product-category">
                                                <h5 class="product-title"><a href="#">Parnell, 5 bedrooms</a></h5>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <li class="breadcrumb-item active s-success" aria-current="page">Available Now
                                                </li>
                                            </ol>
                                            <h5 class="ffs16">Listed Today</h5>
                                        </div>
                                        <div class="product-meta"><span class="mfs14l">Hawke Bay</span>&nbsp;</div>
                                        <div class="product-meta"><span class="fs18l4">रू 1,000 per week
                                                </span></div>
                                        <div class="product-info text-cont">
                                           
                                            
                                          
                                                <span class="fs16 tcolor1"><i class="fa fa-users"></i> 2 existing flatmates</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>




                                </div>



                            </div>

                            

                        </div>

                        

                  <!------------------->
    
                  
           
               

                    </div>




                </div>
                  
                   
         </div>
      </section>


@endsection