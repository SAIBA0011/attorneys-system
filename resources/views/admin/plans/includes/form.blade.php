<div class="form-group">
    {!! Form::label('title','Plan Title') !!}
    {!! Form::input('text','title', null, ['class' => 'form-control', 'placeholder' => 'Option 1: One conference day only']) !!}
</div>

<div class="form-group">
    {!! Form::label('early_bird_expiry','Early Bird Expiry Date') !!}
    {!! Form::text('early_bird_expiry', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy/mm/dd', 'data-date-format' => 'dd/mm/yyyy']) !!}
</div>

<div class="form-group">
    {!! Form::label('link','Registration Link') !!}
    {!! Form::input('text','link', null, ['class' => 'form-control', 'placeholder' => 'www.google.com']) !!}
</div>

{!! Form::submit($submit, ['class' => 'btn btn-default']) !!}