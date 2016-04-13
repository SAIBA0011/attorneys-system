@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'New Speaker'])
        
        <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <i>Speakers that are created here can be used in multiple places,
                           The speakers that are created here can be seen on the front end <a href="{{route('about.speakers')}}" target="_blank">speakers</a> page.
                           Once you have added your speaker you are ready to assign the required speaker to your schedule.
                           Please note that all images that will be uploaded for the partners will be resized to 254px Width and 254px Height.
                       </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => ['admin.speakers.store'], 'files' => true]) !!}
                @include('admin.speakers.includes.form', ['submit' => 'Create Speaker'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.speakers.includes.summernote')
@endsection