<?php

namespace App\Http\Controllers;

use App\User;
use Hootlex\Friendships\Models\Friendship;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class FriendsController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( Request $request, $id)
    {
        $sender = Auth::user();
        $recipient = User::whereId($id)->first();
        $sender->befriend($recipient);
        Flash::message('You have sent a friend request');
        return redirect()->back();
    }

    public function accept_friend_request(Request $request, $id)
    {
        $sender = User::whereId($id)->first();
        $recipient = Auth::user();
        $sender->befriend($recipient);
        $recipient->acceptFriendRequest($sender);
        Flash::message('You have accepted the friend request');
        return redirect()->back();
    }

    public function unfriend_user(Request $request, $id)
    {
        $sender = Auth::user();
        $recipient = User::whereId($id)->first();

        $sender->unfriend($recipient);
        Flash::message('You have unfriended this user');
        return redirect()->back();
    }

    public function deny_friend_request(Request $request, $id)
    {
        $sender = Auth::user();
        $recipient = User::whereId($id)->first();

        $denyFriend = FriendShip::whereSenderIdAndRecipientId($recipient->id, $sender->id);
        $denyFriend->delete();

        Flash::message('You have removed this friend request');
        return redirect()->back();

    }
}
