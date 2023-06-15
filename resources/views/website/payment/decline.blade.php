@extends('website.layout.app')
@section('css')


@endsection
@section('content')



<div class="col-lg-12">
                  <div class="account-card alert fade show bs">
                     
                        <div align="center" class="mtb50">
                           <img src="{{url('public/website/images/dea/notify.png')}}" alt="product">
                           <p class="ntitle">Transaction Failed</p>
                           <p class="npara">Sorry! We could not process your transaction. Below are possible reasons of failure</p>

                           <ul>

                                                       
                                                                    
                            <li> <a class="lblu">You might have entered wrong card number, expiry date or CVV code.</a>
                            </li>
                                                                
                            <li> <a class="lblu">You might have entered wrong OTP / Verification code.</a>
                            </li>
                                                                
                            <li> <a class="lblu">Your card issuing bank might have declined the card processing. Please ask your bank to enable â€œOnline Transactionâ€ on your card.</a>
                            </li>

                            <li> <a class="lorg">If you think everything is fine then please try again.</a>
                            </li>

                            
                            
                                                   
                        </ul>




                       </div>
                    </div>
               </div>






@endsection