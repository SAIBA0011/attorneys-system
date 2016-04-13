@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'System overview'])

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-microphone fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(\App\Models\Speaker::all())}}</div>
                                <div>Total Presenters</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.speakers.index')}}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Speakers</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-calendar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(\App\Models\Day::all())}}</div>
                                <div>Total Event Days</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.days')}}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Days</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-suitcase fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(App\Models\Partner::all())}}</div>
                                <div>Total Partners</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.partners.show')}}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-star fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(App\Models\Sponsor::all())}}</div>
                                <div>Total Sponsors</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.sponsors.view')}}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-newspaper-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(App\Models\Newsletter::all())}}</div>
                                <div>Email Subscribers</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.newsletter.subscribers')}}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-image fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(App\Models\Slider::all())}}</div>
                                <div>Sliders</div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.sliders.show') }}">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Sliders</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default panel-custom">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-ticket fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count(App\Models\PricePlan::all())}}</div>
                                <div>Registration Plans</div>
                            </div>
                        </div>
                    </div>

                    <a href="#">
                        <div class="panel-footer custom-panel-footer">
                            <span class="pull-left">View Plans</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right" style="color: white"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <h1 class="page-header">
                    Members per Month
                </h1>
            </div>
            <canvas id="newspeakers" height="200px"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/chartjs.min.js"></script>
    <script>
        var months = {!! json_encode($months) !!};
        var labels = Object.keys(months);
        var dataArray = Object.keys(months).map(function(k){return months[k]});
        var data = {
            labels: labels,
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: dataArray
                }
            ]
        };

        // Get the context of the canvas element we want to select
        var countries= document.getElementById("newspeakers").getContext("2d");
        new Chart(countries).Bar(data);
    </script>

@endsection