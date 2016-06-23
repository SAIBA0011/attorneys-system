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
                        <h6 class="highlight custom-font">My Friends</h6>
                        <hr>
                        <div class="friends-container">
                            <div class="row">
                                <!-- Check for current logged in users friends -->
                                @if(count($user->getFriends(10)))
                                    @foreach($user->getFriends()->chunk(2) as $chunk)
                                        @foreach($chunk as $friend)
                                            <a href="{{route('profile.profile', $friend->slug)}}">
                                                <div class="col-md-5 friend-container">
                                                    <img src="{{ $friend->UserImage() }}" style="border-radius: 50%" alt="{{ ucwords($friend->name) }}" width="23%"/>
                                                    <div class="friend-info">
                                                        {{ ucwords($friend->name) }} <br>
                                                        <span class="label label-default">Member Since {{ Carbon\Carbon::parse($friend->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endforeach

                                @else
                                    <div class="col-md-12">
                                        <p>You currently have no friends available.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection