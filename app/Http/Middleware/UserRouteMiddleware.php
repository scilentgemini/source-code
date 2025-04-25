<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRouteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        abort(404);
    }
}