<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUser
{

    public function handle(Request $request, Closure $next)
    {
        if($request->user()->IsUser()) {
            return $next($request);
        } else {
            abort(403,'You are not user');
        }
    }

}
