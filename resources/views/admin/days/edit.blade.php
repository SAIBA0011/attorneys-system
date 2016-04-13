@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => ' Edit '. ''. $day->title])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($day, ['Method' => 'PATCH', 'route' => ['admin.days.update', $day->id]]) !!}
                @include('admin.days.includes.form', ['submit' => 'Update'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.days.includes.time-picker')
@endsection