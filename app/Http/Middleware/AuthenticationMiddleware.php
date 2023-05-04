<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticationMiddleware
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
        session_start();

        if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
            return redirect()->route('site.login', ['error' => '2']);
        }

        return $next($request);
    }
}
