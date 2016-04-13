@extends('layouts.frontend')

@section('title')
    {{ CurrentUser()->name }}
@endsection
@section('intro')
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab ad, alias aut commodi cumque doloribus eveniet, explicabo fugit, id laborum libero minus neque nihil nobis quam voluptatibus? Corporis, saepe?
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
                <div class="col-md-9">
                    <div class="profile-content">
                        <h6>Compose new Message</h6>
                        <hr>
                        {!! Form::open(['route' => 'profile.messages.store']) !!}
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject') !!}
                            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('message', 'Message') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>

                        @if(CurrentUser()->getFriends()->count() > 0)
                            <div class="form-group" >
                                <label for="recipients[]">Please Select your Recipients, Send to one or send to all</label>
                                <select class="user-select" multiple="multiple" name="recipients[]" style="width: 100%" data-placeholder="Please Select your recipients">
                                    @foreach(CurrentUser()->getFriends() as $user)
                                        <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                                        </label>
                                    @endforeach
                                </select>
                            </div>
                        @endif


                        <div class="form-group">
                            {!! Form::submit('Send Message', ['class' => 'btn btn-default']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="divider20"></div>
                <div class="col-md-3">
                    <h6 class="text-center">My Friends</h6>
                    <hr>
                    @if(count(CurrentUser()->getFriends()))
                        <div class="scroll-friends" style="overflow-y: auto;
    max-height: 330px;">
                        @foreach(CurrentUser()->getFriends()->chunk(2) as $chunk)

                            @foreach($chunk as $friend)
                                    <a href="{{route('profile.profile', $friend->slug)}}">
                                        <div class="col-md-12 friend-container" style="margin: 0px">
                                            <img src="//www.gravatar.com/avatar/{!! md5($friend->email) !!}?s=64" alt="{!! $friend->name !!}">
                                            <div class="friend-info">
                                                {{ $friend->name }} <br>
                                                <span class="label label-info">Total Friends: {{count($friend->getFriends())}}</span>
                                            </div>
                                        </div>
                                    </a>
                            @endforeach


                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".user-select").select2();
    </script>
@endsection