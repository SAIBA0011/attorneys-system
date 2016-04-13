@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Existing Slides'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($slides))
                    @foreach($slides as $slide)
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ $slide->thumbnail }}" class="thumbnail" width="100%" alt="">
                                </div>

                                <div class="col-md-9">
                                    <h5>{{ ($slide->title)? : "No Title Provided" }}</h5>
                                    <p>{{ ($slide->date_location)? : "No Description Provided" }}</p> <br>
                                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.sliders.destroy', $slide->id]]) !!}
                                    <a href="{{route('admin.slider.edit', $slide->id)}}" class="btn btn-default btn-xs">Edit Slide</a>
                                    {!! Form::submit('Remove Slider', ['class' => 'delete btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        <hr style="margin-top: 0px">
                    @endforeach
                @else
                    There is no available sliders, would you like to add
                    <a href="{{route('admin.sliders.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection