@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Upload new .PDF file'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <i>
                            The file uploaded in this section will be displayed on the front end
                            <a href="{{route('schedule')}}" target="_blank">schedule</a> page at the bottom.
                            This file will also be available on mobile devices to download.
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['Method' => 'Post', 'route' => 'admin.pdf.store', 'files' => true]) !!}
                            @include('admin.pdf.includes.form')
                        {!! Form::close() !!}
                    </div>

                    @if(count($files))
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <th>Current file</th>
                                <th>Uploaded at</th>
                                <th>View File</th>
                                <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{$file->title}}.pdf</td>
                                        <td>{{date_format($file->created_at, 'Y-m-d')}}</td>
                                        <td class="no-hover"><a href="/{{ $file->file }}" target="_blank"> {{ $file->title }}.pdf </a></td>
                                        <td>
                                            {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.pdf.destroy', $file->id]]) !!}
                                            {!! Form::submit('X', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection