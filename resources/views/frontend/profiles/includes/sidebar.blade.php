<div class="col-md-3">
    <div class="profile-sidebar">
        <div class="profile-side-top">
            <div class="profile-userpic">
                <img src="{{ $user->UserImage() }}" class="img-responsive" alt="">
            </div>

            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    {{ ($user->name)? : CurrentUser()->name }}
                </div>
                <div class="profile-usertitle-job">
                    Member Since:
                    {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }} <br>
                    Total Friends: {{ $user->getFriendsCount() }}
                </div>

            </div>

            <div class="profile-userbuttons">
                @include('frontend.profiles.includes.friend-request-form')
            </div>
        </div>

        @if(Auth::check())
            @unless(CurrentUser()->id !== $user->id)
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li style="display: none!important;">{{ $count = CurrentUser()->newMessagesCount() }}</li>

                        <li class="{{isActive('profile/'.CurrentUser()->slug)}}">
                            <a href="{{route('profile.profile', CurrentUser()->slug)}}"><i class="fa fa-home"></i> Dashboard</a>
                        </li>

                        <li class="{{isActive('profile/'.CurrentUser()->slug.'/messages')}}">
                            <a href="{{route('profile.messages', CurrentUser()->slug)}}"><i class="fa fa-envelope"></i> My Messages</a>
                        </li>

                        <li class="{{ isActive('profile/'.CurrentUser()->slug.'/friends') }}">
                            <a href="{{ route('profile.friends', CurrentUser()->slug) }}">
                                <i class="fa fa-users"></i> My Friends
                            </a>
                        </li>

                        <li class="{{ isActive('profile/'.CurrentUser()->slug.'/friend/requests') }}">
                            <a href="{{ route('profile.friendsRequests', CurrentUser()->slug) }}">
                                <i class="fa fa-user-plus"></i> My Friend Requests
                            </a>
                        </li>

                        <li class="{{ isActive('profile/'.CurrentUser()->slug.'/edit') }}">
                            <a href="{{route('profile.edit', CurrentUser()->slug)}}">
                                <i class="fa fa-pencil"></i> Update My Profile
                            </a>
                        </li>

                        {{--<li>--}}
                            {{--<a href="#"><i class="fa fa-cogs"></i> Privacy Settings</a>--}}
                        {{--</li>--}}

                        <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            @endunless
        @endif
        @include('frontend.profiles.messenger.includes.send-message-modal', ['submit' => 'Send Message'])
    </div>
</div>

