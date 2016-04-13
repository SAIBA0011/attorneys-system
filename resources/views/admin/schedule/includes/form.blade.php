<div class=" form-group bootstrap-timepicker timepicker">
    {!! form::label('time', 'Panel time') !!}
    {!! Form::input('text', 'time', null, ['class' => 'form-control input-small timepicker1']) !!}
</div>

<div class="form-group">
    {!! form::label('title', 'Panel Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Registrations and refreshments']) !!}
</div>

{!! form::label('speaker_pluck', 'Select your Speakers') !!}
<div class="form-group" style="width: 100%!important;">
    @if(isset($panel))
        {!! Form::select('speaker_pluck[]', $speakers, $panel->SpeakerPluck, ['style' => 'width:100%', 'class' => 'form-control','multiple']) !!}
    @else
        {!! Form::select('speaker_pluck[]', $speakers, null, ['style' => 'width:100%', 'class' => 'form-control','multiple']) !!}
    @endif
</div>

<div class="form-group">
    {!! form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'description form-control']) !!}
</div>