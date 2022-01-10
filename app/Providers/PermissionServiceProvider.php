<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\PermissionMiddleware;
use App\Http\Middleware\LogsOperation;
use App\Http\Middleware\MailService;
class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $routeMiddleware = [
      'admin.permission' => PermissionMiddleware::class,
      'admin.log'=>LogsOperation::class,
      'admin.mail'=>MailService::class,
    ];

    public function register()
    {
        $this->registerRouteMiddleware();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

     /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected function middlewareGroups()
    {
        return [
            'admin' => config('middleware.admin'),
        ];
    }

    protected function registerRouteMiddleware()
    {
         // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
         // register middleware group.
        foreach ($this->middlewareGroups() as $key => $middleware) {
            app('router')->middlewareGroup($key, array_values($middleware));
        }
    }


}
