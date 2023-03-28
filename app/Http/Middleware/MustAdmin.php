<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // If role != Admin (role_id = 1)
        if (Auth::user()->role_id != 1) {
            abort(404);
        }
        return $next($request);
    }
}
