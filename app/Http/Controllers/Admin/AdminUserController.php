<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class AdminUserController extends Controller
{
    public function getUsers()
    {
        $users = User::all()->sortBy('id');
        return view('admin.users.index', compact('users'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::with('profile')->findorFail($request->id);
        $user->delete();
        Flash::message('User has been removed');
        return redirect()->back();
    }
}
