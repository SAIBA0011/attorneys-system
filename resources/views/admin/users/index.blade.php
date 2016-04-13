@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'All Members'])
        <div class="row">
            <div class="col-md-12 col-xs-10 col-lg-10 col-sm-10">
                @if(count($users))
                    <div class="dataTable_wrapper">
                        <table class="table table-hover table-bordered" id="users-table">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Vissit profile</th>
                                <th>Join Date</th>
                                <th>User Role</th>
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ ucwords($user->name) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <th class="no-hover"><a href="{{ route('profile.profile', $user->slug) }}" target="_blank">View profile</a></th>
                                    <td>{{ date_format($user->created_at, 'Y-m-d') }}</td>
                                    <td> {{ ($user->isAdmin())? "Administrator" : "User" }} </td>
                                    <td>
                                        {!! Form::open(['Method' => 'Post', 'route' => ['admin.user.destroy', $user->id]]) !!}
                                        <div class="form-group">
                                            {!! Form::submit('Remove', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    There is no available speakers, would you like to add
                    <a href="{{route('admin.speakers.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection