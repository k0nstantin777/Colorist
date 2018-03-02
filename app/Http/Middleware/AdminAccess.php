<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('admin_access')) {
            throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
        }
        
        return $next($request);
    }
}
