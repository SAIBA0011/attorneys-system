@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit About Us'])

        <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
            <div class="row">
                {!! Form::model($about, ['Method' => 'Post', 'route' => ['admin.pages.about.update', $about->id]]) !!}
                <div class="form-group">
                    {!! form::label('title', 'Title') !!}
                    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save Changes', ['class' => 'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.partners.includes.summernote')
@endsection