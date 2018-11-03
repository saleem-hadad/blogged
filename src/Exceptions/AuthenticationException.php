<?php

namespace BinaryTorch\Blogged\Exceptions;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthenticationException as BaseAuthenticationException;

class AuthenticationException extends BaseAuthenticationException
{
    /**
     * Render the exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return $request->expectsJson()
                    ? response()->json(['message' => $this->getMessage()], 401)
                    : redirect()->guest(config('blogged.routes.login'));
    }
}
