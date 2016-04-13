<div id="Message_user_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="custom-font modal-title">Message {{ $user->name }}</h6>
            </div>

            {!! Form::open(['route' => 'profile.messages.store']) !!}
                <div class="modal-body text-left">
                    @include('frontend.profiles.messenger.includes.form')
                </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>