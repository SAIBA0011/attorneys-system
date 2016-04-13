    @extends('layouts.admin')

    @section('content')
        <div id="page-wrapper">
            @include('admin.partials.page-header', ['PageHeader' => 'Partners'])

            <div class="row">
                <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                    @if(count($partners))
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <th>Partner Title</th>
                                <th>Email Address</th>
                                <th>Contact Number</th>
                                <th>Partner Profile</th>
                                <th>Edit</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{$partner->title}}</td>
                                    <td>{{$partner->email}}</td>
                                    <td>{{$partner->contact_number}}</td>
                                    <td class="no-hover"><a target="_blank" href="{{route('about.partners.show', $partner->slug)}}">View Partner</a></td>
                                    <td class="no-hover"><a href="{{route('admin.partners.edit', $partner->slug)}}">Edit</a></td>
                                    <td>
                                        {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.partners.destroy', $partner->slug]]) !!}
                                            {!! Form::submit('X', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--{{ $partners->render() }}--}}
                    @else
                        There is no available partners, would you like to add
                        <a href="{{route('admin.partners.create')}}" style="text-decoration: none">some </a> ?
                    @endif
                </div>
            </div>
        </div>
    @endsection