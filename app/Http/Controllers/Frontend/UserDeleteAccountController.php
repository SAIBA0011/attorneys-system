<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserDeleteAccountController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return redirect('/');
    }
}
