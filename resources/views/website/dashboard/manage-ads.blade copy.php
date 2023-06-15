@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <div class="account-card alert fade show bs">
                        <div class="account-title manageads1">
                            <h6>Manage Ads</h6>
                            <div class="form-group mb0">
                                <form action="{{url('manage-ads')}}">
                                <select class="form-control hauto">
                                    <option selected="">Select filter</option>
                                    <option value="1">Brand New</option>
                                    <option value="2">Used</option>
                                </select>
                            </form>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-menu-list listtitle">
                                    <ul>
                                        <li>
                                            <h5 class="card-title">
                                                <a href="#ratings" class="nav-link active" data-toggle="tab">My Product</a>
                                            </h5>
                                        </li>
                                        <li>
                                            <h5 class="card-title">
                                                <a href="#advertiser" class="nav-link" data-toggle="tab">Sold</a></h5>
                                        </li>
                                        <li>
                                            <h5 class="card-title">
                                                <a href="#engaged" class="nav-link" data-toggle="tab">Expired</a></h5>
                                        </li>
                                        {{-- <li><h5 class="card-title"><a href="#">My Products</a></h5></li> --}}
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row ad-standard">
                            <div class="tab-pane active" id="ratings">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="product-info wrapinfo">
                                            {{-- <p class="product-title"><a href="#">Order ID: 44253457{{ $product->id }}</a> --}}
                                            </p>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div>
                                                <button type="button" title="Wishlist"
                                                   data-id="{{$product->id}}" data-content="product" class="far fa-trash-alt tred fs18w delete"></button>
                                                </div>
                                        </div>
                                        <div class="product-card standard image-heg">
                                            <div class="product-media">

                                                <div class="product-img">
                                                    @if ($product->image)
                                                        <img src="{{ url('public/media/product-image/' . $product->image) }}"
                                                            alt="product" height="142px" width="200">
                                                    @else
                                                        <img src="{{ url('public/website/images/no-image.png') }}"
                                                            alt="product" height="142px" width="200">
                                                    @endif
                                                </div>


                                            </div>
                                            <div class="product-content">

                                                <div class="product-info text-cont">
                                                    <ol class="breadcrumb product-category">
                                                        <h5 class="product-title"><a
                                                                href="#">{{ ucwords($product->title) }}</a></h5>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        @if ($product->type == 1)
                                                            <span class="s-used">Used</span>
                                                        @else
                                                            <li class="s-success">Brand New</li>
                                                        @endif
                                                        {{-- <li class="breadcrumb-item active" aria-current="page">Brand New
                                                        </li> --}}
                                                    </ol>
                                                    <h5 class="product-price">रू {{ number_format($product->price) }}
                                                    </h5>
                                                </div>
                                                <div class="product-meta"><span>Closes :
                                                        {{ $product->created_at->addDays(30)->format('D d M') }}</span>
                                                </div>
                                                <div class="product-info text-cont">
                                                    <a href="#" class="btn post-btn btn-light"><span>Sold Out</span></a>
                                                    {{-- <a href="#" class="btn btn-inline post-btn"><span>Quick
                                                            Relist</span></a> --}}
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>
                                                    <div>&nbsp;&nbsp;</div>

                                                    <div>
                                                        <a href="#!" class="vall2"><span>View Details</span></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @include('website.no-data')
                            @endif
                            </div>
                           <!--tab2-->
      <div class="tab-pane" id="advertiser">
        <div class="row">

          <div class="col-md-12">

          <div class="wallet-mar">
              <div class="wallet bs" align="center">

              <p>Balance Details</p>
              <h1>$ 56,430</h1>
             

              </div>
                       
             <div align="center">
                  <a href="#!" class="btn btn-inline"><span>Request Cashback</span></a>
                            </div>
            </div>
             
          </div>


         </div>
      </div>


      <!--tab3-->
      <div class="tab-pane" id="engaged">
        <div class="row">
        <div class="col-lg-12 mt20 mb20">
   <div class="table-scroll">
      <table class="table-list">
         <thead class="table-head">
            <tr>
               <th scope="col">SL No</th>
               <th scope="col">Product Name</th>
               <th scope="col">Order ID</th>
               <th scope="col">Date</th>
               <th scope="col">Amount</th>
              
            </tr>
         </thead>
         <tbody class="table-body">

            <tr>
               <td class="table-number">
                  <h6>01</h6>
               </td>
              
               <td class="table-category">
                  <h6><a href="#!">Samsung Galaxy Mobile</a></h6>
               </td>

               <td class="table-category">
                  <h6><a href="#!">4425345753</a></h6>
               </td>

               
               <td class="table-condition">
                  <h6 class="badge use">14/10/21</h6>
               </td>
               <td class="table-price">
                  <h5>$248</h5>
               </td>
               
            </tr>

            <tr>
               <td class="table-number">
                  <h6>02</h6>
               </td>
              
               <td class="table-category">
                  <h6><a href="#">Kawasaki Ninja</a></h6>
               </td>

               
               <td class="table-category">
                  <h6><a href="#!">3457442553</a></h6>
               </td>

               <td class="table-condition">
                  <h6 class="badge use">7/6/21</h6>
               </td>
               <td class="table-price">
                  <h5>$2,480</h5>
               </td>
               
            </tr>

          
         </tbody>
      </table>
   </div>
   
</div>
         </div>
      </div>

      <!--tab3-->
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </section>
@endsection
@section('js')

<script src="{{url('public/website/js/classified/delete.js')}}"></script>


@endsection
