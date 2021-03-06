@extends('layouts.frontend')

@section('title')
    {{ $user->name }}
@endsection
@section('intro')
    <p>
        @if($event)
            {{ $event->title }}, {{$event->venue_name}}, {{ $event->date }}
        @else
            Event / Conference title
        @endif
    </p>
@endsection

@section('content')
    <div class="container visible-lg">
        <div class="row">
            <div class="row profile">
                @include('frontend.profiles.includes.sidebar')
                <div class="col-md-9">
                    <div class="profile-content">
                        <h6 class="highlight custom-font">New Friend Requests</h6>
                        <hr>
                        <!-- Check for any new friend requests and display the friend request accept form. -->
                        @if(CurrentUser())
                            @if(CurrentUser()->id == $user->id)
                                @if(count($user->getFriendRequests()))
                                    @foreach($user->getFriendRequests() as $friendRequest)
                                        <div class="friends-container">
                                            @include('frontend.profiles.friends.includes.accept_friend_request')
                                        </div>
                                    @endforeach
                                    @else
                                    <p>You have no new pending friend requests.</p>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection