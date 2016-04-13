@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Sponsor'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($sponsor, ['Method' => 'POST', 'route' => ['admin.sponsors.update', $sponsor->id], 'files' => true]) !!}
                    @include('admin.sponsors.includes.form', ['submitText' => 'Update Sponsor'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.sponsors.includes.summernote')
@endsection