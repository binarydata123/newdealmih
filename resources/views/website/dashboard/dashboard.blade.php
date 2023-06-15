<style>
.dropdown-toggle::after {
   display: none;
}
ul#catsubmne li a {
    color: #7c7c7c !important;
    font-weight: 500;
}
ul#catsubmne li.notfiydata a {
    color: #567df4 !important;
}
ul#catsubmne1 li a {
    color: #7c7c7c !important;
    font-weight: 500;
}
ul#catsubmne1 li.notfiydata a {
    color: #567df4 !important;
}
ul#catsubmne1 {
    margin-left: 25px !important;
}
ul#catsubmne {
    margin-left: 25px !important;
}
</style>
@php
$header_category = App\Models\HeaderCategory::getheadercategory();
$category = App\Models\Product::getcat(Auth::user()->id);
$msg = App\Models\Product::Msgcount(Auth::user()->id);
$msg_count = App\Models\Product::MessagesCount(Auth::user()->id);
$notifications = App\Models\UserNotification::notication(Auth::user()->id);
@endphp

<div class="col-lg-3 hidden-x">
    <div class="account-card alert fade show padf bs">
       <div class="row dp">
          <div class="col-md-4">
               <div><a href="{{url('profile')}}"><img 
                  @if(Auth::user()->avatar)
                  src="{{asset('media/avatar/'.Auth::user()->avatar)}}"
                  @else
                   src="{{url('public/website/images/us.png')}}"
                   @endif class="br100" alt="" height="75" width="75"> </a></div> 
          </div>
          <div class="col-md-8">
              <div class="mt20">
                <h5>{{ucwords(Auth::user()->username)}}</h5>
               <p>{{Auth::user()->phone_number}}</p>
              </div> 
          </div>
       </div>
       <ul class="br0 hidden-x">
          <li class="notify-item {{ (request()->is('payment-method')) ? 'active' : '' }}">
             <a href="{{url('payment-method')}}" class="notify-link">
                <p><i class="fa fa-briefcase mr10"></i>&nbsp; {{trans('global.payment_method')}}<i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

          {{-- <li class="notify-item">
             <a href="#" class="notify-link">
                <p><i class="fa fa-upload mr10"></i>&nbsp; Upgrade Plan <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li> --}}

          <li class="notify-item {{ (request()->is('order')) ? 'active' : '' }}">
             <a href="{{url('order')}}" class="notify-link ">
                <p><i class="fa fa-shopping-bag mr10 "></i>&nbsp; {{trans('global.my_orders')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

         @if(Auth::user()->is_business == 1 || Auth::user()->is_store == 1 )
            <li class="notify-item {{ (request()->is('store-order')) ? 'active' : '' }}" >
               <a href="#catsubmne1" data-toggle="collapse" aria-expanded="false" class="notify-link dropdown-toggle">
                  <p><i class="fa fa-shopping-bag mr10 "></i>&nbsp; {{trans('global.store_orders')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
               </a>
               <ul class="collapse lisst-unstyled" id="catsubmne1">
                  <li class=""><a class="notify-link" href="{{url('store-order')}}" target="_blank"><i class="fa fa-shopping-bag mr10 "></i> Orders</a></li>
                  <li class=""><a class="notify-link" href="{{url('store-order')}}" target="_blank"><i class="fa fa-shopping-bag mr10" target="_blank"></i>Products</a></li>
                  <li class=""><a class="notify-link" href="{{url('profile/edit')}}" target="_blank"><i class="fa fa-shopping-bag mr10 "></i>Edit Business</a></li>
               </ul>
            </li>
            <li class="notify-item {{ (request()->is('mystore')) ? 'active' : '' }}">
               <a href="{{url('mystore')}}" class="notify-link ">
                  <p><i class="fa fa-shopping-bag mr10 "></i>&nbsp; Store Products <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
               </a>
            </li>
           
         @endif
          <li class="notify-item {{ (request()->is('wishlist')) ? 'active' : '' }}">
             <a href="{{url('wishlist')}}" class="notify-link">
                <p><i class="fa fa-heart mr10"></i>&nbsp; {{trans('global.my_wishlist')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

          

         <li class="notify-item {{ (request()->is('manage-ads')) ? 'active' : '' }}">
             <a href="{{url('/manage-ads')}}" class="notify-link">
                <p><i class="fa fa-envelope mr10"></i>&nbsp; {{trans('global.manage_ads')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>
    
      
          <li class="notify-item {{ (request()->is('messages')) ? 'active' : '' }}">
             <a href="{{url('messages')}}" class="notify-link">
                <p><i class="fa fa-envelope mr10"></i>&nbsp; {{trans('global.my_messages')}} <span class="badge badge-secondary">{{$msg_count}}</span> <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

          <li class="notify-item {{ (request()->is('notification')) ? 'active' : '' }}">
             <a href="{{url('notification')}}" class="notify-link">
                <p><i class="fa fa-bell mr10"></i>&nbsp;&nbsp;{{trans('global.notifications')}} <span class="badge badge-secondary">{{$notifications}}</span> <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

          <li class="notify-item {{ (request()->is('interested-category')) ? 'active' : '' }}">
             <a href="{{url('interested-category')}}" class="notify-link">
                <p><i class="fa fa-tasks mr10"></i>&nbsp; {{trans('global.interested_categories')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li>

          {{-- <li class="notify-item {{ (request()->is('address')) ? 'active' : '' }}">
             <a href="{{url('address')}}" class="notify-link">
                <p><i class="fa fa-home mr10"></i>&nbsp;{{trans('global.address')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
                
             </a>
          </li> --}}

          <li class="notify-item {{ (request()->is('job-profile')) ? 'active' : '' }}">
            <a href="{{url('job-profile?job_profile=active')}}" class="notify-link">
               <p><i class="fa fa-user mr10"></i>&nbsp;&nbsp;{{trans('global.job_profile')}} <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
            </a>
         </li>

         <li class="notify-item {{ (request()->is('product/productview')) ? 'active' : '' }}">
            <a href="{{url('/product/productview')}}" class="notify-link">
               <p><i class="fa fa-bar-chart mr10"></i>Analytics <i class="fa fa-angle-right fright" aria-hidden="true"></i></p>
            </a>
         </li>
         
          <li class="notify-item">
             <div align="center">
                <a href="{{url('logout')}}" class="btn btn-inline3 post-btn"><span class="cred">{{trans('global.logout')}}</span></a>
             </div>


        
</li>
         
        
       </ul>


       <!---mobile menu----->

       


       <!---mobile menu----->


      
    </div>
   
 
  
 </div>
