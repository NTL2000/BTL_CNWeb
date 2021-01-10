<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\dtb_notify;
use App\Models\cart;
use Session;

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
        view()->composer('header',function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new cart($oldCart);
                $view->with(['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}