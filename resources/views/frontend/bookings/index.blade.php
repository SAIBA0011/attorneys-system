@extends('layouts.frontend')

@section('title')
    Event Tickets {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    Book your tickets to this conference by using one of the following options below.
@endsection

@section('content')
    @if(count($plans))
        <div class="auto-container">
            {{--<div class="row">--}}
                {{--<div class="divider20"></div>--}}
                {{--<div class="col-sm-12 col-xs-12 col-md-12 text-center">--}}
                    {{--<h6 style="color: #00A297;" class="margin-bottom-0"><small style="color: #00A297">Early bird prices expire on {{date_format(Carbon\Carbon::parse(App\Models\PricePlan::first()->early_bird_expiry), 'd F Y')}}</small></h6>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="row">
                <div class="divider20"></div>
                @foreach($plans as $plan)
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6" id="home-box">
                        <div class="pricing_header">
                            <p class="text-center">{{ucfirst($plan->title)}}</p>
                            <div class="space"></div>
                        </div>
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <th>Available Options</th>
                            @if($plan->early_bird_expiry >= \Carbon\Carbon::today())
                                <th>Early Bird</th>
                            @endif
                            <th>Full Price</th>
                            </thead>
                            <tbody>
                            @foreach($plan->PlanOption as $option)
                                <tr>
                                    <td>{{$option->title}}</td>
                                    @if($plan->early_bird_expiry >= \Carbon\Carbon::today())
                                        <td>{{$option->early_bird}}</td>
                                    @endif
                                    <td>{{$option->full_price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a class="btn btn-default btn-block" href="{{$plan->link}}" target="_blank" type="button">Register Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="row"><div class="auto-container">
                <div class="divider20"></div>
                <div class="alert alert-danger custom-alert" role="alert">
                    There are currently no available tickets for this conference, Please check back later.
                </div>
            </div>
            </div>
        @endif
        </div>
@endsection