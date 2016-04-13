@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <h1 class="page-header">Edit Callout Block</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($box, ['Method' => 'Post', 'route' => ['admin.pages.home.update', $box->id]]) !!}
                <div class="form-group">
                    <label for="icon">Please Select Icon</label>
                    <button name="icon" data-iconset="fontawesome" data-icon="{{$box->icon}}" class="btn btn-default iconpicker form-control" role="iconpicker"
                            data-original-title="" title="" aria-describedby="popover810642">
                        <i class="glyphicon glyphicon-align-justify"></i>
                        <input type="hidden" value="glyphicon-align-justify"  name="icon" class="form-control"><span class="caret"></span>
                    </button>
                </div>

                    @include('admin.pages.home.includes.form', ['submit' => 'Update block'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.pages.home.includes.script')
@endsection