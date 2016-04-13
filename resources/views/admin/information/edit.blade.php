@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Update Event Information'])
        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            Information created on this page will be displayed all over the website, Please ensure that you fill all the required information.
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
                {!! Form::model($information, ['Method' => 'post', 'route' => ['admin.event_update', $information->id]]) !!}
                    @include('admin.information.includes.form', ['SubmitText' => 'Save Changes'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection