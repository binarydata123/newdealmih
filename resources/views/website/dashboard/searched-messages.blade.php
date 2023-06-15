                        @if($userslists)

                           @foreach ($userslists as $userslist)
                              @if($userslist->username!="admin")
                                 <li class="message-item">
                                    <input type="hidden" name="hidden_receiver_id" id="hidden_receiver_id" value="{{$userslist->id}}">
                                    <a href="#" data-id={{$userslist->id}}  class="message-link">
                                      <div class="message-img"><img src="@if($userslist->avatar){!! asset('media/avatar/'.$userslist->avatar) !!} @else {!! asset('website/images/avatar/05.png') !!} @endif" alt="avatar"></div>
                                      <div class="message-text">
                                          <h6>{{$userslist->username}} <span>now</span></h6>
                                          <p> my best frie...</p>
                                     </div>
                                      <!-- <span class="message-count">4</span> -->
                                   </a>
                                </li>
                              @endif
                           @endforeach 
                        @endif 