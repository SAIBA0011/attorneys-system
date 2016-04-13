<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            $members = User::where('id', '!=', CurrentUser()->id)->paginate(18);
        }else{
            $members = User::paginate(25);
        }
        return view('frontend.members.index', compact('members'));
    }
}
