<?php

namespace App\Http\Middleware;

use App\Traits\Logout;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogoutIfHasRefQuery
{
    use Logout;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty($request->query('ref'))) $this->logout($request);
        return $next($request);
    }
}
