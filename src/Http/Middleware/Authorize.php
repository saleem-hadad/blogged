<?php

namespace BinaryTorch\Blogged\Http\Middleware;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        abort_if(! config('blogged.settings.dashboard'), 403);

        return $next($request);
    }
}
