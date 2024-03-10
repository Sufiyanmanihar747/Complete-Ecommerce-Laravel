<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        $user = $request->user();

        if ($user) {
            // dd($user->hasRole('user'));
            if ($user && $user->hasRole('admin')) {
                return redirect()->route('admin.index');
            }
            if ($user && $user->hasRole('subadmin')) {
                return redirect()->route('subadmin.index');
            }
        }
        return $next($request);
    }

    protected function redirectTo(Request $request): ?string
    {
        dump('auth middleware');
        return $request->expectsJson() ? null : route('login');
    }
}
