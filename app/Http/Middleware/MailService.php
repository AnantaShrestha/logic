<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
class MailService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $app = App::getInstance();
        $app->register('App\Providers\MailServiceProvider');
        return $next($request);
    }
}
