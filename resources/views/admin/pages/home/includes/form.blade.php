{{-- This form will be used to create new callout boxes on the homepage. --}}
<div class="form-group">
    {!! form::label('title', 'Callout Box Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('link', 'Link to be redirected to when clicked on the title') !!}
    {!! Form::select('link', [
        'Nothing Selected'          => 'Please select..',
        route('about.show')         => 'About Page',
        route('about.speakers')     => 'Speakers Page',
        route('about.partners')     => 'Partners Page',
        route('about.sponsors')     => 'Sponsors Page',
        route('bookings.show')      => 'Bookings Page',
        route('schedule')           => 'Schedule Page',
        route('members.show')       => 'Show All Members'
    ], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('short_description', 'Short Description') !!}
    {!! Form::textarea('short_description', null, ['class' => 'textarea form-control', 'maxlength' => '109']) !!}
    <div class="counting"></div>

</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>