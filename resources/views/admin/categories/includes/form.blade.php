<div class="form-group">
    {!! form::label('title', 'Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Gold Sponsors']) !!}
</div>

<div class="form-group">
    {!! form::label('position', 'Dispaly Position, "1 for first, 100 for last"') !!}
    {!! Form::input('text', 'position', null, ['class' => 'form-control bfh-number']) !!}
</div>

<div class="form-group">
    {!! form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitText, ['class' => 'btn btn-default']) !!}
</div>