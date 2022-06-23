<?php

namespace FourthEarth\Site\Middleware;

use Closure;

class IsCreator
{
    public function handle($request, Closure $next)
    {
        if (! Auth::user()->isCreator()) {
            return redirect("/");
        }
        return $next($request);
    }
}
