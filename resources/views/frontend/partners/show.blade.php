@extends('layouts.frontend')

@section('title')
    Event Partner {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    {{$partner->title}}
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider40"></div>
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                        <img src="{{$partner->PartnerImage()}}" width="100%" class="thumbnail" alt="">
                        <p><a href="{{route('about.partners')}}" class="btn btn-default btn-block">Back to Partners</a></p>
                    </div>
                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-9">
                        <h6 class="custom-font">{{$partner->title}}</h6>
                        {!! $partner->description !!}

                        <hr>
                        <i class="fa fa-globe" style="color: #e3e3e3"></i> Website: <a href="{{ ($partner->website)? : "#" }}">{{ ($partner->website)? : "No website suplied" }}</a> <span class="solid-line"></span>
                        <i class="fa fa-envelope" style="color: #e3e3e3"></i> Email Address: {{ ($partner->email)? : "None" }} <span class="solid-line"></span>
                        <i class="fa fa-phone" style="color: #e3e3e3"></i> Phone Number: {{ ($partner->contact_number)? : "None" }}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection