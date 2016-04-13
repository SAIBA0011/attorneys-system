<div id="speaker-ratings" class="modal fade" role="dialog">
    <div class="modal-dialog text-center">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="custom-font modal-title">{{ $speaker->full_name }}</h6>
            </div>
            <div class="modal-body ">
                <div class="rate-presenter">
                <p>Please note that you can only rate this speaker once, So please ensure that you are completely satisfied with you rating before clicking on "Rate Me".</p>
                {!! Form::open(['Method' => 'Store', 'route' => ['admin.speakers.rating', $speaker->id]]) !!}

                <div class="form-group">
                <input type="number" class="rating" id="test" name="rating" value="0">
                </div>

                </div>
            </div>
            <div class="modal-footer" style="text-align: center!important;">
                {!! Form::submit('Rate Me', ['class' => 'btn btn-default']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Rating</button>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>