@extends('layouts.frontend')

@section('title')
    Message: {{ str_limit($thread->subject, '20') }}
@endsection
@section('intro')
    Conversation between:
    @foreach($thread->participants as $participant)
        {{ $user->thisUser($participant->user_id)->name }},
    @endforeach
@endsection

@section('content')
    <div class="container">
        <div class="divider40"></div>
        <div class="row">
            <div class="col-md-12">
                @foreach($thread->messages as $message)
                    {{--<div class="media">--}}
                        {{--<a class="pull-left" href="#">--}}
                            {{--<img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->name !!}" class="img-circle">--}}
                        {{--</a>--}}
                        {{--<div class="media-body">--}}
                            {{--<h5 class="media-heading">{!! $message->user->name !!}</h5>--}}
                            {{--<p>{!! $message->body !!}</p>--}}
                            {{--<div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="row">
                        <div class="col-sm-1">
                            <div class="thumbnail">
                                <img src="http://www.gravatar.com/avatar/{{md5($message->user->email)}}?d=http://s24.postimg.org/xzk2umsfl/538474_user_512x512.png" />
                            </div>
                        </div>

                        <div class="col-sm-11">
                            <div class="panel panel-custom panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-reply"></i> <strong>{!! $message->user->name !!}</strong> <span class="text-muted"> Message Received: {!! $message->created_at->diffForHumans() !!}</span>
                                </div>
                                <div class="panel-body">
                                    {!! $message->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <h6>Reply to Conversation</h6>
                {!! Form::open(['route' => ['profile.messages.update', $thread->id], 'method' => 'PUT']) !!}
                        <!-- Message Form Input -->
                <div class="form-group">
                    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Submit Form Input -->
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop