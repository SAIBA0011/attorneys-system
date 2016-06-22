@extends('layouts.frontend')

@section('title')
    Event Speakers {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    @if($event)
        {{ $event->date }}, {{ $event->venue_name }}, {{ $event->venue_city }}
    @else
        <p>There are currently no information available regarding this event.</p>
    @endif
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider20"></div>
            <div class="row">
                <div class="col-md-12">

                    @unless(count($speakers))
                        <div class="alert alert-danger alert-custom" role="alert">
                            <p>The speakers for this event will be available very soon.</p>
                        </div>
                        @endif

                    <div class="row">
                        @foreach($speakers as $speaker)
                            <div class="col-xs-12 col-sm-12 col-md-3">

                                <div class="thumbnail">
                                    <img style="min-width: 100%;" src="{{ $speaker->SpeakerImage() }}">
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

                        {{--<div class="col-md-12">--}}
                            {{--{{$speakers->render()}}--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
    </div>
@endsection