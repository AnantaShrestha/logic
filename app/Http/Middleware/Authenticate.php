<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $redirectTo = route('admin.login');
        if (!Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest($redirectTo);
        }

        return $next($request);
    }

    protected function shouldPassThrough($request)
    {
        $routeName = $request->path();
        $excepts = [
            ADMIN_TEMPLATE_PREFIX . '/app_login',
            ADMIN_TEMPLATE_PREFIX . '/app_logout',
        ];
        return in_array($routeName, $excepts);

    }
}
