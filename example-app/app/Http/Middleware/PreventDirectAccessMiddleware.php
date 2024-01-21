<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventDirectAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->userShouldHaveAccess()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }

    private function userShouldHaveAccess(): bool
    {
        return auth()->check() && auth()->user()->email === 'admin@gmail.com';
    }
}
