<!-- Shows the friend request button on user profile if not friedns, Else Pending or Unfriend. -->
@if(CurrentUser())
    @if($user->isFriendWith(CurrentUser()))
        @if(CurrentUser()->id !== $user->id)
            <div class="row clearfix">
                <div class="col-md-12" style="padding-bottom: 30px;">
                    <div class="pull-left" style="position: absolute; left: 55px;">
                        {!! Form::open(['Method' => 'Post', 'route' => ['unfriend_user', $user->id]]) !!}
                            @include('frontend.profiles.friends.includes.form', ['SubmitButtonText' => 'Unfriend', 'ButtonClass' => 'delete btn btn-danger btn-xs'])
                        {!! Form::close() !!}
                    </div>

                    <div class="pull-right">
                        <a style="position: absolute; right: 49px;" href="#" data-target="#Message_user_modal" data-toggle="modal" class="btn btn-default">Message</a>
                        @include('frontend.profiles.messenger.includes.send-message-modal', ['submit' => 'Send Message'])
                    </div>
                </div>
            </div>
        @endif

        @elseif($user->hasFriendRequestFrom(CurrentUser()))
            <button class="btn btn-info" style="background-color: #ef5505 !important; border-color: #ef5505 !important">Pending Friend Request</button>

        @else
        @if(CurrentUser()->id !== $user->id)
            {!! Form::open(['Method' => 'Post', 'route' => ['send_a_friend_request', $user->id]]) !!}
            @include('frontend.profiles.friends.includes.form', ['SubmitButtonText' => 'Send Friend Request', 'ButtonClass' => 'btn btn-default'])
            {!! Form::close() !!}
        @endif
    @endif
@endif