<nav class="navbar navbar-default navbar-static-top">
    <div class="auto-container" style="margin-top: 20px; margin-bottom: 5px">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand hidden-sm hidden-xs" href="/"><img src="/assets/frontend/img/logo-1.png" style="max-width: 170px;" alt=""></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{isActive('/')}}"><a href="{{'/'}}">Home</a></li>

                <li class="dropdown {{isActive('about', true)}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> About <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="{{isActive('about')}}"><a href="{{route('about.show')}}">The Conference</a></li>
                        <li class="{{isActive('about/sponsors', 'sponsors/')}}"><a href="{{route('about.sponsors')}}">Sponsors</a></li>
                        <li class="{{isActive('about/partners', 'partners/')}}"><a href="{{route('about.partners')}}">Partners</a></li>
                        <li class="{{isActive('about/speakers', 'speakers/')}}"><a href="{{route('about.speakers')}}">Speakers</a></li>
                    </ul>
                </li>

                <li class="{{isActive('schedule')}}"><a href="{{route('schedule')}}">Agenda</a></li>

                <li class="dropdown {{isActive('members', true)}}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Members <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="{{isActive('members')}}"><a href="{{route('members.show')}}">Show Members</a></li>
                    </ul>
                </li>

                {{--<li class="{{isActive('frontend.forum')}}"><a href="{{route('frontend.forum')}}">Forum</a></li>--}}

                <li class="{{isActive('bookings')}}"><a href="{{ route('bookings.show') }}">Book Your Tickets</a></li>

                <li><a href="/contact">Contact Us</a></li>

                @unless(auth()->check())
                    <li style="border-left: 1px solid #e3e3e3;"><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                    <li><a href="/register"><i class="fa fa-unlock"></i> Register</a></li>
                @endunless
            </ul>

            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::check())

                    <li class="dropdown {{isActive('profile', true)}}" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ CurrentUser()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="top: 135% !important;">

                            @if(CurrentUser()->isAdmin())
                                <li><a href="{{route('admin.dashboard')}}">Admin Section</a></li>
                            @endif

                            <li style="display: none">{{ $count = CurrentUser()->newMessagesCount() }}</li>
                            <li class="{{isActive('profile/'.CurrentUser()->slug)}}"><a href="{{route('profile.profile', CurrentUser()->slug)}}">My Account</a></li>
                            <li class="{{isActive('profile/'.CurrentUser()->slug.'/messages')}}">
                                <a href="{{route('profile.messages', CurrentUser()->slug)}}">My Messages
                                    @if($count > 0)
                                        <span class="label label-success" style="border-radius: 50%">{!! $count !!}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="{{ isActive('profile/'.CurrentUser()->slug.'/friends') }}">
                                <a href="{{ route('profile.friends', CurrentUser()->slug) }}">My Friends</a>
                            </li>

                            <li><a href="/logout">Log Out</a></li>
                        </ul>
                    </li>

                <span class="solid-line"></span>

                <li class="dropdown">
                    <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i style="color: #cccccc; font-size: 16px;" class="fa fa-user-plus"></i>
                        @if(count(CurrentUser()->getFriendRequests()))
                            <span class="label label-danger label-count">{{count(CurrentUser()->getFriendRequests())}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-messages" style="top: 135% !important;">
                        <li>
                            @if(count(CurrentUser()->getFriendRequests()))
                                @foreach(CurrentUser()->getFriendRequests()->slice(0,3) as $friendRequest)
                                    @include('frontend.profiles.friends.includes.navbar-accept-friend-request')
                                @endforeach
                            @else
                                <a class="text-center" href="#">
                                    No new friend requests
                                </a>
                            @endif

                        </li>
                        <li >
                            <a class="text-center" style="padding: 5px; min-height: 0px" href="{{ route('profile.friendsRequests', CurrentUser()->slug) }}">
                                <strong>Show all</strong>
                                <i style="color: #cccccc; font-size: 16px;" class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>

                    <span class="solid-line"></span>
                <!-- /.dropdown -->
                    <li class="dropdown">
                        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i style="color: #cccccc" class="fa fa-envelope-o"></i>
                            <span class="hidden">{{ $count = CurrentUser()->newMessagesCount() }}</span>
                            @if($count > 0)
                                <span class="label label-danger label-count-meesages">{!! $count !!}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-messages" style="top: 135% !important;">
                            <li>
                                @include('frontend.profiles.messenger.includes.new-message-nav')
                            </li>
                            <li>
                                <a class="text-center" style="padding: 5px; min-height: 0px" href="{{route('profile.messages', CurrentUser()->slug)}}">
                                    <strong>Show all</strong>
                                    <i style="color: #cccccc; font-size: 16px;" class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>

