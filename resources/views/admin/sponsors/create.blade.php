@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'New Sponsor'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            Sponsors created here will be displayed on the front end
                            <a href="{{route('about.sponsors')}}" target="_blank">sponsors</a>
                            page underneath the relative category you have set. To add a new category please
                            <a href="{{route('admin.categories.create')}}">click here</a>.
                            Please note that all images that will be uploaded for the partners will be resized to 400px Width and 200px Height.
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'POST', 'route' => 'admin.sponsors.store', 'files' => true]) !!}
                    @include('admin.sponsors.includes.form', ['submitText' => 'Create Sponsor'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.sponsors.includes.summernote')
    @include('admin.includes.clear-select')
@endsection