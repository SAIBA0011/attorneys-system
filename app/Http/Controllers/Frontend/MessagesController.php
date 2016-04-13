<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Pusher;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('profile')->only('index');
    }

    public function index()
    {
        $user = Auth::user();
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
//        $threads = Thread::getAllLatest();
        // All threads that user is participating in
         $threads = Thread::forUser($currentUserId)->latest('created_at')->paginate(10);
        // All threads that user is participating in, with new messages
//         $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('frontend.profiles.messenger.index', compact('threads', 'currentUserId', 'user'));
    }

    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('frontend.profiles.messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $user = Auth::user();
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('frontend.profiles.messenger.show', compact('thread', 'users', 'user'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('frontend.profiles.messenger.create', compact('users'));
    }

    public function store()
    {
        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }

        Flash::message('Your Message has been sent');
        return redirect()->back();
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @param Pusher $pusher
     * @return mixed
     */
    public function update($id, Pusher $pusher)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('profile/messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants(Input::get('recipients'));
        }
        $pusher->trigger('test_channel', 'userResponded', ['message' => Input::get('message')]);
        return redirect('profile/messages/' . $id);
    }
}
