<?php

namespace App\Http\Middleware;

use Cache;
use Closure;
use Session;

class Authenticate
{
    /**
     * Create a new middleware instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**<
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Session::has('token') || Session::get('token') !== Cache::get('token')) {
            return redirect('/');
        }

        return $next($request);
    }
}
