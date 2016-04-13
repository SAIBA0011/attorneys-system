@extends('layouts.admin')
    @section('content')
        <div id="page-wrapper">
            @include('admin.partials.page-header', ['PageHeader' => 'Edit Categories'])

                <div class="row">
                    <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                        {!! Form::model($category, ['Method' => 'Post', 'route' => ['admin.categories.update', $category->id]]) !!}
                            @include('admin.categories.includes.form', ['submitText' => 'Update Category'])
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    @endsection

@section('scripts')
    @include('admin.categories.includes.summernote')
@endsection