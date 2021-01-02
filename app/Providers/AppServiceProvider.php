<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\dtb_notify;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('header',function($view){
            $notify=dtb_notify::all();
            $view->with('notify',$notify);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV')!=='local'){
            URL::forceScheme('https');
        }
    }
}
