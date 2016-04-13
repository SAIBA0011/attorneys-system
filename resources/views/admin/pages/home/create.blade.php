@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <h1 class="page-header">Create Callout Box</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            The Callout blocks created here will be displayed on the home page. Please note that you can create as many as you want, but only three (3) will display at the same time on the home page
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'Post', 'route' => 'admin.pages.home.store']) !!}

                <div class="form-group">
                    <label for="icon">Please Select Icon</label>
                    <button name="icon" data-iconset="fontawesome" data-icon="" class="btn btn-default iconpicker form-control" role="iconpicker"
                            data-original-title="" title="" aria-describedby="popover810642">
                        <i class="glyphicon glyphicon-align-justify"></i>
                        <input type="hidden" value="glyphicon-align-justify"  name="icon" class="form-control"><span class="caret"></span>
                    </button>
                </div>

                    @include('admin.pages.home.includes.form', ['submit' => 'Submit'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.pages.home.includes.script')
@endsection