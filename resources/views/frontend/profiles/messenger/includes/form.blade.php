    <div class="form-group">
        {!! Form::label('subject', 'Subject') !!}
        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Message') !!}
        {!! Form::textarea('message', null, ['class' => 'message form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::hidden('recipients[]', $user->id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
    </div>
