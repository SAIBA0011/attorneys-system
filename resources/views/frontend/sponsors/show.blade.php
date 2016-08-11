@extends('layouts.frontend')

@section('title')
    Event Sponsors {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    {{$sponsor->title}}
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider40"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <img src="{{$sponsor->SponsorImage()}}" class="thumbnail" style="max-width: 100%; max-height: 100%" alt="">
                        <p><a href="{{route('about.sponsors')}}" class="btn btn-default btn-block">Back to Sponsors</a></p>
                    </div>

                    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                        <h6 class="custom-font">{{$sponsor->title}}</h6>
                        <p>{!! $sponsor->description !!}</p>

                        <hr>
                        <i class="fa fa-globe" style="color: #e3e3e3"></i> Website: <a href="{{ ($sponsor->website)? : "#" }}">{{ ($sponsor->website)? : "No website suplied" }}</a> <span class="solid-line"></span>
                        <i class="fa fa-envelope" style="color: #e3e3e3"></i> Email Address: {{ ($sponsor->email)? : "No email suplied" }} <span class="solid-line"></span>
                        <i class="fa fa-phone" style="color: #e3e3e3"></i> Phone Number: {{ ($sponsor->contact_number)? : "No number suplied" }}
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection