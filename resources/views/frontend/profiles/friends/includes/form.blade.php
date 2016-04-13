<!-- This form will submit the current user id  -->
    {!! Form::hidden('UserId', $user->id) !!}
    {!! Form::submit($SubmitButtonText, ['class' => $ButtonClass]) !!}
