@extends('layouts.frontend')

@section('content')

@section('title')
    {{$speaker->full_name}}
@endsection
@section('intro')
    {{str_limit($speaker->job_title)}}
@endsection

<div class="container">
    <div class="row">
        <div class="divider20"></div>
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <img style="min-width: 100%;" src="{{$speaker->SpeakerImage()}}">
                </div>

                <div class="text-center">
                    <div class="hidden">
                        {{ $percent = (round($speaker->averageRating()->first(), 0) / 100) * 1000 }}
                    </div>
                    <div class="star-ratings-sprite"><span style="width:{{$percent}}%" class="rating"></span></div>
                </div>

                <div class="divider20"></div>
                <div class="form-group text-center">
                   @if(CurrentUser())
                        <button data-toggle="modal" data-target="#speaker-ratings" class="btn btn-default">Rate Presenter</button>
                        @include('frontend.speakers.includes.speaker-ratings')
                    @endif
                    <a href="{{route('about.speakers')}}" class="btn btn-default">Back To Speakers</a>
                </div>
            </div>

            <div class="col-md-9">
                <p>{!! $speaker->bio !!}</p>

                <hr>
                <i class="fa fa-globe" style="color: #e3e3e3"></i>
                Website: {{str_limit(($speaker->website)? : "No website Supplied", 25)}} <span class="solid-line"></span>
                <i class="fa fa-envelope" style="color: #e3e3e3"></i>
                Email Address: {{str_limit(($speaker->email)? : "No email Supplied", 15)}} <span class="solid-line"></span>
                <i class="fa fa-phone" style="color: #e3e3e3"></i>
                Contact Number:  {{($speaker->contact_number)? : "No number Supplied"}}
                <hr>


            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('global-includes.stars')
@endsection