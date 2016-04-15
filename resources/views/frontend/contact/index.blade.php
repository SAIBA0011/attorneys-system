@extends('layouts.frontend')

@section('title')
    Contact Us
@endsection
@section('intro')
    Drop us a line or just say Hello!
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider20"></div>
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(array('route' => 'contact.store', 'class' => 'form')) !!}
                <div class="form-group">
                    {!! form::label('name', 'Your name') !!}
                    {!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => 'Enter your name']) !!}
                </div>

                <div class="form-group">
                    {!! form::label('email', 'Your Email Address') !!}
                    {!! Form::input('text', 'email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email']) !!}
                </div>

                <div class="form-group">
                    {!! form::label('contact_message', 'Your Message') !!}
                    {!! Form::textarea('contact_message', null, ['class' => 'form-control', 'placeholder' => 'Enter your message']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Send Email', ['class' => 'btn btn-default']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            <div class="col-md-4">
                <div class="border-box">
                    <div id="map" style="height: 400px"></div>
                </div>

                <hr>
                @if($event)
                    <h6 class="highlight custom-font" style="margin-bottom: 0px">Contact Information</h6>
                    <p>
                        <i class="fa fa-user" style="color: #e3e3e3"></i> {{ $event->contact_name }} <br>
                        <i class="fa fa-envelope-o" style="color: #e3e3e3"></i> {{ $event->email_address }} <br>
                        <i class="fa fa-phone" style="color: #e3e3e3"></i> {{ $event->contact_number }}
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initMap() {
            var myLatLng = {lat: {!! (json_decode($event->latitude))? : '-26.107566' !!}, lng: {!! (json_decode($event->longitude))? : '28.056701' !!}};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                @if(count($event) >= 1)
                    title: '{!! $event->venue_name !!}',
                @else
                    title: 'Title Placeholder'
                @endif
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
@endsection