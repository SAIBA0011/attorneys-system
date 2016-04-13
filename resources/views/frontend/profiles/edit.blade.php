@extends('layouts.frontend')

@section('title')
    {{ $user->name }}
@endsection
@section('intro')
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab ad, alias aut commodi cumque doloribus eveniet, explicabo fugit, id laborum libero minus neque nihil nobis quam voluptatibus? Corporis, saepe?
    </p>
@endsection

@section('content')
    <div class="container visible-lg">
        <div class="row">
            <div class="row profile">
                @include('frontend.profiles.includes.sidebar')
                <div class="col-md-9">
                    {!! Form::model($user->profile, ['Method' => 'Post', 'route' => ['profile.update', $user->slug], 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! form::label('name', 'Full Name') !!}
                                {!! Form::input('text', 'name', $user->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! form::label('email', 'Email Address') !!}
                                {!! Form::input('text', 'email', $user->email, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! form::label('location', 'Location') !!}
                        {!! Form::input('text', 'location', null, ['class' => 'form-control']) !!}
                    </div>

                    <label for="thumbnail">Profile Picture</label>
                    <div class="form-group input-group image-preview">
                        <input type="text" name="thumbnail" value="{{ (isset($user->profile->thumbnail)? basename($user->profile->thumbnail) : "") }}" class="form-control image-preview-filename" disabled="disabled">
                            <span class="input-group-btn">

                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                </button>

                                <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Browse</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif"  name="thumbnail"/>
                                </div>
                            </span>
                    </div>

                    <div class="form-group">
                        {!! form::label('bio', 'My biography') !!}
                        {!! Form::textarea('bio', $user->bio, ['class' => 'description form-control']) !!}
                    </div>

                    <hr>
                    <h6 class="highlight custom-font">Social Information</h6>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! form::label('twitter_username', 'Twitter Username') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    {!! Form::input('text', 'twitter_username', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! form::label('facebook_username', 'Facebook Username') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    {!! Form::input('text', 'facebook_username', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! form::label('github_username', 'Github Username') !!}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                    {!! Form::input('text', 'github_username', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        {!! Form::submit('Update My Profile', ['class' => 'btn btn-default']) !!}
                    </div>
                    {!! Form::close() !!}

                    <hr>
                    <h6 class="highlight custom-font">Account Deletion</h6>
                    <hr>
                    <p>
                        Please note that should you wish to remove your account from the system, you may do so by clicking on delete account.
                        <i>However, Once your account has been removed, we cannot recover any information from your account.</i>
                    </p>
                    <div class="text-left">
                        {!! Form::open(['Method' => 'Post', 'route' => ['profile.account_delete', $user->id]]) !!}
                        {!! Form::submit('Delete my Account', ['class' => 'delete btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('frontend.partials.summernote')
    <script>
        $( document ).ready( function( )
        {
            $( '.delete' ).bootstrap_confirm_delete(
                    {
                        debug:              false,
                        heading:            '<div style="margin-bottom: -26px; margin-top: 0px">Account Removal</div>',
                        message:            'Please note that once your account is deleted you will not be able to access your account anymore. Should you wish to proceed, click on delete ',
                        data_type:          'post',
                        callback:           function ( event )
                        {},
                        delete_callback:    function(event) {
                            // grab original clicked delete button
                            var button = event.data.originalObject;
                            // execute delete operation
                            button.closest('form').submit();
                        },
                        cancel_callback:    function() { console.log( 'cancel button clicked' ); }
                    }
            );
        } );
    </script>
@endsection


