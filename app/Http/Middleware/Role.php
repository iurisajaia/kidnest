<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = array_slice(func_get_args(), 2);

        if (auth()->check() && in_array(auth()->user()->role->key, $roles)) {
            return $next($request);
        }

        if($request->is('api/*')) return response()->json(['message' => 'Unauthorized'], 401);

        return redirect()->back();
    }
}
