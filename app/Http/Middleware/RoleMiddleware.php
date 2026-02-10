<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $roles = array_filter(array_map('trim', $roles));

        if (empty($roles)) {
            abort(403, 'Unauthorized');
        }

        $hasAnyRole = Auth::user()
            ->roles()
            ->whereIn('name', $roles)
            ->exists();

        if (!$hasAnyRole) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
