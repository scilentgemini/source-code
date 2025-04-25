<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRouteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // If user has no roles, redirect to user dashboard
        if ($user->roles->isEmpty()) {
            return redirect()->route('user.dashboard');
        }

        // If user is not an admin, redirect to user dashboard
        if (!$user->hasRole('Super Admin')) {
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}
