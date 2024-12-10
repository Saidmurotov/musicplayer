<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guard = $guards[0] ?? null;

        if (Auth::guard($guard)->check()) {
            // Redirect to different dashboards based on user roles
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin.home');
            } elseif (Auth::user()->hasRole('user')) {
                return redirect()->route('user.home');
            }
        }

        return $next($request);
    }
}
