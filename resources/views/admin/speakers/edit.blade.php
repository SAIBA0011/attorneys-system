@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Speaker'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($speaker,['Method' => 'Post', 'route' => ['admin.speakers.update', $speaker->slug], 'files' => true]) !!}
                    @include('admin.speakers.includes.form', ['submit' => 'Update Speaker'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.speakers.includes.summernote')
@endsection