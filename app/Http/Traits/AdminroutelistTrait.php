<?php 
namespace App\Http\Traits;
use Illuminate\Support\Str;
trait AdminroutelistTrait{
	public function routeList(){
		
		$routes=\Route::getRoutes()->getRoutesByMethod();
		$routes=array_merge($routes['GET'],$routes['POST']);
		return $this->filterRoute($routes);
	}
	public function filterRoute($routes){
		$adminRoutes;
		$childRoutes;
		foreach($routes as $route){
			if (Str::startsWith($route->uri(), ADMIN_TEMPLATE_PREFIX )) {
				$prefix = ADMIN_TEMPLATE_PREFIX ? $route->getPrefix() : ltrim($route->getPrefix(),'/');
				$prefixArr=explode('/',$prefix);
				$module=end($prefixArr);
				$adminRoutes[$module]=[
					'root_uri'=>$prefix . '/*',
				];
				foreach ($route->methods as $key => $method) {
					if ($method != 'HEAD' && !collect($this->without())->first(function ($exp) use ($route) {
						return Str::startsWith($route->uri, $exp);
					})) {
						$urlArr=explode('/',$route->uri);
						if(!empty($urlArr) && isset($urlArr[1]) && isset($urlArr[2])){
							$childRoutes[$urlArr[1]][$urlArr[2]]=$route->uri;
						}
					}
				}
			}

		}
		return array_merge_recursive($adminRoutes,$childRoutes);
	}

	public function without()
    {
        $prefix = ADMIN_TEMPLATE_PREFIX ? ADMIN_TEMPLATE_PREFIX.'/' : '';
        return [
        	$prefix.'app_login',
        	$prefix.'app_logout',
            $prefix.'index',
            $prefix.'permission/pagination',
            $prefix.'role/pagination',
            $prefix.'user/pagination'
        ];
    }
}