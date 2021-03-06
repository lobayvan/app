<?php

namespace App\Middlewares;

use Bow\Auth\Auth;
use Bow\Http\Request;

class GuestMiddleware
{
    /**
     * Launch function of the middleware.
     *
     * @param  Request $request
     * @param  callable $next
     * @return mixed
     */
    public function process(Request $request, callable $next)
    {
        if (Auth::getInstance()->guest()) {
            return $next($request);
        }

        return redirect($this->redirectTo());
    }

    /**
     * Get redirect url
     *
     * @return string
     */
    public function redirectTo()
    {
        return '/';
    }
}
