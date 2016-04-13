<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserController extends Controller
{
    public function getUsers()
    {
        $users = User::all()->sortBy('id');
        return view('admin.users.index', compact('users'));
    }
}
