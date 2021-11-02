<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Library\Classes\Permission;
use App\Library\Classes\Admin;
use Auth;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $middlewarePrefix = 'admin.permission:';

    public function handle(Request $request, Closure $next,...$args)
    {
        if (Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest(route('admin.login'));
        }
        if($this->checkActvateorNot($request)){
            return redirect()->route('admin.login')
            ->with(['error'=>'Your account has been deactivated']);
        }
        if (!empty($args) || $this->shouldPassThrough($request) || Admin::user()->isAdministrator()){
            return $next($request);
        }
        // Allow access route
        if ($this->routeDefaultPass($request)) {
            return $next($request);
        }
        if (!Admin::user()->allPermissions()->first(function ($modelPermission){
            return $modelPermission->passRequest();
        })) {         

            if (!request()->ajax()) {
                return redirect()->route('admin.deny');
            } else {
                return Permission::error();
            }
        }
        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $routePath = $request->path();
        $exceptsPAth = [
            ADMIN_TEMPLATE_ROOT . '/app_login',
            ADMIN_TEMPLATE_ROOT . '/app_logout',
        ];
        return in_array($routePath, $exceptsPAth);
    }

     /*
    Check route defualt allow access
    */
    public function routeDefaultPass($request)
    {
        $routeName = $request->route()->getName();
        $allowRoute = ['admin.deny', 'admin.index'];
        return in_array($routeName, $allowRoute);
    }

    /**
     * check account is activate or not 
    */
    public function checkActvateorNot(Request $request){
        if(Admin::user()->activate == 0){
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            return true;
        }else{
            return false;
        }
    }

    

    

     public function viewWithoutToMessage(){
        return [

        ];
     }

}