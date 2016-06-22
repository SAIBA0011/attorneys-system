{!! form::label('title', 'Day Title') !!}
<div class="form-group" style="width: 100%!important;">
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'style' => 'width:100%']) !!}
</div>

<div class="form-group">
    {!! form::label('date', 'Date') !!}
    {!! Form::input('text', 'date', null, ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Please select date']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>