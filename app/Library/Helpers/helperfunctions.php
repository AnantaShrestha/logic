<?php 

if(!function_exists('get_routes_collection')){
	function get_routes_collection(){
		$routes=\Route::getRoutes()->getRoutesByMethod();
		return array_merge($routes['GET'],$routes['POST']);
	}
}
