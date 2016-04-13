@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Create a new day'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            Days that are created here will display only on the front end
                            <a href="{{route('schedule')}}" target="_blank">schedule</a> page.
                            Please select one of the following available days to add to the site.
                            Once you have selected a day, please select a required date for this day,
                            Example: Day one will be held on 19 Feb 2016 and Day Two will be held on 20 Feb 2016
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => ['admin.days.store']]) !!}
                @include('admin.days.includes.form', ['submit' => 'Submit'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.days.includes.time-picker')
@endsection