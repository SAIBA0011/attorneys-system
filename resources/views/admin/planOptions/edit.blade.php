@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Feature'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($option, ['Method' => 'Post', 'route' => ['admin.PlanOption.update', $option->id]]) !!}

                <div class="form-group">
                    {!! Form::label('title','Option Title') !!}
                    {!! Form::input('text','title', null, ['class' => 'form-control', 'placeholder' => 'One Day Only']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('full_price','Full Price') !!}
                    {!! Form::input('text','full_price', null, ['class' => 'form-control', 'placeholder' => 'R500.00']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('early_bird','Early Bird Price') !!}
                    {!! Form::input('text','early_bird', null, ['class' => 'form-control', 'placeholder' => 'R250.00']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-default']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection