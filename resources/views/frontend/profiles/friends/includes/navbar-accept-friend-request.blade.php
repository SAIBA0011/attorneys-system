<a href="{{route('profile.friendsRequests', CurrentUser()->slug)}}">
    <img style="width: 52px;
    margin-right: 10px;" class="pull-left" src="{{ CurrentUser()->thisUser($friendRequest->sender_id)->UserImage() }}" alt="">
    <p style="margin-right: 6px; margin-bottom: 0px">{{ CurrentUser()->thisUser($friendRequest->sender_id)->name }} <br> {{ Carbon\Carbon::parse($friendRequest->created_at)->diffForHumans() }}
    <br>
    <span class="pull-right">
        <div class="nav-buttons">
            <div class="accept-request">
                {!! Form::open(['Method' => 'Post', 'route' => ['accept_friend_request', $friendRequest->sender_id]]) !!}
                {!! Form::hidden('recipient_id', CurrentUser()->id) !!}
                {!! Form::submit('Accept', ['class' => 'btn btn-xs btn-info', 'style' => 'background-color: #ef5505; border-color: #ef5505;']) !!}
                {!! Form::close() !!}
            </div>

            <div class="decline-request">
                {!! Form::open(['Method' => 'Post', 'route' => ['deny_friend_request', $friendRequest->sender_id]]) !!}
                {!! Form::hidden('recipient_id', CurrentUser()->id) !!}
                {!! Form::submit('Decline', ['class' => 'btn btn-xs btn-default']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </span>

    </p>

    {{--<div>--}}
        {{--<img width="20%" src="http://www.gravatar.com/avatar/b64d439129604fa7bcdb24c33febed5c?d=http://s10.postimg.org/3s4sq7in9/user_icon.jpg" alt="">--}}
        {{--<div class="name">--}}
            {{--{{ CurrentUser()->thisUser($friendRequest->sender_id)->name }} <br>--}}
            {{--{{ Carbon\Carbon::parse($friendRequest->created_at)->diffForHumans() }}--}}
        {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

</a>