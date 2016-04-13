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
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>