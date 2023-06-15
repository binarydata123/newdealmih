@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<style>
.message-filter.bshadow {
    width: 100%;
}
.my-chat .inbox-chat-text{
    flex-direction: inherit !important;
    justify-content: flex-end;
}
.delete_message {
    font-size: 9px;
    vertical-align: bottom;
    line-height: 0px;
    cursor: pointer;
    background: #ff0000;
    padding: 8px 5px 8px 5px;
    margin-left: 5px;
    color: #fff;
    font-weight: 700;
    border-radius: 10px;
}
</style>

    <link rel="stylesheet" href="{{ url('public/website/css/custom/message.css') }}">
    <section class="dashboard-part">
        <div class="container-fluid">
            <div class="row">
                @include('website.dashboard.dashboard')
                <div class="col-lg-9">
                    <div class="account-card alert fade show bs">
                        <div class="account-title wishlist1">
                            <h6>Messages</h6>
                        </div>
                        @if (session()->has('success'))
                        <div class="alert alert-success text-center" style="padding: 10px 0;">
                            {{ session()->get('success') }}
                        </div>
                        @endif  
                        <div class="row">
                            @if(isset($product) && $product != null)
                            <div class="col-lg-6 col-xl-5">
                                <div class="message-filter bshadow">
                                    <div class="message-filter-group" align="right">

                                        <input type="hidden" class="productIdFromListing" name="productIdFromListing"
                                            value="20">
                                        <input type="hidden" class="userIdFromListing" name="userIdFromListing" value="84">
                                    </div>
                                    <input type="hidden" name="_token" value="Cj07oe6VvErnho3FkckAwrQJqT3cRvCkOXaJtG7M">
                                    <ul class="message-list message-items" id="start_chat">

                                        @if(Auth::user()->id == $product->user_id )

                                        @foreach($productallchatdata as $key => $chatdata)

                                 
                                            @php

                                             $unqiueid = trim(str_replace(Auth::user()->id,'',$chatdata->unqiue_id));

                                             $user =  DB::table('users')->Select('username')->where('id', $unqiueid)->first();

                                            @endphp

                                            <li class="message-item active">
                                                
                                                <input type="hidden" name="product_id" id="product_id1" value="{{$product->id}}">
                                                <a href="{{url('messages?type='.$product->slug.'&id='.$chatdata->unqiue_id)}}" data-id="84" data-content="1" class="message-link">
                                                    <div class="message-img"><img
                                                            src="{{url('website/images/avatar/01.jpg')}} "
                                                            alt="avatar"></div>
                                                    <div class="message-text">
                                                        <h6>{{ ucfirst($user->username) }} <span>now</span></h6>
                                                        <p>{{$product->title}}</p>
                                                    </div>
                                                    <span class="message-count">@if($chats_count > 0 ) {{$chats_count}} @endif</span>
                                                </a>
                                            </li>

                                        @endforeach

                                        @else 

                                            
                                            <input type="hidden" name="product_id" id="product_id1" value="{{$product->id}}">
                                            <a href="#" data-id="84" data-content="1" class="message-link">
                                                <div class="message-img"><img
                                                        src="{{url('website/images/avatar/01.jpg')}} "
                                                        alt="avatar"></div>
                                                <div class="message-text">
                                                    <h6>{{$product->title}} <span>now</span></h6>
                                                    <p></p>
                                                </div>
                                                <span class="message-count">@if($chats_count > 0 ) {{$chats_count}} @endif</span>
                                            </a>
                                        </li>


                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @else
                            @include('website.dashboard.chat-products')
                        @endif
                          
                            <div class="col-lg-6 col-xl-7 d">
                                <div class="message-inbox bshadow ">
                                    @if(isset($product) && $product != null)
                                    <div class="row inbox-header">
                                        <div class="col-sm-8 inbox-header-profile" style="justify-content: left;">

                                            @if(($chatFirst))
                                                    <input type="hidden" name="" id="receiver_id"
                                                value="{{$chatFirst->sender_id}}">
                                            @else

                                              <input type="hidden" name=" " id="receiver_id" value="{{$product->user_id}} 
                                            ">
                                                
                                            @endif

                                             <input type="hidden" name=" " id="user_product_id" value="{{$product->user_id}} 
                                            ">
                                             <input type="hidden" name=" " id="current_user_id" value="{{Auth::user()->id}} 
                                            ">


                                            @if($product->user_id != Auth::user()->id)

                                            @php

                                            $unquieid = $product->user_id.Auth::user()->id;

                                            @endphp

                                            @else

                                            @php
                                            
                                            $unquieid = $product->user_id.$chatFirst->sender_id;

                                            @endphp


                                            @endif

                                            
                                            <input type="hidden" class="productid_fromPrevchat"
                                                name="productid_fromPrevchat" id="productid_fromPrevchat" value="{{$product->id}}">

                                            <a class="inbox-header-img dfgdg" href="#"><img
                                                    src="{{url('website/images/avatar/01.jpg')}} "
                                                    alt="avatar"></a>
                                            <div class="inbox-header-text">
                                                <h5><a href="#">{{$product->title}}</a></h5>
                                                {{-- <span></span> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="clear_chat_btn text-right" style="cursor: pointer;text-decoration: underline;" onClick="ClearAllChat({{$product->id}},{{$unquieid}})">Clear Chat</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if(isset($chats) && $chats != null &&$chats->count() > 0)
                                    
                                    <ul class="inbox-chat-list hidden_send_msgd">
                                       
                                            @foreach ($chats as $chat)
                                           

                                                    @php

                                                    $str = explode(",",$chat->clear_chat);

                                                    @endphp



                                                    @if (!in_array(Auth::user()->id, $str))
    
                                                    @if($chat->sender_id == Auth::user()->id)


                                                        @php

                                                        $chatstatus =  DB::table('chats')->Select('msg_status')->where('id', $chat->id)->first();

                                                        @endphp
                                                
                                                    

                                                        @if($chatstatus->msg_status == 'active')

                                                        <li class="inbox-chat-item my-chat">
                                                            <div class="inbox-chat-img">
                                                            @if($chat->user->avatar != Null)
                                                                <img
                                                                    src=" {{url('website/images/avatar/01.jpg')}} "
                                                                    alt="avatar">
                                                            @else      
                                                                
                                                                 <img
                                                                    src=" {{url('website/images/avatar/01.jpg')}} "
                                                                    alt="avatar">

                                                            @endif

                                                                </div>

                                                            <div class="inbox-chat-content">
                                                                <div class="inbox-chat-text">
                                                                    <p style="background-color:#0760b3;color:#fff">{{$chat->message}}</p>
                                                                    <span class="delete_message" data-id="{{$chat->id}}" onClick="deleteMessage({{$chat->id}})">X</span>
                                                                </div>
                                                                <small class="inbox-chat-time">{{$chat->date}}, {{$chat->time}}</small>
                                                            </div>
                                                        </li>
                                                        @endif
                                                    @elseif($chat->receiver_id == Auth::user()->id)

                                             
                                                        <li class="inbox-chat-item">
                                                            <div class="inbox-chat-img"><img
                                                                    src="{{url('website/images/avatar/01.jpg')}} "
                                                                    alt="avatar"></div>
                                                            <div class="inbox-chat-content">
                                                                <div class="inbox-chat-text sdfsd">
                                                                    <p>{{$chat->message}}</p>
                                                                    
                                                                </div>
                                                                <small class="inbox-chat-time">{{$chat->date}}, {{$chat->time}} </small>
                                                            </div>
                                                        </li>

                                                    @endif

                                                    @else

                                                    <!--  @include('website.no-message') -->

                                                    @endif

                                            @endforeach
                                    </ul>
                                    <div class="inbox-chat-form bshadow mt20"><textarea placeholder="Type a Message"
                                        id="chat-emoji"></textarea><button type="submit" class="send_msgbtn"><i
                                            class="fas fa-paper-plane"></i></button></div>
                                    @else
                                    @include('website.no-message')
                                    @if(isset($product) && $product != null)

                                    <div class="inbox-chat-form bshadow mt20"><textarea placeholder="Type a Message"
                                            id="chat-emoji"></textarea><button type="submit" class="send_msgbtn"><i
                                                class="fas fa-paper-plane"></i></button></div>
                                              @endif
                                             
                                                @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
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
                if (id == 3) {
                    $('.bank-account').hide();

                }
            }

        })
    </script>

    <script>
        var product_id = "";

        $(document).on('click', '.send_msgbtn', function(e) {

            var msg = "";
            msg = $("#chat-emoji").val();
            receiver_id = $("#receiver_id").val();
            product_id = $(".productid_fromPrevchat").val();
            user_product_id = $("#user_product_id").val();
            current_user_id = $("#current_user_id").val();


            if (msg) {
                $.ajax({
                    type: "post",
                    url: "/send-message",
                    data: { 
                        message: msg,
                        receiver_id: receiver_id,
                        product_id: product_id,
                        user_product_id: user_product_id,
                        current_user_id: current_user_id,
                    },
                    success: function(data) {
                         window.location.href = base_url + 'messages?type='+data.productSlug;
                        
                        // findChatlist(receiver_id, product_id);
                    },
                    error: function(data) {
                        alert("failed");
                    }
                })
            }
        });




        // $("#start_chat li").click(function(){
        //var hidden_receiver_id;
        //hidden_receiver_id = $(this).val();
        //   var fname = $this.find('input').val();

        //    alert(fname);
        // })
        var dataContent = "";
        $('.message-link').on('click', function() {


            var receiver_id = $(this).data('id');


            dataContent = $(this).data('content');

            product_id = $("#product_id" + dataContent).val();

            findChatlist(receiver_id, product_id);
        });


        function findChatlist(id, product_id) {


            receiver_id = id;
            product_id = product_id


            $.ajax({
                type: "post",
                url: "/previous-messages",
                data: {
                    id: receiver_id,
                    productid: product_id
                },
                success: function(result) {
                    var dataList = result.html;
                    $('.chatbox').html(dataList);
                },
                error: function(result) {
                    $('.hidden_send_msg').hide();
                }
            })

        }



        /*function deleteChat(id){
            $.ajax({
                type: "post",
                url: "/delete-messages",
                data: { receiver_id:id},
                success: function(result) {
                    alert("success");
                },
                error: function(result) {
                }
            })
        }*/
        function deleteMessage(id){
            $.ajax({
                type: "post",
                url: "/delete-messages",
                data: { message_id:id},
                success: function(result) {
                    if(result.status == true){
                        //$('.alert-success').html(result.message);
                        location.reload();
                    }
                },
                error: function(result) {
                }
            })
        }
        function ClearAllChat(product_id,unquieid){
            $.ajax({
                type: "post",
                url: "/clear-all-chats",
                data: { product_id:product_id,unquieid:unquieid},
                success: function(result) {
                    if(result.status == true){
                        location.reload();
                    }
                },
                error: function(result) {
                }
            })
        }
        

        $("#searchUser").on('keyup', function() {

            var keyword = $(this).val();
            if (keyword.length >= 1) {


                $.ajax({
                    type: "post",
                    url: "/search-user",
                    data: {
                        keyword: keyword,
                    },
                    success: function(results) {
                        console.log(results);
                        var searchdataList = results.html;
                        $('.message-items').html(searchdataList);
                    },
                    error: function(results) {

                    }
                })

            }
        });


        $(document).ready(function() {
            $('.message-inbox').show();
            var productid = $(".productIdFromListing").val();
            var userid = $(".userIdFromListing").val();
            if ((productid != null) && (userid != null)) {

                findChatlist(userid, productid);
            }

        });
    </script>

@endsection
    