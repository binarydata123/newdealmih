 
 
      

     
       @if($previous_received_msg)

            @foreach ($previous_received_msg as $messages )
                
          
             <div class="inbox-chat-text">
                <p style="background-color:#0760b3;color:#fff">{{$messages->message}}</p>
                <div class="inbox-chat-action"><a href="#" title="Remove" class="fas fa-trash-alt"></a><a href="#" title="Forward" class="fas fa-forward"></a></div>
             </div>
             <small class="inbox-chat-time">feb 02, 3:15 AM</small>
            </div>
            @endforeach
       @endif

           
      


 
      