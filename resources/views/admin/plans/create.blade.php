@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'New Price Plan'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            Pricing plans created here will be displayd on the front end <a
                                    href="{{route('bookings.show')}}" target="_blank">bookings</a> page.
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'POST', 'action' => 'Admin\AdminPricePlanController@store']) !!}
                    @include('admin.plans.includes.form', ['submit' => 'Create Plan'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.plans.includes.date-picker')
@endsection