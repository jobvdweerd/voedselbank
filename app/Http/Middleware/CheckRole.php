<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('dashboard');
        }

        $userRole = Auth::user()->role_id;

        if (!in_array($userRole, $roles)) {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
