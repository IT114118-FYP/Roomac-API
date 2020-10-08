<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCampusAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
        $p = $request->user()->permission_type;
        if ($p !== 1 && $p !== 2) {
            return response(null, 500);
        }

        return $next($request);
    }
}
