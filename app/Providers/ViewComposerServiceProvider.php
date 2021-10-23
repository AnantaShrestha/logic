<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Menu\MenuRepo;
class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         view()->share('menus',(new MenuRepo)->getMenu()->groupBy('parent_id'));
    }
}
