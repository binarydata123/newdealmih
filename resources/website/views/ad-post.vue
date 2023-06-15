<template>
    <section>
        <section class="single-banner dashboard-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="single-content">
                     <h2>Post Your Ad</h2>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{path:'/'}">Home </router-link></li>
                        <li class="breadcrumb-item active" aria-current="page">Post Your Ad</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="dash-header-part">
         <div class="container">
            <div class="dash-header-card">
               <div class="row">
                  <div class="col-lg-5">
                     <div class="dash-header-left">
                        <div class="dash-avatar"><a href="#"><img src="website/images/avatar/01.jpg" alt="avatar"></a></div>
                        <div class="dash-intro">
                           <h4><a href="#">Binny</a></h4>
                           <h5>new seller</h5>
                           <ul class="dash-meta">
                              <li><i class="fas fa-phone-alt"></i><span>(123) 000-1234</span></li>
                              <li><i class="fas fa-envelope"></i><span>binny@gmail.com</span></li>
                              <li><i class="fas fa-map-marker-alt"></i><span>Los Angeles, West America</span></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-7">
                     <div class="dash-header-right">
                        <div class="dash-focus dash-list">
                           <h2>24</h2>
                           <p>My ads</p>
                        </div>
                        <div class="dash-focus dash-book">
                           <h2>33</h2>
                           <p>Notifications</p>
                        </div>
                        <div class="dash-focus dash-rev">
                           <h2>2</h2>
                           <p>Messages</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="dash-header-alert alert fade show">
                        <p>From your account dashboard. you can easily check &amp; view your recent orders, manage your shipping and billing addresses and Edit your password and account details.</p>
                        <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="dash-menu-list">
                        <ul>
                          
                          
                         
                          
                           <li><a href="dashboard.html">Dashboard</a></li>
                           <li><a href="profile.html">Profile</a></li>
                           <li><a href="ad-post.html" class="active">Post Your Ad</a></li>
                           <li><a href="my-ads.html">My ads</a></li>
                           <li><a href="message.html">messages</a></li>
                           <li><a href="setting.html">settings</a></li>
                          
                          
                        
                           <li><a href="login.html">logout</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
            <section class="adpost-part">
                           <div class="container">
                              <div class="adpost-card">

                                 <div class="adpost-title">
                                    <h3>Ad Information</h3>
                                 </div>

                              <div class="row justify-content-center">


                                 


                                <div class="col-md-10 text-center p-0 mt-3 mb-2">
                                 <div class="card px-0 pb-0 mb-3">
                                  
                                   <p>Post your Ad details here</p>
                                   <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                      <li class="active" id="account"><strong>Step 1</strong></li>
                                      <li id="personal"><strong>Step 2</strong></li>
                                      <li id="payment"><strong>Step 3</strong></li>
                                      <li id="confirm"><strong>Post</strong></li>
                                    </ul>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> <br> <!-- fieldsets -->
                                  
                                  <!------------------->
                                    <fieldset>
                                      <div class="form-card">
                                       <div class="row">
                                         <div class="col-7">
                                          <h2 class="fs-title">Choose Category:</h2>
                                         </div>
                                         <div class="col-5">
                                          <h2 class="steps">Step 1 - 4</h2>
                                         </div>
                                       </div>

                                   


                                       <!-------------->
                                       <div id="menu">
                                          <ul class="topUl">
                                         
                                            <li class="ddList">
                                              <a title="Link2"><i class="fas fa-car"></i> Vehicles</a>
                                              <ul>
                                                <li class="ddList2">
                                                  <a title="Cars">Cars</a>
                                                 
                                                </li>
                                                <li class="ddList2">
                                                  <a title="Bikes">Bikes</a>
                                                
                                                </li>
                                                <li class="ddList2">
                                                  <a title="Commercial Vehicles">Commercial Vehicles</a>
                                                
                                                </li>
                                                <li class="ddList2">
                                                  <a title="Spare Parts">Spare Parts</a>
                                               
                                                </li>
                                              </ul>
                                            </li>
                                            <li class="ddList">
                                              <a href="#!" title="Link3"><i class="fas fa-building"></i> Properties</a>
                                              <ul>
                                               
                                                
                                                
                                               
                                               
                                                <li class="ddList2">
                                                  <a title=" For Sale: Houses & Apartments"> For Sale: Houses & Apartments</a>
                                               
                                                </li>
                                                <li class="ddList2">
                                                  <a title="For Rent: Houses & Apartments">For Rent: Houses & Apartments</a>
                                                 
                                                </li>
                                                <li class="ddList2">
                                                  <a title="Lands & Plots">Lands & Plots</a>
                                               
                                                </li>
                                                <li class="ddList2">
                                                  <a title="For Rent: Shops & Offices"> For Rent: Shops & Offices</a>
                                                
                                                </li>
                                                <li class="ddList2">
                                                  <a title=" For Sale: Shops & Offices"> For Sale: Shops & Offices</a>
                                              
                                                </li>
                                              </ul>
                                            </li>
                                            <li class="ddList">
                                              <a href="#!" title="Link4"><i class="fas fa-laptop"></i> Electronics & Appliances</a>
                                              <ul>
                                                
                                               
                                               
                                                <li class="ddList2">
                                                  <a title="SubLink4-1">TVs, Video - Audio</a>
                                                </li>
                                                <li class="ddList2">
                                                  <a title="SubLink4-2"> Kitchen & Other Appliances</a>
                                                </li>
                                                <li class="ddList2">
                                                  <a title="SubLink4-3"> Computers & Laptops</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li class="ddList">
                                              <a title="Contact"><i class="fas fa-cog"></i> Services</a>
                                            </li>
                                          </ul>
                                        </div>


                                       <!------------>
                                       
                                       
                                      </div> 
                                      
                                      <input type="button" name="next" class="next action-button" value="Next" />
                                    </fieldset>

                                    <!---------------------->




                                    <fieldset>
                                      <div class="form-card">
                                       <div class="row">
                                         <div class="col-7">
                                          <h2 class="fs-title">Include Some Details</h2>
                                         </div>
                                         <div class="col-5">
                                          <h2 class="steps">Step 2 - 4</h2>
                                         </div>
                                       </div> 
                                       
                                       <div class="col-lg-9"> 
                                          <div class="form-group"><label class="form-label">Ad Title</label><input type="text" class="form-control" placeholder="Type your Ad title here"></div>
                                       </div>

                                       <div class="col-lg-9">
                                          <div class="form-group"><label class="form-label">Description</label><textarea class="form-control" placeholder="Include condition, features and reason for selling"></textarea></div>
                                       </div>

                                       <hr>

                                       <div class="col-lg-9"> 
                                          <div class="form-group"><label class="form-label">Confirm your Location</label><input type="text" class="form-control" placeholder="Location"></div>
                                       </div>

                                       <div class="col-lg-9"> 
                                          <div class="form-group"><label class="form-label">Phone</label><input type="text" class="form-control" placeholder="Phone"></div>
                                       </div>

                                       <hr>

                                       <div class="col-lg-9"> 
                                          <div class="form-group"><label class="form-label">Set a Price</label><input type="text" class="form-control" placeholder="Price"></div>
                                       </div>



                                      </div> 
                                      
                                      
                                      <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>

                                    
                                    <fieldset>
                                      <div class="form-card">
                                       <div class="row">
                                         <div class="col-7">
                                          <h2 class="fs-title">Review Your Post:</h2>
                                         </div>
                                         <div class="col-5">
                                          <h2 class="steps">Step 3 - 4</h2>
                                         </div>
                                       </div> 
                                       
                                       <div class="col-lg-9"> 
                                          <div class="form-group"><label class="form-label">Ad Title</label><input type="text" class="form-control" placeholder="Type your Ad title here"></div>
                                       </div>

                                       <div class="col-lg-9">
                                          <div class="form-group"><label class="form-label">Description</label><textarea class="form-control" placeholder="Include condition, features and reason for selling"></textarea></div>
                                       </div>
                                      </div> 
                                      
                                      
                                      <input type="button" name="next" class="next action-button" value="Publish" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>
                                    <fieldset>
                                      <div class="form-card">
                                       <div class="row">
                                         <div class="col-7">
                                          <h2 class="fs-title">Finish:</h2>
                                         </div>
                                         <div class="col-5">
                                          <h2 class="steps">Step 4 - 4</h2>
                                         </div>
                                       </div> <br><br>
                                       <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                       <div class="row justify-content-center">
                                         <div class="col-md-12" align="center"> <img src="website/images/success.png" width="15%"> </div>
                                       </div> <br><br>
                                       <div class="row justify-content-center">
                                         <div class="col-7 text-center">
                                          <h5 class="purple-text text-center">You Have Successfully Posted Your Ad! </h5>
                                         </div>
                                       </div>
                                      </div>
                                    </fieldset>
                                   </form>
                                 </div>
                                </div>
                              </div>
                           </div>
                             </div>
                     </section>

    </section>
</template>