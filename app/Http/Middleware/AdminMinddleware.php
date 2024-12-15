<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is not an admin, redirect them somewhere else (e.g., home)
        if (Auth::user()->type != 'a') {
            return redirect('/welcome');  // Change this to the appropriate user dashboard
        }

        return $next($request);
    }
}
