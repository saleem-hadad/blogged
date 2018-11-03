<?php

namespace BinaryTorch\Blogged\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BloggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            $loginUrl = config('blogged.routes.login');

            return redirect()->guest($loginUrl);
        }
        
        return $next($request);
    }
}