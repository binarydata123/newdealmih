<script>

import Layout from "./layouts/header";
export default{
   components:{Layout},
};
</script>
<template> 
 <section>
     <section class="banner-part">
         <div class="container">
            <div class="banner-content">
               <h1>You can #Buy, #Rent, #Booking anything from here.</h1>
               <p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more in the world.</p>
               <router-link :to="{ path: '/ads' }" class="btn btn-outline"><i class="fas fa-eye"></i><span>Show all ads</span></router-link>
            </div>
         </div>
      </section>


      <section class="suggest-part">
         <div class="container">
            <div class="suggest-slider slider-arrow">
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/automobile.png" alt="car">
                  <h6>automobile</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/furniture.png" alt="furniture">
                  <h6>furniture</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/properties.png" alt="house">
                  <h6>properties</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/fashion.png" alt="food">
                  <h6>fashion</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/electronics.png" alt="cycle">
                  <h6>electronics</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/hospitality.png" alt="clothes">
                  <h6>hospitality</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/gadgets.png" alt="computer">
                  <h6>gadgets</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/education.png" alt="phone">
                  <h6>education</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/software.png" alt="scooter">
                  <h6>software</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/food.png" alt="television">
                  <h6>food</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/services.png" alt="truck">
                  <h6>services</h6>
                  <p>(4,521) ads</p>
               </a>
               <a href="#!" class="suggest-card">
                  <img src="website/images/suggest/animals.png" alt="pet">
                  <h6>animals</h6>
                  <p>(4,521) ads</p>
               </a>
            </div>
         </div>
      </section>


      

      <section class="section recomend-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-center-heading">
                     <h2>Our Recommend <span>Ads</span></h2>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="recomend-slider slider-arrow">
                     <div class="product-card">
                          <a href="listing-detail.html">
                        <div class="product-media">
                           <div class="product-img"><img src="website/images/product/01.jpg" alt="product"></div>
                           <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
                           <div class="product-type"><span class="flat-badge booking">booking</span></div>
                       
                        </div>
                     </a>

                        <div class="product-content">
                           <ol class="breadcrumb product-category">
                              <li><i class="fas fa-tags"></i></li>
                              <li class="breadcrumb-item"><a href="#">Luxury</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Duplex House</li>
                           </ol>
                           <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                           <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                           <div class="product-info">
                              <h5 class="product-price">$1500<span>/Per Day</span></h5>
                              <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                           </div>
                        </div>
                     </div>
                     <div class="product-card">

                        <a href="listing-detail.html">
                        <div class="product-media">
                           <div class="product-img"><img src="website/images/product/03.jpg" alt="product"></div>
                           <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
                           <div class="product-type"><span class="flat-badge sale">sale</span></div>
                        
                        </div>
                     </a>


                        <div class="product-content">
                           <ol class="breadcrumb product-category">
                              <li><i class="fas fa-tags"></i></li>
                              <li class="breadcrumb-item"><a href="#">stationary</a></li>
                              <li class="breadcrumb-item active" aria-current="page">books</li>
                           </ol>
                           <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                           <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                           <div class="product-info">
                              <h5 class="product-price">$470<span>/fixed</span></h5>
                              <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                           </div>
                        </div>
                     </div>


                     <div class="product-card">
                        <a href="listing-detail.html">
                        <div class="product-media">
                           <div class="product-img"><img src="website/images/product/10.jpg" alt="product"></div>
                           <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
                           <div class="product-type"><span class="flat-badge rent">rent</span></div>
                      
                        </div>
                        </a>

                        <div class="product-content">
                           <ol class="breadcrumb product-category">
                              <li><i class="fas fa-tags"></i></li>
                              <li class="breadcrumb-item"><a href="#">automobile</a></li>
                              <li class="breadcrumb-item active" aria-current="page">private car</li>
                           </ol>
                           <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                           <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                           <div class="product-info">
                              <h5 class="product-price">$3300<span>/per month</span></h5>
                              <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                           </div>
                        </div>
                     </div>


                     <div class="product-card">
                        <a href="listing-detail.html">
                        <div class="product-media">
                           <div class="product-img"><img src="website/images/product/09.jpg" alt="product"></div>
                           <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
                           <div class="product-type"><span class="flat-badge sale">sale</span></div>
                           
                        </div>
                        </a>
                        <div class="product-content">
                           <ol class="breadcrumb product-category">
                              <li><i class="fas fa-tags"></i></li>
                              <li class="breadcrumb-item"><a href="#">animals</a></li>
                              <li class="breadcrumb-item active" aria-current="page">cat</li>
                           </ol>
                           <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                           <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                           <div class="product-info">
                              <h5 class="product-price">$900<span>/Negotiable</span></h5>
                              <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                           </div>
                        </div>
                     </div>


                     <div class="product-card">
                        <a href="listing-detail.html">
                        <div class="product-media">
                           <div class="product-img"><img src="website/images/product/02.jpg" alt="product"></div>
                           <div class="cross-vertical-badge product-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
                           <div class="product-type"><span class="flat-badge sale">sale</span></div>
                           
                        </div>
                        </a>
                        <div class="product-content">
                           <ol class="breadcrumb product-category">
                              <li><i class="fas fa-tags"></i></li>
                              <li class="breadcrumb-item"><a href="#">fashion</a></li>
                              <li class="breadcrumb-item active" aria-current="page">shoes</li>
                           </ol>
                           <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                           <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                           <div class="product-info">
                              <h5 class="product-price">$384<span>/fixed</span></h5>
                              <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="center-50"><a href="#!" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all recommend</span></a></div>
               </div>
            </div>
         </div>
      </section>

      <section class="section category-part">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="section-center-heading">
                    <h2>Top Categories by <span>Ads</span></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/electronics.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>electronics</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>television</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>Generetor</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>Washing machine</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>air condition</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>iron</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/gadgets.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>gadgets</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>computer</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>mobile</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>camera</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dron</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>airphone</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/furnitures.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>furnitures</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>dyning table</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>chair</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>sofa</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>tea table</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dressing table</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/animals.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>animals</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>dyning table</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>chair</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>sofa</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>tea table</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dressing table</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/fashions.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>fashions</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>jeans</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>underware</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>shirt</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>jacket</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>shorts</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/motorbikes.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>motorbikes</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>dyning table</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>chair</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>sofa</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>tea table</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dressing table</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/properties.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>properties</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>dyning table</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>chair</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>sofa</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>tea table</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dressing table</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                 <div class="category-card">
                    <div class="category-head">
                       <img src="website/images/category/automobiles.jpg" alt="category">
                       <a href="#!" class="category-content">
                          <h4>automobiles</h4>
                          <p>(3678)</p>
                       </a>
                    </div>
                    <ul class="category-list">
                       <li>
                          <a href="#">
                             <h6>dyning table</h6>
                             <p>(34)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>chair</h6>
                             <p>(24)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>sofa</h6>
                             <p>(12)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>tea table</h6>
                             <p>(19)</p>
                          </a>
                       </li>
                       <li>
                          <a href="#">
                             <h6>dressing table</h6>
                             <p>(56)</p>
                          </a>
                       </li>
                    </ul>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-12">
                 <div class="center-20"><a href="#!" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all categories</span></a></div>
              </div>
           </div>
        </div>
     </section>

    

     <section class="section trend-part pad60">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section-center-heading">
                  <h2>Popular Trending <span>Ads</span></h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
               </div>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/01.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge booking">booking</span></div>
                  
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">property</a></li>
                        <li class="breadcrumb-item active" aria-current="page">house</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$974<span>/per day</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/02.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge sale">sale</span></div>
                    
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">fashion</a></li>
                        <li class="breadcrumb-item active" aria-current="page">shoes</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$384<span>/fixed</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/03.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge sale">sale</span></div>
                     
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">stationary</a></li>
                        <li class="breadcrumb-item active" aria-current="page">book</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$78<span>/Negotiable</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/04.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge sale">sale</span></div>
                     
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">electronics</a></li>
                        <li class="breadcrumb-item active" aria-current="page">television</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$756<span>/fixed</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/05.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge sale">sale</span></div>
                     
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">gadget</a></li>
                        <li class="breadcrumb-item active" aria-current="page">headphone</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$245<span>/Negotiable</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-11 col-lg-8 col-xl-6">
               <div class="product-card standard">
                  <div class="product-media">
                     <div class="product-img"><img src="website/images/product/06.jpg" alt="product"></div>
                     <div class="cross-vertical-badge product-badge"><i class="fas fa-bolt"></i><span>trending</span></div>
                     <div class="product-type"><span class="flat-badge rent">rent</span></div>
                     
                  </div>
                  <div class="product-content">
                     <ol class="breadcrumb product-category">
                        <li><i class="fas fa-tags"></i></li>
                        <li class="breadcrumb-item"><a href="#">automobile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">cycle</li>
                     </ol>
                     <h5 class="product-title"><a href="#!">Lorem ipsum dolor sit amet consect adipisicing elit</a></h5>
                     <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>Austin, Texas</span><span><i class="fas fa-clock"></i>30 min ago</span></div>
                     <div class="product-info">
                        <h5 class="product-price">$75<span>/per hour</span></h5>
                        <div class="product-btn"><button type="button" title="Wishlist" class="far fa-heart"></button></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="center-20"><a href="#!" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all trend</span></a></div>
            </div>
         </div>
      </div>
   </section>



      
     
      <section class="blog-part">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="section-center-heading">
                     <h2>Read Our <span>Recent Articles</span></h2>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit aspernatur illum vel sunt libero voluptatum repudiandae veniam maxime tenetur.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="blog-slider slider-arrow">
                     <div class="blog-card">
                        <div class="blog-img">
                           <img src="website/images/blog/01.jpg" alt="blog">
                           <div class="blog-overlay"><span class="marketing">Marketing</span></div>
                        </div>
                        <div class="blog-content">
                           <a href="#" class="blog-avatar"><img src="website/images/avatar/01.jpg" alt="avatar"></a>
                           <ul class="blog-meta">
                              <li>
                                 <i class="fas fa-user"></i>
                                 <p><a href="#">John Doe</a></p>
                              </li>
                              <li>
                                 <i class="fas fa-clock"></i>
                                 <p>02 Feb 2021</p>
                              </li>
                           </ul>
                           <div class="blog-text">
                              <h4><a href="#!">Lorem ipsum dolor sit amet eius minus elit cum quaerat volupt.</a></h4>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum perspiciatis...</p>
                           </div>
                           <a href="#!" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                     </div>
                     <div class="blog-card">
                        <div class="blog-img">
                           <img src="website/images/blog/02.jpg" alt="blog">
                           <div class="blog-overlay"><span class="advertise">advertise</span></div>
                        </div>
                        <div class="blog-content">
                           <a href="#" class="blog-avatar"><img src="website/images/avatar/02.jpg" alt="avatar"></a>
                           <ul class="blog-meta">
                              <li>
                                 <i class="fas fa-user"></i>
                                 <p><a href="#">Rachel</a></p>
                              </li>
                              <li>
                                 <i class="fas fa-clock"></i>
                                 <p>02 Feb 2021</p>
                              </li>
                           </ul>
                           <div class="blog-text">
                              <h4><a href="#!">Lorem ipsum dolor sit amet eius minus elit cum quaerat volupt.</a></h4>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum perspiciatis...</p>
                           </div>
                           <a href="#!" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                     </div>
                     <div class="blog-card">
                        <div class="blog-img">
                           <img src="website/images/blog/03.jpg" alt="blog">
                           <div class="blog-overlay"><span class="safety">safety</span></div>
                        </div>
                        <div class="blog-content">
                           <a href="#" class="blog-avatar"><img src="website/images/avatar/03.jpg" alt="avatar"></a>
                           <ul class="blog-meta">
                              <li>
                                 <i class="fas fa-user"></i>
                                 <p><a href="#">John Doe</a></p>
                              </li>
                              <li>
                                 <i class="fas fa-clock"></i>
                                 <p>02 Feb 2021</p>
                              </li>
                           </ul>
                           <div class="blog-text">
                              <h4><a href="#!">Lorem ipsum dolor sit amet eius minus elit cum quaerat volupt.</a></h4>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum perspiciatis...</p>
                           </div>
                           <a href="#!" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                     </div>
                     <div class="blog-card">
                        <div class="blog-img">
                           <img src="website/images/blog/04.jpg" alt="blog">
                           <div class="blog-overlay"><span class="security">security</span></div>
                        </div>
                        <div class="blog-content">
                           <a href="#" class="blog-avatar"><img src="website/images/avatar/04.jpg" alt="avatar"></a>
                           <ul class="blog-meta">
                              <li>
                                 <i class="fas fa-user"></i>
                                 <p><a href="#">Steve Rogers</a></p>
                              </li>
                              <li>
                                 <i class="fas fa-clock"></i>
                                 <p>02 Feb 2021</p>
                              </li>
                           </ul>
                           <div class="blog-text">
                              <h4><a href="#!">Lorem ipsum dolor sit amet eius minus elit cum quaerat volupt.</a></h4>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus veniam ad dolore labore laborum perspiciatis...</p>
                           </div>
                           <a href="#!" class="blog-read"><span>read more</span><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="blog-btn"><a href="#!" class="btn btn-inline"><i class="fas fa-eye"></i><span>view all blogs</span></a></div>
               </div>
            </div>
         </div>
      </section>
 </section>

       
</template>