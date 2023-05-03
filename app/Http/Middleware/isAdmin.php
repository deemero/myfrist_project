<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->user_level == 1)
            return $next($request);
        else
            return back()->with('error', 'Not Authorized!');
    }
}
