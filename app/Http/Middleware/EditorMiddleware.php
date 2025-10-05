<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Editors and Admins can pass (admins have all permissions)
        if (!auth()->check() || !auth()->user()->hasAnyRole(['admin', 'editor'])) {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return $next($request);
    }
}
