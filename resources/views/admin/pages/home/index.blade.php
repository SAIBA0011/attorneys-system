@extends('layouts.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <h1 class="page-header">Home Page</h1>
            </div>
        </div>

        <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
            <div class="row">
                @if(count($boxes))
                    <table class="table table-responsive">
                        <thead>
                            <th class="text-center">Icon</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Short Description</th>
                            <th class="text-center">Tools</th>
                        </thead>
                        <tbody>
                            @foreach($boxes as $box)
                                <tr>
                                    <td class="text-center"><i class="fa {{$box->icon}}"></i></td>
                                    <td>{{$box->title}}</td>
                                    <td class="no-hover"><a href="{{ $box->link }}" target="_blank">View Link</a></td>
                                    <td>{{$box->short_description}}</td>
                                    <td class="text-center">
                                        {!! Form::open(['Method' => 'Post', 'route' => ['admin.pages.home.destroy', $box->id]]) !!}
                                        <a href="{{route('admin.pages.home.edit', $box->id)}}" class="btn btn-xs btn-default">Edit</a>
                                        {!! Form::submit('Delete', ['class' => 'delete btn-xs btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                @else
                    There is no available callout boxes, would you like to add
                    <a href="{{route('admin.pages.home.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection