<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustAdminOrTeacher
{
    public function handle(Request $request, Closure $next): Response
    {
        // If role == Admin (role_id=1) or role == Teacher (role_id=3)
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3); {
            return $next($request);
        }
        abort(404);
    }
}
