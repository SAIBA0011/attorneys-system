@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Show existing days'])

            <div class="row">
                <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                    @if(count($days))
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <th>Title</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Total Plenary Panels</th>
                            <th class="text-center">Total Streams</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                            </thead>
                            <tbody>
                            @foreach($days as $day)
                                <tr>
                                    <td>{{$day->title}}</td>
                                    <td class="text-center">{{$day->date}}</td>
                                    <td class="text-center">{{count($day->panels)}}</td>
                                    <td class="text-center">{{count($day->streams)}}</td>
                                    <td class="text-center">{{$day->created_at->toformattedDateString()}}</td>
                                    <td class="text-center no-hover" ><a href="{{route('admin.days.edit', $day->id)}}">Edit Day</a></td>
                                    <td class="text-center">
                                        {!! Form::open(['Method' => 'Post', 'route' => ['admin.days.destroy', $day->id]]) !!}
                                        {!! Form::submit('delete', ['class' => 'btn btn-xs delete btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        There is no available days, would you like to add
                        <a href="{{route('admin.day.create')}}" style="text-decoration: none">some </a> ?
                    @endif
                </div>
            </div>
    </div>
@endsection