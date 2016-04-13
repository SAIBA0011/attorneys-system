@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">{{ucwords($panel->title)}} </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::model($panel, ['method' => 'PATCH', 'route' => ['admin.streamPanel.update', $panel->id] ]) !!}
                @include('admin.schedule.includes.form')
                {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}
                <a href="{{ url()->previous() }} " class="btn btn-default">Back</a>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @include('admin.schedule.includes.script')
@endsection