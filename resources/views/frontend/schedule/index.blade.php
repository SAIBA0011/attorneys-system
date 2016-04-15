@extends('layouts.frontend')

@section('content')

@section('title')
    Conference Schedule 2016
@endsection
@section('intro')
    @if($file)
        Please see the conference schedule below. You can also download the conference programme in .PDF format.
    @else
        <br>
    @endif
@endsection

<div class="container visible-lg">
    <div class="divider20"></div>
    <div class="row">

        <div class="col-md-12">
            @unless(count($days))
                <div class="alert alert-danger alert-custom" role="alert" >
                    <p>The programme for this year's conference will be available very soon.</p>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @if(count($days))
                <div class="divider20"></div>
                    <ul class="nav nav-tabs">
                        @foreach($days as $day)
                            <li>
                                <a class="text-center" id="hover-day" data-toggle="tab" href="#{{$day->id}}">
                                    <span class="large">{{$day->title}}</span>
                                    <br> {{\Carbon\Carbon::parse($day->date)->format('d-F')}}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                <div class="tab-content">
                    @foreach($days as $day)
                        <div id="{{$day->id}}" class="tab-pane fade in">

                            <ul class="nav nav-pills nav-justified agenda-tabs">
                                <li class="active"><a class="text-center " data-toggle="tab" href="#plenary{{$day->id}}">Plenary Session</a></li>
                                @foreach($day->streams as $stream)
                                    <li><a class="text-center " data-toggle="tab" href="#stream{{ $stream->id }}">{{$stream->title}}</a></li>
                                @endforeach
                            </ul>

                            <div class="tab-content custom-border">
                                <div id="plenary{{$day->id}}" class="tab-pane fade in active">
                                    @if(count($day->panels))
                                        @foreach($day->panels as $plenary)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-1 sideline visible-lg"></div>
                                                    <div class="col-md-1 col-sm-1 visible-lg">
                                                        <div class="speaker-wrapper"><i class="fa fa-calendar agenda-icon"></i></div>
                                                    </div>
                                                    <div class="col-md-10 col-xs-12 col-sm-12">
                                                        <br>
                                                        <a class="line-icon-tag" style="text-decoration: none" data-toggle="collapse" href="#default{{$plenary->id}}" aria-expanded="false" aria-controls="default{{$plenary->id}}">
                                                           <span class="fa fa-clock-o"></span> {{date('G:i', strtotime($plenary->time))}} <br> {{$plenary->title}}
                                                        </a>

                                                        <hr>

                                                        <div class="collapse" id="default{{$plenary->id}}">
                                                            <div class="well">
                                                                <p>{!! $plenary->description !!}</p>

                                                                @foreach($plenary->speaker as $speaker)
                                                                    <p>
                                                                        <i class="fa fa-user" style="color: #989494"></i>
                                                                        {{ $speaker->full_name }}, {{ $speaker->job_title }}, {{$speaker->organisation}}
                                                                    </p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-1 sideline visible-lg"></div>
                                                <div class="col-md-1 visible-lg">
                                                    <div class="speaker-wrapper"><i class="fa fa-calendar agenda-icon"></i></div>
                                                </div>
                                                <div class="col-md-10">
                                                    <br>
                                                    <a style="text-decoration: none">{{ \Carbon\Carbon::now()->toDateString() }}<br>There are currently no plenary sessions available for <span style="text-transform: lowercase">{{$day->title}}.</span></a>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>


                                @foreach($day->streams as $stream)
                                    <div id="stream{{$stream->id}}" class="tab-pane fade in">
                                        @if(count($stream->panels))
                                            @foreach($stream->panels as $panel)

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-1 sideline visible-lg"></div>
                                                        <div class="col-md-1 col-sm-1 visible-lg">
                                                            <div class="speaker-wrapper"><i class="fa fa-calendar agenda-icon"></i></div>
                                                        </div>

                                                        <div class="col-md-10 col-xs-12 col-sm-12">
                                                            <div class="divider20"></div>
                                                            <a style="text-decoration: none" data-toggle="collapse" href="#panel-default{{$panel->id}}" aria-expanded="false" aria-controls="panel-default{{$panel->id}}">
                                                                <i class="fa fa-clock-o"></i> {{ date('G:i', strtotime($panel->time)) }} <br> {{$panel->title}}
                                                            </a>
                                                            <hr>
                                                            <div class="collapse" id="panel-default{{$panel->id}}">
                                                                <div class="well">
                                                                    <p>{!! $panel->description !!}</p>
                                                                    @foreach($panel->speakers as $speaker)
                                                                        <p><i class="fa fa-user" style="color: #989494"></i> {{ $speaker->full_name }}, {{ $speaker->job_title }}, {{$speaker->organisation}}</p>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-1 sideline visible-lg"></div>
                                                    <div class="col-md-1 visible-lg">
                                                        <div class="speaker-wrapper"><i class="fa fa-calendar agenda-icon"></i></div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <br>
                                                        <a style="text-decoration: none">{{ \Carbon\Carbon::now()->toDateString() }}<br>There are currently no stream information available.</a>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <br>
                </div>
                <div class="text-center">
                    @if($file)
                        <a href="{{ $file->file }}" target="_blank" download="{{ $file->title }}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> Download schedule</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<div class="auto-container visible-xs visible-sm visible-md">
    <div class="row">
        <div class="col-md-12">
            <div class="divider20"></div>
            <p>Kindly note that the confernce schedule is not available on mobile devices. Please click on the "Download schedule" button below to download the guide to your phone in .PDF Format.
                Please note that this is the schedule for 2015, the new schedule will be uploaded soon
            </p>

            @if($file)
                <a href="{{$file->file}}" target="_blank" download="{{$file->title}}" class="btn btn-default"><i class="fa fa-file-pdf-o"></i> Download schedule</a>
            @endif
        </div>
    </div>
</div>
{{--Day Id{{ dd(App\Models\Day::first()->id) }}--}}
@endsection

@section('scripts')
    <script>
        $(function(){
            $(document).on('click','a.drop-info',function(e){
                ($(this))
            });
        });
        $(".nav-tabs li:first").addClass("active");
        @if(count($days))
            $('#{{ App\Models\Day::first()->id }}').addClass("active")
        @endif
    </script>
@endsection
