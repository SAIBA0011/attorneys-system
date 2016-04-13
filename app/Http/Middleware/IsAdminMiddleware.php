<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! $request->user())
            return redirect('/login');

        if(! $request->user()->isAdmin())
        {
            return app()->abort('403', 'Access Forbidden');
        }
        return $next($request);
    }
}
