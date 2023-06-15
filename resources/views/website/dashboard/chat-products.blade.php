
    
<div class="col-lg-6 col-xl-5">
  
    <div class="message-filter bshadow">
       
        <div class="message-filter-group" align="right">

            
        </div>
        <input type="hidden" name="_token" value="Cj07oe6VvErnho3FkckAwrQJqT3cRvCkOXaJtG7M">
        <ul class="message-list message-items" id="start_chat">
            @if($chatProducts)
            @foreach ($chatProducts as $chatProduct)

            @php

                $data = $users = DB::table('chats')->where('product_id', $chatProduct->id)->where('sender_id','!=',Auth::user()->id)->where('receiver_id',Auth::user()->id)->where('is_read','0')->count();

            @endphp

            {{-- {{dd($chatProduct)}} --}}
            <li class="message-item active">



                <input type="hidden" name="hidden_receiver_id" id="hidden_receiver_id"
                    value="84">
            
                <a href="{{url('messages?type='.$chatProduct->slug)}}" data-id="84" data-content="1" class="message-link">
                    <div class="message-img"><img
                            src="{{url('website/images/avatar/01.jpg')}} "
                            alt="avatar"></div>
                    <div class="message-text">
                        <h6>{{$chatProduct->title}} <span>now</span></h6>
                        <p></p>
                    </div>
                    <span class="message-count">@if($data > 0 ) {{$data}} @endif</span>
                </a>
            </li>
            @endforeach
            @endif
        </ul>
       
    </div>
   
</div>
