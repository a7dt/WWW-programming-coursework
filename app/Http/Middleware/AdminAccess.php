<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccess
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
        // Not logged in
        if($request->user() == null) {
            return response('Unauthorized:401', 401);
        }

        if($request->user()->isAdmin()) {
            return $next($request);
        }

        return response('Unauthorized:401', 401);
    }
}
