<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $lastActivity = session('last_activity_time');
        $timeout = config('session.lifetime') * 60;

        if ($lastActivity && time() - $lastActivity > $timeout) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();

            if ($request->ajax()) {
                return response()->json([
                    'message' => 'Session expired'
                ], 401);
            }

            return redirect()->route('login')
                ->withErrors(['session' => 'Session expired']);
        }

        session(['last_activity_time' => time()]);

        return $next($request);
    }
}