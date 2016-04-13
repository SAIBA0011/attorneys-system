@extends('layouts.frontend')

@section('content')
@section('title')
    About the Conference
@endsection
@section('intro')
    @if($event)
        {{ $event->date }}, {{ $event->venue_name }}, {{ $event->venue_city }}
    @else
        <p>There are currently no information available regarding this event.</p>
    @endif
@endsection

<div class="auto-container">
    <div class="row">
        <div class="col-md-12">
            @if(count($about))
                    <div class="row">
                        <div class="divider20"></div>
                        <div class="col-md-4 visible-lg text-center">
                            <div class="divider20"></div>
                            <i class="fa fa-bank" style="font-size: 320px; color: #E8E8E8;"></i>
                        </div>

                            <div class="col-sm-12 col-xs-12 col-md-8">
                                <h6 class="custom-font">{{ $about->title }}</h6>
                                {!! $about->description !!}
                            </div>
                    </div>
            @else
                <div class="divider20"></div>
                <div class="alert alert-danger alert-custom" role="alert">
                    <p>There are currently no information available regarding this event, Please check back later.</p>
                </div>

            @endif
        </div>

        @if(count($speakers))
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <div class="col-md-12">
                            <hr>
                            <h6 class="custom-font">Some of this year's confirmed speakers</h6>
                            <hr>
                            <div class="divider20"></div>
                        </div>

                        @foreach($speakers->slice(0, 4) as $speaker)
                            <div class="col-xs-6 col-md-3">
                                <div class="thumbnail">
                                    <img style="min-width: 100%;" src="{{$speaker->SpeakerImage()}}">
                                        <div class="caption text-center">
                                            <a href="{{route('about.speakers.show', $speaker->slug)}}">
                                                <h8>{{str_limit($speaker->full_name, '20')}}</h8>
                                                <hr style="margin-top: 5px; margin-bottom: 5px">
                                                <p>{{str_limit($speaker->organisation, 30)}}</p>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="divider20"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{route('about.speakers')}}" class="btn btn-default">I would like to see more speakers</a>
                </div>
            </div>
            <div class="divider20"></div>
        @else
        @endif

    </div>
</div>

@endsection