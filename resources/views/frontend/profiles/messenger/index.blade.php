@extends('layouts.frontend')

@section('title')
    {{ CurrentUser()->name }}
@endsection
@section('intro')
    <p>
        @if($event)
            {{ $event->title }}, {{$event->venue_name}}, {{ $event->date }}
        @else
            Event / Conference title
        @endif
    </p>
    {{--<div class="profile-info" style="padding-top: 10px">--}}
    {{--<i style="color: #ef5505" class="fa fa-envelope"></i> 10 new Messages <span class="solid-line"></span>--}}
    {{--<i style="color: #ef5505" class="fa fa-users"></i> 1 New Friend Request <span class="solid-line"></span>--}}
    {{--<i style="color: #ef5505" class="fa fa-comment"></i> 0 Forums <span class="solid-line"></span>--}}
    {{--</div>--}}
@endsection

@section('content')
    <div class="container visible-lg">
        <div class="row">
            <div class="row profile">
                @include('frontend.profiles.includes.sidebar')
                <div class="col-md-9">
                    <div class="profile-content">
                       <div class="hide">
                           {{ $count = Auth::user()->newMessagesCount() }}
                       </div>

                        <div class="pull-left"><h6 class="highlight custom-font">My Messages
                                @if($count > 0)
                                    ({!! $count !!} New)
                                @endif
                                </h6></div>
                        <div class="pull-right">
                            <a href="{{route('profile.messages.create')}}" class="btn btn-default">Compose New Message</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <table class="table table-bordered table-responsive">
                            <thead>
                                <th>From Sender</th>
                                <th>Message Subject</th>
                                <th>Message Content</th>
                                <th>Message received</th>
                                <th class="text-center">Status</th>
                            </thead>
                            <tbody>
                            @if($threads->count() > 0)
                                @foreach($threads as $thread)
                                    <tr>
                                        <td>{{ link_to('profile/messages/' . $thread->id, $thread->participantsString(Auth::id())) }}</td>
                                        <td>{!! link_to('profile/messages/' . $thread->id, str_limit($thread->subject, 10)) !!}</td>
                                        <td>{!! str_limit($thread->latestMessage->body, 25) !!}</td>
                                        <td style="width: 18%">{!! Carbon\Carbon::parse($thread->latestMessage->created_at)->diffForHumans() !!}</td>
                                        <td class="text-center" style="width: 10%;">
                                            @if($thread->isUnread($currentUserId))
                                                <a href="" data-toggle="tooltip" title="Message Unread"><img width="40%" src="/assets/frontend/img/unread1.png" alt="Unread"></a>
                                            @else
                                                <a href="" data-toggle="tooltip" title="Message Read"><img width="40%" src="/assets/frontend/img/read1.png" alt="Read"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="10">Sorry, You have no messages</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $threads->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection