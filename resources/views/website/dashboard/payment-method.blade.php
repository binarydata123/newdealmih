@extends('website.layout.app')
@section('css')
@endsection
@section('content')
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">


                <!------------------------------------------------------------->

      <div class="account-card bs p0">
      <div class="row">
         <div class="col-lg-12">
            <div class="niche-nav">
               <ul class="nav nav-tabs">
                  <li><a href="#ratings" class="nav-link active" data-toggle="tab"> Payment Receive</a></li>
                  <li><a href="#advertiser" class="nav-link" data-toggle="tab"> My Earnings</a></li>
                  <li><a href="#engaged" class="nav-link" data-toggle="tab"> Payment History</a></li>
               </ul>
            </div>
         </div>
      </div>

      <!--tab1-->
      
      <div class="tab-pane active" id="ratings">
      <div class="row wishlist1 mt20 mb20">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div>
                                    <p class="fs14o mb20">Select default payment methods</p>
                                    <form data-content="payment-method" class="formSubmit" id="regForm">
                                    <div class="form-group">
                                        <ul class="form-check-list">
                                            <li class="mb20"><input type="checkbox" id="payment-method1" name="cash" value="1"
                                                    class="payment-method" data-id="1">&nbsp; <label for="fix-check"
                                                    class="form-check-text tnc"> Cash</label></li>

                                            <li class="mb20"><input type="checkbox" id="payment-method2" name="ewallet" value="2"
                                                    class="payment-method" data-id="2">&nbsp; <label for="nego-check"
                                                    class="form-check-text tnc"> E-Wallet</label></li>

                                            <li class="mb20"><input type="checkbox" id="payment-method3" name="bank_account" value="3"
                                                @if(isset($paymentMethod->method)) 
                                                @if($paymentMethod->method == 3) checked @endif @endif
                                                    class="payment-method" data-id="3">&nbsp; <label for="day-check"
                                                    class="form-check-text tnc"> Bank Transfer</label></li>
                                            <div class="row ml0 bank-account"  @if(isset($paymentMethod->method)) 
                                                 @if($paymentMethod->method != 3) 
                                                 style="display: none" @endif @else style="display: none" @endif >
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="bank_name"
                                                            class="form-control bank_name" placeholder="Bank Name"
                                                            @if(isset($paymentMethod->bank_name)) value="{{$paymentMethod->bank_name}}" 
                                                            @endif required>
                                                        <span class="error-line" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="branch_name"
                                                            class="form-control branch_name" placeholder="Branch Name"
                                                            @if(isset($paymentMethod->branch_name)) value="{{$paymentMethod->branch_name}}" 
                                                            @endif required>
                                                        <span class="error-line" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="accnt_hlod_name"
                                                            class="form-control accnt_hlod_name"
                                                            placeholder="Account  Holder Name"
                                                            @if(isset($paymentMethod->account_holder_name)) value="{{$paymentMethod->account_holder_name}}" 
                                                            @endif required>
                                                        <span class="error-line" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="account_number"
                                                            class="form-control account_number"
                                                            placeholder="Account Number" 
                                                            @if(isset($paymentMethod->account_number)) value="{{$paymentMethod->account_number}}" 
                                                            @endif required >
                                                        <span class="error-line" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group"><input type="text" name="ifsc_code"
                                                            class="form-control ifsc_code" placeholder="IFSC Code"
                                                            @if(isset($paymentMethod->ifsc_code)) value="{{$paymentMethod->ifsc_code}}" 
                                                            @endif required minlength="11">
                                                        <span class="error-line" style="color: red;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <li class="mb20"><input type="checkbox">&nbsp; <label for="week-check"
                                                    class="form-check-text tnc"> Other</label></li> --}}
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 mb30">
                                       <input type="submit" class="btn btn-inline post-btn sv"
                                            value="Save">
                                       
                                    </div>
                                </form>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="form-group"><i class="fa fa-plus tblu"></i> <a href="#!"
                                        class="hrf"> Add another method </a></div>
                            </div> --}}
                           
                        </div>
      </div>

      <!--tab1-->


<!--tab2-->
      <div class="tab-pane" id="advertiser">
        <div class="row">

          <div class="col-md-12">

          <div class="wallet-mar">
              <div class="wallet bs" align="center">
                <div class="row">

                    <div class="col-md-6">
                        <p>Balance Details</p>
          
                        <h1>रू{{$orders->sum('purchase_price')}}</h1>
                    </div>
                    
                    <div class="col-md-6">
                        
              <p>Commision Details</p>

              <h1>रू {{$orders->sum('purchase_price')* .20}}</h1>
                    </div>
                </div>          


            



              </div>
              
                       
             <div align="center">
                  <a href="#!" class="btn btn-inline"><span>Request Cashback</span></a>
                            </div>
            </div>
             
          </div>


         </div>
      </div>

      <!--tab2-->


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
             @if($orders->count() > 0)
           
                @foreach ($orders as $order)
                    
            <tr>
               <td class="table-number">
                  <h6>01</h6>
               </td>
               <td class="table-category">
                  <h6><a href="#!">{{$order->title}}</a></h6>
               </td>

               <td class="table-category">
                  <h6><a href="#!">{{$order->id}}{{$order->nabil_bank_orderId}}</a></h6>
               </td>
               <td class="table-condition">
                  <h6 class="badge use">{{$order->created_at->format('Y-m-d')}}</h6>
               </td>
               <td class="table-price">
                  <h5>{{$order->purchase_price}}</h5>
               </td>
            </tr>
            @endforeach
            @else
            @include('website.no-data')
        @endif
         </tbody>
      </table>
   </div>
   
</div>
         </div>
      </div>

      <!--tab3-->
    
  
                            </div>
<!-------------------------------------------------------------->


                  
                </div>

            </div>
        </div>
    </section>


@endsection
@section('js')
    <script>

        $('.payment-method').on('click', function() {
            var id = $(this).data('id');
            if ($("#payment-method" + id).prop('checked') == true) {
               
                if (id == 1) {
                   
                }
                if (id == 2) {
                   
                }
                if (id == 3) {
                    $('.bank-account').show();
                }
            } else {
                if(id ==3)
                {
                    $('.bank-account').hide();

                }
            }

        })
    </script>


  
    
@endsection
