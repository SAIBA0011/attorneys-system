<div class="modal fade stream_panel-{{$stream->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add more plenary panels</h4>
            </div>

            {!! form::open(['Method' => 'Post', 'route' => ['admin.streamPanel.create']]) !!}
            {!! Form::hidden('stream_id', $stream->id, ['class' => 'form-control']) !!}

            <div class="modal-body">
                @include('admin.schedule.includes.form')
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
            </div>

            {!! form::close() !!}
        </div>
    </div>
</div>
