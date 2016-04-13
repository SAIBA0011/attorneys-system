@if($member->isFriendWith(CurrentUser()))
    <a href="{{ route('profile.friends', CurrentUser()->slug) }}" class="btn btn-xs btn-default">Friends <span class="fa fa-check"></span></a>
@elseif($member->hasFriendRequestFrom(CurrentUser()))
    <a href="{{ route('profile.profile', $member->slug) }}" class="btn btn-xs btn-default">Pending Friend Request</a>
@else
    {!! Form::open(['Method' => 'Post', 'route' => ['send_a_friend_request', $member->id]]) !!}
    {!! Form::hidden('UserId', $member->id) !!}
    {!! Form::submit('Send Friend Request', ['class' => 'btn btn-xs btn-default']) !!}
    {!! Form::close() !!}
@endif