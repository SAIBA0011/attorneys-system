<div class="modal fade {{$plan->id}}-PlanOptions-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                Add Pricing Plans
            </div>

            <div class="modal-body">
                {!! Form::open(['Method' => 'Post', 'route' => 'admin.PlanOption.store']) !!}
                <div class="form-group">
                    {!! Form::input('hidden','price_plan_id', $plan->id, ['class' => 'form-control']) !!}
                </div>
                @include('admin.planOptions.includes.option_form', ['submit' => 'Create Option'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>