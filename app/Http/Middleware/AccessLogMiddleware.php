<?php

namespace App\Http\Middleware;

use App\AccessLog;
use Closure;

class AccessLogMiddleware
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

        $ip = $request->server->get('REMOTE_ADDR');
        $uri = $request->getRequestUri();

        AccessLog::create([
            'ip'    => $ip,
            'route' => $uri
        ]);

        return $next($request);
    }
}
