@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Add features to Plan'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($plans))
                    @foreach($plans as $plan)

                        <div class="panel panel-default">
                            <div class="panel-heading">{{$plan->title}}</div>
                            <div class="panel-body">
                                <table class="table table-responsive">
                                    <thead>
                                    <th>Title</th>
                                    <th>Full Price</th>
                                    <th>Expiry Bird Price</th>
                                    <th>Early Bird Expiry</th>
                                    <th>Edit</th>
                                    <th class="text-center">Delete</th>
                                    </thead>
                                    <tbody>

                                    @if(count($plan->PlanOption))
                                        @foreach($plan->PlanOption as $option)
                                            <tr>
                                                <td>{{$option->title}}</td>
                                                <td>{{$option->full_price}}</td>
                                                <td>{{$option->early_bird}}</td>
                                                <td>{{$plan->early_bird_expiry}}</td>
                                                <td class="no-hover"><a href="{{route('admin.PlanOption.edit', $option->id)}}">Edit</a></td>

                                                <td class="text-center">
                                                    {!! Form::open(['Method' => 'Destroy', 'route' => ['admin.PlanOption.destroy', $option->id]]) !!}
                                                    {!! Form::submit('X', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr colspan="10">
                                            <td>No options available for this plan.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <a href="#" data-target=".{{$plan->id}}-PlanOptions-modal-sm" data-toggle="modal" class="btn btn-xs btn-default">Add new features to plan</a>
                        @include('admin.planOptions.includes.add_pricing_plan_option')
                        <hr>
                    @endforeach
                @else
                    There is no available plans, would you like to add
                    <a href="{{route('admin.plan.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection