@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Slide'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 420px; overflow: hidden; visibility: hidden;">
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 400px; overflow: hidden;">
                        <div data-p="225.00" style="display: none;">
                            <img data-u="" class="thumbnail"  src="{{ $slider->thumbnail}}" width="1272px" style="height: 400px">
                            <div class="text-container">
                                <center>
                                    <div class="intro-text text-center">
                                        <h6 style="font-size: 20px; margin-bottom: 0px">{{ $slider->title}}</h6>
                                        <br>
                                        <p>{{ $slider->date_location}}</p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::model($slider, ['Method' => 'Post', 'route' => ['admin.sliders.update', $slider->id], 'files' => true]) !!}
                    @include('admin.sliders.includes.form', ['submit' => 'Update Slider'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/assets/frontend/js/jssor.slider.mini.js"></script>
    <script type="text/javascript" src="/assets/frontend/js/custom.js"></script>
@stop