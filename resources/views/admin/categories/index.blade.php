@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Show Categories'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($categories))
                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                        <th>Category Name</th>
                        <th class="text-center">Display Position</th>
                        <th class="text-center">Sponsors</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                <td class="text-center">{{$category->position}}</td>
                                <td class="text-center">{{count($category->sponsor)}}</td>
                                <td class="text-center no-hover"><a href="{{route('admin.categories.edit', $category->id)}}">Edit Category</a></td>
                                <td class="text-center">
                                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.categories.destroy', $category->id]]) !!}
                                    {!! Form::submit('X', ['class' => ' delete btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @else
                    There is no available categories, would you like to add
                    <a href="{{route('admin.categories.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection