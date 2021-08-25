<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string[]  ...$guards
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (\Auth::check()) {
            \Cache::set('n:user:session:'.\Auth::id(), 1, now()->addMinutes(config('session.lifetime')));
        }

        return parent::handle($request, $next, $guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
