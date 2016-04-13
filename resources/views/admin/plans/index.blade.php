@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Availabel Price Plans'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($plans))
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <th>Available Plan</th>
                        <th>Price Plan Options</th>
                        <th>Plan expiry date</th>
                        <th>Edit Plan</th>
                        <th class="text-center">Remove Plan</th>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)
                            <tr>
                                <td>{{ucfirst($plan->title)}}</td>
                                <td>{{count($plan->PlanOption)}} Options</td>
                                <td>{{$plan->early_bird_expiry}}</td>
                                <td class="no-hover"><a href="{{route('admin.plan.edit', $plan->id)}}">Edit Plan</a></td>
                                <td class="text-center">
                                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.plan.destroy', $plan->id]]) !!}
                                        {!! Form::submit('X', ['class' => 'delete btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    There is no available plans, would you like to add
                    <a href="{{route('admin.plan.create')}}" style="text-decoration: none">some </a> ?
                @endif

            </div>
        </div>
    </div>
@endsection