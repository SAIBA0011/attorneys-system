<!-- Accept a new users Friend Request with this form -->

<div class="row">
    <div class=" col-md-12 friend-container">
        <img src="http://www.gravatar.com/avatar/{{md5($friendRequest->email)}}?d=http://s10.postimg.org/3s4sq7in9/user_icon.jpg" alt="{{$friendRequest->name}}"/>
        <div class="friend-info">
            {{ $user->thisUser($friendRequest->sender_id)->name }} <br>
            <span class="label label-default">Received: {{ Carbon\Carbon::parse($friendRequest->created_at)->diffForHumans() }}</span>
        </div>
        <div class="pull-right profile-accept-buttons">
            <div class="profile-accept-buttons-first">
            {!! Form::open(['Method' => 'Post', 'route' => ['accept_friend_request', $friendRequest->sender_id]]) !!}
                {!! Form::hidden('recipient_id', $user->id) !!}
                {!! Form::submit('Accept Friend Request', ['class' => 'btn btn-default', 'style' => 'background-color: #ef5505 !important; color:white; ']) !!}
            {!! Form::close() !!}
            </div>

            {!! Form::open(['Method' => 'Post', 'route' => ['deny_friend_request', $friendRequest->sender_id]]) !!}
                {!! Form::hidden('recipient_id', $user->id) !!}
                {!! Form::submit('Decline Friend Reques', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

