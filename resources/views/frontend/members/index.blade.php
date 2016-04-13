@extends('layouts.frontend')

@section('title')
    Members {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    A list of members that has joined our community.
@endsection

@section('content')

    <div class="auto-container">
        @if(count($members))
            <div class="row">
                <div class="divider20"></div>
                @foreach ($members->chunk(3) as $chunk)
                    <div class="row">
                        @foreach($chunk as $member)
                            <div class="list-friend">
                                <div class="col-md-4">
                                    <div class="media friend-container" style=" width: 100%; border: 1px dotted #e3e3e3;">
                                        <a class="pull-left" href="{{ 'profile/'.$member->slug }}">
                                            <img style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius: 50%; width: 23%;" src="{{  $member->UserImage() }}" alt="{{ ucwords($member->name) }}"/>
                                        </a>
                                        <div class="friend-info" style="top: 7px">
                                            <a href="{{ 'profile/'.$member->slug }}"> {{ ucwords($member->name) }} </a> <br>
                                            <span class="label label-default">Member Since {{ Carbon\Carbon::parse($member->created_at)->diffForHumans() }}</span>
                                            <div class="divider20" style="padding-bottom: 0px"></div>
                                            @if(auth()->check())
                                                @include('frontend.members.includes.friend-request')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <div class="text-center">
                    <div class="divider20"></div>
                    {{ $members->render() }}
                </div>

            </div>
        @else
            <div class="divider20"></div>
            <div class="alert alert-info alert-custom">
                <p>There are currently no users on the site.</p>
            </div>
        @endif
    </div>
@endsection