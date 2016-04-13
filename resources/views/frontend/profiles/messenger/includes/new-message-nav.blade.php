@if($threads)
    @if($threads->count() > 0)
        @foreach($threads as $thread)
            <a href="{{ route('profile.messages.show', $thread->id) }}">
                <div>
                    <strong>{!! $thread->participantsString(Auth::id()) !!}</strong>
                    <span class="pull-right text-muted">
                        <em>{!! Carbon\Carbon::parse($thread->latestMessage->created_at)->diffForHumans() !!}</em>
                    </span>
                </div>
                <div>{!! $thread->latestMessage->body !!}</div>
            </a>
        @endforeach
    @else
        <a class="text-center" href="#">
            No new messages.
        </a>
    @endif
@endif