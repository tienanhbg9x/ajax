<?php

namespace App\Providers;

use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //register 1 class với container
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }
            return new PaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //truyền data qua view
//        View::share('channels', Channel::query()
//            ->orderBy('name')->get());
        View::composer(['channel.create', 'channel.index'], function($view) {
            $view->with('channels', Channel::query()
            ->orderBy('name','DESC')->get());
        });
    }
}
