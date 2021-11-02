<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Library\Classes\Admin;
use App\Repo\Logs\LogsRepo;
class LogsOperation
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
        try{
            (new LogsRepo)->createLogs($request);
        } catch (\Exception $exception) {
        }
        return $next($request);
    }
}
