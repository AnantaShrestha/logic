<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach(glob(app_path() . '/Library/Helpers/*.php') as $filename){
            require_once $filename;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('ADMINTEMPLATEROOT',ADMIN_TEMPLATE_ROOT);
    }
}
