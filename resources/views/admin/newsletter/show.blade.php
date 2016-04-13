@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Newsletter Subscribers'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                <table class="table table-responsive table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Join Date</th>
                        <th>Delete from list</th>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->name }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ date_format($subscriber->created_at, 'Y-m-d') }}</td>
                                <td>
                                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.newsletter.delete', $subscriber->id]]) !!}
                                        {!! Form::submit('Delete From List', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subscribers->render() }}
            </div>
        </div>
    </div>

@endsection