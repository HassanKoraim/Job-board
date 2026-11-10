<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->email !== 'hassankoraim2@gmail.com') {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        }

        return response()->json(['message' => 'Access denied'], 401);
    }
}
