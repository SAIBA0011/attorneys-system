@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'About us'])

        <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
            <div class="row">
                {!! Form::open(['Method' => 'Post', 'route' => 'admin.pages.about.store']) !!}
                <div class="form-group">
                    {!! form::label('title', 'Conference Title') !!}
                    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save Content', ['class' => 'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.partners.includes.summernote')
@endsection