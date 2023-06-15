{{-- @if(($receiverdata->id) == (Auth::user()->id)) --}}
{{-- <p style="text-align: center">Can not chat with same user</p> --}}
{{-- @else --}}
<div class="message-inbox bshadow ">
    <div class="inbox-header">
       <div class="inbox-header-profile">
         <input type="hidden" name="receiver_id" id="receiver_id" value="{{$id ?? ''}}">
         <input type="hidden" class="productid_fromPrevchat" name="productid_fromPrevchat" id="productid_fromPrevchat" value="{{$productId ?? ''}}">
         {{-- {{dd($receiverdata->)}} --}}
          <a class="inbox-header-img" href="#"><img src="@if($receiverdata->avatar){!! asset('media/avatar/'.$receiverdata->avatar) !!} @else {!! asset('website/images/avatar/05.png') !!} @endif" alt="avatar"></a>
          <div class="inbox-header-text">
             <h5><a href="#">{{$receiverdata->username}}</a></h5>
             <span>@if(isset($productName)){{$productName}}@endif</span>
          </div>
       </div>
       <!-- <ul class="inbox-header-list">
          <li><a href="#" title="Delete" class="fas fa-trash-alt"></a></li>
          
       </ul> -->
    </div>
    <ul class="inbox-chat-list hidden_send_msg">
      
     
      

        @if($previous_msg)

        @foreach ($previous_msg as $messages )
         @if(($messages->sender_id) == (Auth::user()->id))

               <li class="inbox-chat-item">
                  <div class="inbox-chat-img"><img src="@if($userdata->avatar){!! asset('media/avatar/'.$userdata->avatar) !!} @else {!! asset('website/images/avatar/05.png') !!} @endif" alt="avatar"></div>
                  <div class="inbox-chat-content">
            
                        
                  
                     <div class="inbox-chat-text">
                        <p>{{$messages->message}}</p>
                        <!-- <div class="inbox-chat-action">
                           <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                           <a href="#" title="Forward" class="fas fa-forward"></a>
                        </div> -->
                     </div>
                     <small class="inbox-chat-time">{{$messages->date}}, {{$messages->time}}</small>
                     </div>
               </li>

         @else
                  <li class="inbox-chat-item my-chat" >
                     <div class="inbox-chat-img"><img src="@if($receiverdata->avatar){!! asset('media/avatar/'.$receiverdata->avatar) !!} @else {!! asset('website/images/avatar/05.png') !!} @endif" alt="avatar"></div>
                     <div class="inbox-chat-content">
            
                           
                     
                        <div class="inbox-chat-text">
                           <p style="background-color:#0760b3;color:#fff">{{$messages->message}}</p>
                           <!-- <div class="inbox-chat-action">
                              <a href="#" title="Remove" class="fas fa-trash-alt"></a>
                              <a href="#" title="Forward" class="fas fa-forward"></a>
                           </div> -->
                        </div>
                        <small class="inbox-chat-time">{{$messages->date}}, {{$messages->time}}</small>
                     </div>
                  </li>
         @endif
             
            @endforeach
       @endif



 
    </ul>

 
    <div class="inbox-chat-form bshadow mt20"><textarea placeholder="Type a Message" id="chat-emoji"></textarea><button type="submit" class="send_msgbtn"><i class="fas fa-paper-plane"></i></button></div>
 </div>

 {{-- @endif --}}