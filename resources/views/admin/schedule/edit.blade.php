@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => ucwords($panel->title)])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($panel, ['method' => 'PATCH', 'route' => ['admin.plenary.update', $panel->id] ]) !!}
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