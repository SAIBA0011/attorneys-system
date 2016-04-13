<div id="create_stream_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['Method' => 'Post', 'route' => 'admin.stream.create']) !!}
                        {!! Form::hidden('day_id', $day->id, null, ['class' => 'form-control']) !!}

                        {!! form::label('title', 'Stream Title') !!}
                        <div class="form-group">
                            {!! Form::select('title', [
                                'Stream One'    => 'Stream One',
                                'Stream Two'    => 'Stream Two',
                                'Stream Three'  => 'Stream Three',
                                'Stream Four'   => 'Stream Four',
                                'Stream Five'   => 'Stream Five',
                                'Stream Six'    => 'Stream Six',
                                'Stream Seven'  => 'Stream Seven',
                                'Stream Eight'  => 'Stream Eight',
                                'Stream Nine'   => 'Stream Nine',
                                'Stream Ten'    => 'Stream Ten',
                            ], null, ['class' => 'form-control', 'style' => 'width:100%', 'placeholder' => 'Stream']) !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>