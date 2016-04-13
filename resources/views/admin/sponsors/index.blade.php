@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Sponsors'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($sponsors))
                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                        <th>Sponsor Title</th>
                        <th>Sponsor Category</th>
                        <th>Email Address</th>
                        <th>View</th>
                        <th>Edit Sponsor</th>
                        <th class="text-center">Delete Sponsor</th>
                        </thead>
                        <tbody>

                        @foreach($sponsors as $sponsor)
                            <tr>
                                <td>{{$sponsor->title}}</td>
                                <td>{{$sponsor->category->title}}</td>
                                <td>{{$sponsor->email}}</td>
                                <td class="no-hover"><a href="{{route('about.sponsors.show', $sponsor->slug)}}" target="_blank">View</a></td>
                                <td  class="no-hover"><a href="{{ route('admin.sponsors.edit', $sponsor->id) }}">Edit Sponsor</a></td>
                                <td class="text-center">
                                    {!! Form::open(['Method' => 'Destory', 'route' => ['admin.sponsors.destroy', $sponsor->id]]) !!}
                                    {!! Form::submit('X', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    There is no available sponsors, would you like to add
                    <a href="{{route('admin.sponsors.create')}}" style="text-decoration: none">some </a> ?
                @endif

                {{ $sponsors->render() }}
            </div>
        </div>
    </div>
@endsection