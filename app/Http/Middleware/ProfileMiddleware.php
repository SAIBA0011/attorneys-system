<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class ProfileMiddleware
{

    public function handle($request, Closure $next)
    {
        if(Auth::user()->slug !== $request->profile){
            Flash::message('You do not have access to edit another users profile.');
            return redirect('/');
        }
        return $next($request);
    }

}
