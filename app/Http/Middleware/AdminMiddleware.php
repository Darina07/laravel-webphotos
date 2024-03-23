<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
         * Handle an incoming request.
         *
         * @param Request $request
         * @param Closure $next
         * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if ($request->user() && $request->user()->isAdmin) {
            return $next($request);
        }

        // Redirect to the login page or show an unauthorized view
        return redirect('/admin')->with('error', 'Unauthorized.');
    }
}
