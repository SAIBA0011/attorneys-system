@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Sponsor Page Content'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>Content created on this page will be visible on the <a href="{{route('about.sponsors')}}" target="_blank">sponsors</a> page.</i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($page, ['Method' => 'POST', 'route' => ['admin.sponsors.store_page_content', $page->id]]) !!}
                <div class="form-group">
                    {!! form::label('title', 'Title') !!}
                    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! form::label('content', 'Content') !!}
                    {!! Form::textarea('content', null, ['class' => ' description form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit Content', ['class' => 'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.description').summernote({
                height: 450,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
            $('select').select2({
                'allowClear': true,
                placeholder: 'Select..'
            });
        });
    </script>
    @include('admin.includes.clear-select')
@endsection