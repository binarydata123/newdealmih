@extends('website.layout.app')
@section('css')

@endsection
@section('content')

<style>
  .flx-remove {
    display: unset !important;
}
.product-meta {
    height: 35px !important;
}

</style>

<section class="dashboard-part">
    <div class="container-fluid">
       <div class="row">
         @include('website.dashboard.dashboard')
         <div class="col-lg-9">
            <div class="account-card alert fade show bs">
               <div class="account-title wishlist1">
                  <h6>My Wishlist</h6>
               </div>
                  <div class="row">
                  
                     @if($wishlists->count() > 0)
                              @foreach ($wishlists as $wishlist)
                                 @if($wishlist->product)   

                                 @php 
                                   $cate = DB::table('categories')->where('id',$wishlist->product->category_id)->first();
                                 @endphp
                                  
                     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                         <div class="product-card standard image-heg flx-remove">
                          <div class="row">
                            <div class="col-lg-4 col-md-12">
                              <a href="{{url('product/detail/'.$wishlist->product->slug)}}">
                             <div class="product-media">
                                 <div class="product-img"><img 
                                    @if($wishlist->product->image)
                                    src="{{ url('public/media/product-image/' . $wishlist->product->image) }}" 
                                    @else
                                    src="{{url('public/website/images/no-image.png')}}" 
                                    @endif
                                    alt="product"></div>
                             </div>
                            </a>
                            </div>
                            <div class="col-lg-8 col-md-12">
                               <div class="product-content">     
                                                  
                                 <div class="product-info text-cont">
                                    <ol class="breadcrumb product-category">
                                       <h5 class="product-title"><a href="{{url('product/detail/'.$wishlist->product->slug)}}">{{$wishlist->product->title}}</a></h5>&nbsp;&nbsp;&nbsp;&nbsp;
                                       
                                       <!-- <li class="breadcrumb-item active s-success" aria-current="page">Brand New</li> -->
                                   </ol>
                                  
                                   <div class="wishlist-move"><a href="#">
                                     @if($cate->header_category_id != '5')
                                    <span class="cart" data-type="wishlist" data-id="{{$wishlist->product_id}}"><img src="{{url('public/website/images/mvcart.svg')}}"></i>  Move to Cart</span>
                                    <span class="light-text">| 
                                      </span>&nbsp;
                                       @endif
                                      <a href="#"><span data-content="wishlist" data-id="{{$wishlist->id}}" class="delete"><img src="{{url('public/website/images/delete.svg')}}">
                                 </i>  Delete</span></a></div>

                                 </div>
                                 <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>
                                    @if ($wishlist->product->districtList){{ $wishlist->product->districtList->district_name }} @endif </span><span class="light-text">| </span> <span>Closes : Mon, 19 July</span></div>
                                  
                                 <div class="product-meta qty">
                                    <span>@if($wishlist->product->category_id  != 86 && $cate->header_category_id != '5')Qty :01 @endif </span>
                                </div>
                                 <div class="product-info text-cont">
                                   @if($cate->header_category_id != '5')
                                    <h5 class="product-price">रू {{$wishlist->product->price}}</h5>
                                    @else
                                       @php
                                          $produstReviews = App\Models\ServiceFeedback::where('product_id',$wishlist->product->id);
                                          $reviews = $produstReviews->get();
                                          $userCount = $reviews->count();
                                          $avgRating = $produstReviews->avg('rating');
                                     @endphp
                                                
                                        <h6><span class="pfeedback" id="p_feedback">@if((int)$avgRating >= 3) positive @endif</span>  <span>
                                          <a href="{{url('product/detail/'.$wishlist->product->slug)}}" class="tblack"> Feedback {{number_format($avgRating,1)}}
                                          <i class="fa fa-star rating"></i> 
                                           </a>({{$reviews->count()}})
                                       </span></h6>
                                    @endif
                                    <div>
                                        
                                       <u>
                                       <p class="vall"></a> <a href="{{url('product/detail',$wishlist->product->slug)}}"> View Details </a>  <i class="fas fa-arrow-right"></i></p></u>
                                         </div>
                                </div>
                            </div>
                          </div>
                            
                            
                            
                             </div>
                              
                         </div>
                     </div>
                        

                     @endif
                  @endforeach
                  @else
                        @include('website.no-data')
                   @endif
                 </div>
              </div>
         </div>
         
       </div>
    </div>
    @endsection
    @section('js')

<script src="{{url('public/website/js/classified/delete.js')}}"></script>
<script>
   $('.cart').on('click', function () {
    // alert("sdfsdf");
  var product = $(this).data('id');
  var type = $(this).data('type');

  $.ajax({
    type: "post",
    url: base_url + "cart",
    data: {
      product: product,type:type
    },
    success: function (data) {
      if(data.status == true)
        {
          window.location.href=base_url+"cart";
        }
    },
    error: function (data) {

    }
  })
})
</script>
    @endsection

    