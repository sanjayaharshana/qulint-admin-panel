<?php

namespace Qulint\\Admin\Middleware;

use Closure;
use Illuminate\Http\Request;
use Qulint\\Admin\Facades\Admin;

class Bootstrap
{
    public function handle(Request $request, Closure $next)
    {
        Admin::bootstrap();

        return $next($request);
    }
}
