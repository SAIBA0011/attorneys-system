@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Partners'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($partner, ['Method' => 'Post', 'route' => ['admin.partners.update', $partner->slug], 'files' => true]) !!}
                    @include('admin.partners.includes.form', ['submit' => 'Update Partner'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.partners.includes.summernote')
@endsection