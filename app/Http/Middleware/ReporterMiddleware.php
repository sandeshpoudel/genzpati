<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReporterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Reporters, Editors, and Admins can pass
        if (!auth()->check() || !auth()->user()->hasAnyRole(['admin', 'editor', 'reporter'])) {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return $next($request);
    }
}
