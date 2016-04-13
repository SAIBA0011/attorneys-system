@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Add new slider'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            The sliders created on this page will be displayed on the front end home page.
                            Please note that all uplaoded images will be resized to 2000px W, 688px H
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => 'admin.sliders.store', 'files' => true]) !!}
                    @include('admin.sliders.includes.form', ['submit' => 'Create Slider'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection