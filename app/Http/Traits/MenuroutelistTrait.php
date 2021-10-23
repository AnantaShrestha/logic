<?php
namespace App\Http\Traits;

trait MenuroutelistTrait{
	public function routeCollection(){
		return get_routes_collection();
	}

	public function routeList(){
		$routes=$this->routeCollection();
		return $this->filterRoute($routes);
	}

	public function filterRoute($routes){
		$routeList;
		foreach($routes as $route){
			if (\Str::startsWith($route->uri(), ADMIN_TEMPLATE_PREFIX )) {
				foreach ($route->methods as $key => $method) {
					if ($method != 'HEAD' && !collect($this->without())->first(function ($exp) use ($route) {
						return \Str::startsWith($route->uri, $exp);
					})) {
						$routeList[$route->uri]=$route->uri;
					}
				}
			}
		}
		return $routeList;
	}


	public function without()
    {
        $prefix = ADMIN_TEMPLATE_PREFIX ? ADMIN_TEMPLATE_PREFIX.'/' : '';
        return [
        	$prefix.'app_login',
        	$prefix.'app_logout',
            $prefix.'permission/pagination',
            $prefix.'permission/edit/{id}',
            $prefix.'permission/delete/{id}',
            $prefix.'role/pagination',
            $prefix.'role/edit/{id}',
            $prefix.'role/delete/{id}',
            $prefix.'user/pagination',
            $prefix.'user/edit/{id}',
            $prefix.'user/delete/{id}',
            $prefix.'menu/create',
            $prefix.'menu/sorting',
            $prefix.'menu/edit/{id}',
            $prefix.'menu/delete/{id}',

        ];
    }

}