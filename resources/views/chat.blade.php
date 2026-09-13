@extends('layouts.master')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="admin_id" content="{{auth()->user()->id}}">
    <meta name="admin_name" content="{{auth()->user()->name}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 280px;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }

        .chat-app .chat {
            margin-left: 280px;
            border-left: 1px solid #eaeaea
        }

        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }

        .people-list .chat-list li {
            padding: 10px 15px;
            list-style: none;
            border-radius: 3px
        }

        .people-list .chat-list li:hover {
            background: #efefef;
            cursor: pointer
        }

        .people-list .chat-list li.active {
            background: #efefef
        }

        .people-list .chat-list li .name {
            font-size: 15px
        }

        .people-list .chat-list img {
            width: 45px;
            border-radius: 50%
        }

        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .text-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .chat-app .chat-list {
                height: 650px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
            .chat-app .chat-list {
                height: 480px;
                overflow-x: auto
            }

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach ($chats as $item)
                            <li class="clearfix">
                                <a href="{{route("index")}}?chat_id={{$item->id}}">
                                    <div class="about">
                                        <div class="name">{{$item->client->name??""}}</div>
                                        <div class="status">  {{$item->client->email??""}} </div>
                                        <div class="status" id="chat_id_message_{{$item->id}}">  {{$item->latestMessage->message??""}} \  {{$item->latestMessage->created_at??""}} </div>
                                    </div>
                                    </a>
                            </li>
                        @endforeach
                    
                        </ul>
                    </div>
                    @isset($chat)                        
                    <div class="chat">
                        <div class="chat-history">
                            <ul class="m-b-0" id="chat">

                            @foreach ($chat->messages as $message)
                                @if($message->admin_id!=null)
                                    <li class="clearfix">
                                        <div class="message-data">
                                            <span class="message-data-time">{{$message->created_at}}</span>
                                        </div>
                                        <div class="message my-message">{{$message->admin->name??""}} : {{$message->message}}</div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time">{{$message->created_at}}</span>
                                        </div><br><br>
                                        <div class="message other-message float-right"> {{$message->message}} </div>

                                    </li>
                                @endif
                            @endforeach
                            <div id="chat_message"></div>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <button class="input-group-text"onclick="sendMessage()">Send</button>
                                </div>
                                <input type="text" class="form-control" id="message" placeholder="Enter text here...">
                                <input type="hidden" id="chat_id" value="{{$chat->id}}" >
                            </div>
                        </div>
                    </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
@section('js')
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('4250082417d7779da2b1', {
      cluster: 'eu'
    });
  
    var channel = pusher.subscribe('admin_channel');
    channel.bind('admin_event', function(data) {
            var chat_id_json  = data.message.chat_id;
            var message       = data.message.message;
            var created_at    = data.message.created_at;
            var sender_type   = data.message.sender_type;
            var checkId = document.getElementById('chat_id').value;
            if(checkId==chat_id_json && sender_type=='client')
            {
                appendMessageClient(message,created_at);
            }
            chatDiv = document.getElementById('chat_id_message_'+chat_id_json).innerHTML=message;
  
  
  });
</script> 
  <script> 
    function sendMessage() {
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var admin_id = document.querySelector('meta[name="admin_id"]').getAttribute('content');
            var message = document.getElementById('message').value;
            var chat_id = document.getElementById('chat_id').value;
            if(message!=null && message!='')
            {
                fetch("{{ route('sendMessage') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken 
                    },
                    body: JSON.stringify({
                        message : message,
                        chat_id : chat_id,
                        admin_id : admin_id
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.code==200)
                    appendMessage();
                    else
                        alert(data); 
                })
                .catch((error) => {
                    alert(error);
                });
            }

        }


    function appendMessage() {
        var message = document.getElementById('message').value;
        var admin_name = document.querySelector('meta[name="admin_name"]').getAttribute('content');
        var now = new Date(); 
        var newMessage = `
        <li class="clearfix">
            <div class="message-data">
                <span class="message-data-time">${now}</span>
            </div>
            <div class="message my-message">${admin_name} : ${message}</div>
        </li>
        `;
        var messageContainer = document.getElementById("chat_message");
        messageContainer.insertAdjacentHTML('beforeend', newMessage);
        document.getElementById('message').value = '';
    }
    function appendMessageClient( message , created_at ) {
        var newMessage = `
            <li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time">${created_at}</span>
                </div><br><br>
                <div class="message other-message float-right"> ${message} </div>

            </li>
        `;
        var messageContainer = document.getElementById("chat_message");
        messageContainer.insertAdjacentHTML('beforeend', newMessage);
    }



  </script>  
@endsection

