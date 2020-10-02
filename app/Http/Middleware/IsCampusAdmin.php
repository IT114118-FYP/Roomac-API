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
        $client = \DB::select('SELECT permission_type FROM Client WHERE cna = ?', [$request->user()->name])[0];

        // 0 - Normal User | 1 - Root Admin | 2 - Campus Admin | 3 - Campus Staff
        if ($client->permission_type !== 1 && $client->permission_type !== 2) {
            return response(null, 500);
        }

        return $next($request);
    }
}
