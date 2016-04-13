@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => ucwords($day->title)])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            The information created on this page will display on the front end <a href="{{route('schedule')}}" target="_blank">schedule</a> page underneath the relative day.
                            This content will fill your plenary sessions as well as your streams.
                            In order to fill content for another day navigate to the sidebar and select a different  day
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <h4>Plenary Panels</h4>
                <hr>
                @foreach($day->panels as $panel)
                    <div class="panel-group">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <a class="panel-title" data-toggle="collapse" href="#panel{{ $panel->id  }}">
                                    <i class="fa fa-clock-o"> {{ date('G:i', strtotime($panel->time)) }} </i> - {{$panel->title}}
                                </a>
                            </div>

                            <div id="panel{{$panel->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{!! $panel->description !!}</p>
                                    <hr>

                                    @if(count($panel->speaker))
                                        @foreach($panel->speaker as $speaker)
                                                <p>
                                                <i class="fa fa-microphone"></i>
                                                {{$speaker->full_name}},
                                                {{$speaker->job_title}},
                                                {{$speaker->organisation}}
                                            </p>
                                        @endforeach
                                    @else
                                        <p>There are no speakers</p>
                                    @endif

                                </div>
                                <div class="panel-footer">
                                    {!! Form::open(['Method' => 'DESTROY', 'route' => ['admin.plenary.destroy', $panel->id]]) !!}

                                    <a class="btn btn-xs btn-info" href="{{route('admin.plenary.edit', $panel->id)}}">
                                        <i class="fa fa-pencil"></i> Edit Panel
                                    </a>

                                    {!! Form::submit('Delete Panel', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => ['admin.plenary.store', $day->id]]) !!}
                {!! Form::hidden('day_id' ,$day->id, null, ['class' => 'form-control']) !!}

                <button type="button" class="btn btn-xs btn-default" data-toggle="modal"
                        data-target=".plenary_panel"><i class="fa fa-plus"></i> Add Plenary Panels
                </button>

                <button type="button" class="btn btn-xs btn-default" data-toggle="modal"
                        data-target="#create_stream_modal"><i class="fa fa-plus"></i> Create Stream for {{$day->title}}
                </button>

                @include('admin.schedule.includes.plenary_panels')
                {!! Form::close() !!}

                @include('admin.streams.create')
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @foreach($day->streams as $stream)
                    <hr><h4>{{$stream->title}}</h4><hr>

                    @foreach($stream->panels as $panel)
                        <div class="panel-group">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <a class="panel-title" data-toggle="collapse" href="#stream{{ $panel->id  }}">
                                        <i class="fa fa-clock-o"> {{ date('G:i', strtotime($panel->time)) }} </i> - {{$panel->title}}
                                    </a>
                                </div>

                                <div id="stream{{$panel->id}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>{!! $panel->description !!}</p>
                                        <hr>

                                        @if(count($panel->speakers) >= 1)
                                            @foreach($panel->speakers as $speaker)
                                                <p>
                                                    <i class="fa fa-microphone"></i>
                                                    {{$speaker->full_name}},
                                                    {{$speaker->job_title}},
                                                    {{$speaker->organisation}}
                                                </p>
                                            @endforeach
                                        @else
                                            <p>There are no speakers</p>
                                        @endif
                                    </div>

                                    <div class="panel-footer">
                                        {!! Form::open(['Method' => 'DESTROY', 'route' => ['admin.streamPanel.destroy', $panel->id]]) !!}

                                        <a class="btn btn-xs btn-info" href="{{route('admin.streamPanel.edit', $panel->id)}}">
                                            <i class="fa fa-pencil"></i> Edit Panel
                                        </a>

                                        {!! Form::submit('Delete Panel', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('admin.schedule.includes.stream_panels', $stream)

                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.stream.destroy', $stream->id]]) !!}
                    <button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target=".stream_panel-{{$stream->id}}"><i
                                class="fa fa-plus"></i> Add Panel for {{ $stream->title }}
                    </button>
                    {!! Form::submit('Delete '. $stream->title, ['class' => 'delete btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!}

                @endforeach
                    <br>
                    <br>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.schedule.includes.script')
    @include('admin.includes.clear-select')
@endsection