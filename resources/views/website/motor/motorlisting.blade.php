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

                          
                            <h3>Motor</h3>

                          
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

<!-----------------lising---------------->

<div class="row">
                     <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                        <div class="product-card">
                           <a href="listing-detail.html">
                         <div class="product-media">
                            <div class="product-img"><img src="{{ url('public/website/images/dea/motor/c1.jpg') }}" alt="product"></div>
                           
                            <div class="product-type">
                               <div class="product-btn">
                               <button type="button" title="Wishlist" class="fa fa-heart"></button>
                            </div>
                            </div>
                            
                          
                        
                         </div>
                      </a>
 
                      <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li>
                                            <p class="product-price tblak"> रू</p>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#"> 10,000</a></li>

                                    </ol>

                                    <div class="product-meta"><span>Maruthi Suzuki Ritz</span><br>
                                        <span class="s-used">Used</span>  
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Bhaktapur</span>
                                        <div> <span> Closes: Mon, 19 July</span></div>
                                    </div>
                                </div>
                      </div>
                     </div>
                     <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                        <div class="product-card">
                           <a href="listing-detail.html">
                         <div class="product-media">
                            <div class="product-img"><img src="{{ url('public/website/images/dea/motor/c1.jpg') }}" alt="product"></div>
                           
                            <div class="product-type">
                               <div class="product-btn">
                               <button type="button" title="Wishlist" class="fa fa-heart"></button>
                            </div>
                            </div>
                            
                          
                        
                         </div>
                      </a>
 
                      <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li>
                                            <p class="product-price tblak"> रू</p>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#"> 10,000</a></li>

                                    </ol>

                                    <div class="product-meta"><span>Maruthi Suzuki Ritz</span><br>
                                        <span class="s-used">Used</span>  
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Bhaktapur</span>
                                        <div> <span> Closes: Mon, 19 July</span></div>
                                    </div>
                                </div>
                      </div>
                     </div>
                     <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 pr0 pl0">
                        <div class="product-card">
                           <a href="listing-detail.html">
                         <div class="product-media">
                            <div class="product-img"><img src="{{ url('public/website/images/dea/motor/c1.jpg') }}" alt="product"></div>
                           
                            <div class="product-type">
                               <div class="product-btn">
                               <button type="button" title="Wishlist" class="fa fa-heart"></button>
                            </div>
                            </div>
                            
                          
                        
                         </div>
                      </a>
 
                      <div class="product-content">
                                    <ol class="breadcrumb product-category">
                                        <li>
                                            <p class="product-price tblak"> रू</p>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#"> 10,000</a></li>

                                    </ol>

                                    <div class="product-meta"><span>Maruthi Suzuki Ritz</span><br>
                                        <span class="s-used">Used</span>  
                                    </div>
                                    <div class="product-info">
                                        <span><i class="fas fa-map-marker-alt"></i> Bhaktapur</span>
                                        <div> <span> Closes: Mon, 19 July</span></div>
                                    </div>
                                </div>
                      </div>
                     </div>
                   
                   
                     
                  </div>


<!---------------listing----------------->

                         



                        
                    
                  </div>
                  

             
           
   
              
   
            
                         


               </div>
            </div>
         </div>
      </section>


@endsection