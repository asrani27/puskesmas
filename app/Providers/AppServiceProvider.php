<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $menu = Menu::where('menu_id',null)->where('is_aktif','Y')->get();
            View::share('menu', $menu);
        } catch (\Exception $e) {
            
        }
    }
}
