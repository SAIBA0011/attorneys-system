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
                    <div class="divider20"></div>
                    <h6 class="highlight custom-font">My biography</h6>
                    <hr>
                    @if(strlen($user->profile->bio) >= 12)
                        {!! $user->profile->bio !!}
                    @else
                        <p>
                            This user currently has no bio, Why don't you check back later ?
                        </p>
                    @endif

                    <hr>
                       <div class="text-center">
                           <i class="fa fa-facebook" style="color: #e3e3e3"></i> Facebook: <a href="#">{{ ($user->profile->facebook_username)? : "Not Available"}}</a> <span class="solid-line"></span>
                           <i class="fa fa-twitter" style="color: #e3e3e3"></i> Twitter: {{($user->profile->twitter_username)? : "Not Available"}} <span class="solid-line"></span>
                           <i class="fa fa-github" style="color: #e3e3e3"></i> Github: {{ ($user->profile->github_username)? : "Not Available" }}
                       </div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    {{-- Includes the modal that displays the remove friend function. --}}
    @include('frontend.includes.delete')
@endsection