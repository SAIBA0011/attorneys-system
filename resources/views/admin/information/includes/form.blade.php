<div class="form-group">
    {!! form::label('title', 'Event Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'My Conference']) !!}
</div>
<div class="form-group">
    {!! form::label('date', 'Venue Date') !!}
    {!! Form::input('text', 'date', null, ['class' => 'form-control', 'placeholder' => '12 & 13 April 2016']) !!}
</div>
<div class="form-group">
    {!! form::label('venue_name', 'Venue Name') !!}
    {!! Form::input('text', 'venue_name', null, ['class' => 'form-control', 'placeholder' => 'Bytes Conference Center']) !!}
</div>
<div class="form-group">
    {!! form::label('venue_city', 'Venue City') !!}
    {!! Form::input('text', 'venue_city', null, ['class' => 'form-control', 'placeholder' => 'Johannesburg']) !!}
</div>
<div class="form-group">
    {!! form::label('venue_country', 'Venue Country') !!}
    {!! Form::input('text', 'venue_country', null, ['class' => 'form-control', 'placeholder' => 'South Africa']) !!}
</div>
<div class="form-group">
    {!! form::label('street_address', 'Venue Street Address') !!}
    {!! Form::input('text', 'street_address', null, ['class' => 'form-control', 'placeholder' => '3rd Rd, 1685']) !!}
</div>
<hr>
<p class="no-hover">
    Please make use of the following link in order to obtain the Latitude & Longitude for your venue location. <br> This information will be used to generate the map on the contact us page. <br>
    <a href="http://www.latlong.net/" target="_blank">Visit the site.</a>
</p>
<div class="form-group">
    {!! form::label('latitude', 'Google Maps Latitude') !!}
    {!! Form::input('text', 'latitude', null, ['class' => 'form-control', 'placeholder' => '-25.676191']) !!}
</div>
<div class="form-group">
    {!! form::label('longitude', 'Google Maps Longitude') !!}
    {!! Form::input('text', 'longitude', null, ['class' => 'form-control', 'placeholder' => '28.215512']) !!}
</div>
<div class="form-group">
    {!! Form::submit($SubmitText, ['class' => 'btn btn-default']) !!}
</div>