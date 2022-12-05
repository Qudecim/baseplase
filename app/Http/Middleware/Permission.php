<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permission
{
    /**
     * Check is an element under user control
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string $modelName
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next, string $modelName)
    {
        if ($request->$modelName->owner_id == auth()->id()) {
            return $next($request);
        }
        throw new \Exception('Permission denied');
    }
}
