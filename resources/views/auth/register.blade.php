@extends('layouts.frontend')

@section('content')

    <div class="container"  style="background: url('/assets/frontend/images/uni.jpg') no-repeat; width: 100%; height: 50%; min-height: 650px">
        <div class="row">
            <div class="divider40" style="padding-top: 150px"></div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="background-color: rgba(255, 255, 255, 0.92);">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Please fill out the following information</h3>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['Method' => 'Post']) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! form::label('name', 'Full Name') !!}
                                {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! form::label('email', 'Email Address') !!}
                                {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! form::label('password', 'Password') !!}
                                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! form::label('password_confirmation', 'Confirm Password') !!}
                                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Regsiter', ['class' => 'btn custom-btn-theme btn-block']) !!}
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection