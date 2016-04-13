@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Create Categories'])

            <div class="row">
                <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <i>
                                Sponsor categories created here will display on the front end
                                <a href="{{route('about.sponsors')}}" target="_blank">Sponsors</a> page.
                                You can also set the required position for each category as requested.
                                Once the required categories has been created you can add your sponsors and assign them to the relative category.
                            </i>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::open(['Method' => 'POST', 'route' => 'admin.categories.store', 'files' => true]) !!}
                    @include('admin.categories.includes.form', ['submitText' => 'Create Category'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.categories.includes.summernote')
@endsection