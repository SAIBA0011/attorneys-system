@extends('layouts.frontend')

@section('content')
    @include('frontend.partials.slider')

    <section class="section dark section">
        <div class="divider20"></div>
        <div class="auto-container">
            <div class="row">
                @if(count($boxes))
                    @foreach ($boxes->slice(0, 3) as $box)
                        <div class="col-md-4 col-sm-4 text-center">
                            <i style="font-size: 35px; color: #cccccc;" class="fa {{ $box->icon }}"></i>
                            <a href="{{$box->link}}"><h6 class="highlight custom-font">{{$box->title}}</h6></a> <hr>
                            <p>{{$box->short_description}}</p>
                        </div>
                    @endforeach
                @else
                    @for($i=0; $i<3; $i++)
                        <div class="col-md-4 col-sm-4 text-center">
                            <i style="font-size: 35px; color: #cccccc;" class="fa fa-home"></i>
                            <h6 class="highlight custom-font">Place Holder</h6><hr>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda, atque corporis culpa.</p>
                        </div>
                    @endfor
                @endif
            </div>
            <div class="divider20"></div>
        </div>
    </section>

    <section class="light-bg section">
        <hr>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-sm-3 text-center hidden-xs hidden-sm">
                        <br>
                        <i class="fa fa-bank" style="font-size: 171px; color: lightgrey;"></i>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        @if(count($about))
                            <div class="row">
                                <h6 class="highlight custom-font">{{$about->title}}</h6>
                                {!! str_limit($about->description, 450) !!} <br>
                                <p><a href="{{route('about.show')}}" class="btn btn-default">Read More..</a></p>
                            </div>
                        @else
                            <div class="row">
                                <h6 class="highlight custom-font">Place Holder Title</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at blanditiis cum eveniet nihil placeat qui recusandae repudiandae saepe! Corporis culpa deserunt eos exercitationem expedita nostrum rem tenetur vero voluptatibus?
                                </p> <br>
                                <p><a href="{{route('about.show')}}" class="btn btn-default">Read More..</a></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>

    <!-- Include sponsor carousel slider -->
    @include('frontend.partials.sponsor-slider')

    <!-- Include newsletter subscribe form -->
    @include('frontend.partials.newsletter')

    {{--<!-- Include Speakers -->--}}
    {{--@include('frontend.partials.speakers')--}}

    @stop

    <!-- Slider Script -->
    @section('scripts')
        <script type="text/javascript" src="/assets/frontend/js/custom.js"></script>
    @stop