@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'New Partner'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            Partners created here will be displayd on the font end
                            <a href="{{route('about.partners')}}"  target="_blank">partners</a> page.
                            Please note that all images that will be uploaded for the partners will be resized to 400px Width and 200px Height.
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => 'admin.partners.store', 'files' =>true]) !!}
                    @include('admin.partners.includes.form', ['submit' => 'Create Partner'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.partners.includes.summernote')
@endsection