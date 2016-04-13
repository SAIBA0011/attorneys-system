@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'Edit Price Plan'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                {!! Form::model($plan, ['Method' => 'Update', 'route' => ['admin.plan.update', $plan->id]]) !!}
                    @include('admin.plans.includes.form', ['submit' => 'Update Plan'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.plans.includes.date-picker')
@endsection